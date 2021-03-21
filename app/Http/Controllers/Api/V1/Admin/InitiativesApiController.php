<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreInitiativeRequest;
use App\Http\Requests\UpdateInitiativeRequest;
use App\Http\Resources\Admin\InitiativeResource;
use App\Models\Initiative;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InitiativesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('initiative_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InitiativeResource(Initiative::with(['project', 'users', 'team'])->get());
    }

    public function store(StoreInitiativeRequest $request)
    {
        $initiative = Initiative::create($request->all());
        $initiative->users()->sync($request->input('users', []));

        if ($request->input('attachments', false)) {
            $initiative->addMedia(storage_path('tmp/uploads/' . $request->input('attachments')))->toMediaCollection('attachments');
        }

        return (new InitiativeResource($initiative))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Initiative $initiative)
    {
        abort_if(Gate::denies('initiative_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InitiativeResource($initiative->load(['project', 'users', 'team']));
    }

    public function update(UpdateInitiativeRequest $request, Initiative $initiative)
    {
        $initiative->update($request->all());
        $initiative->users()->sync($request->input('users', []));

        if ($request->input('attachments', false)) {
            if (!$initiative->attachments || $request->input('attachments') !== $initiative->attachments->file_name) {
                if ($initiative->attachments) {
                    $initiative->attachments->delete();
                }

                $initiative->addMedia(storage_path('tmp/uploads/' . $request->input('attachments')))->toMediaCollection('attachments');
            }
        } elseif ($initiative->attachments) {
            $initiative->attachments->delete();
        }

        return (new InitiativeResource($initiative))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Initiative $initiative)
    {
        abort_if(Gate::denies('initiative_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $initiative->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
