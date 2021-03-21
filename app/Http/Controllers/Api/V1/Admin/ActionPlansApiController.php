<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreActionPlanRequest;
use App\Http\Requests\UpdateActionPlanRequest;
use App\Http\Resources\Admin\ActionPlanResource;
use App\Models\ActionPlan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActionPlansApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('action_plan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ActionPlanResource(ActionPlan::with(['initiative', 'users', 'team'])->get());
    }

    public function store(StoreActionPlanRequest $request)
    {
        $actionPlan = ActionPlan::create($request->all());
        $actionPlan->users()->sync($request->input('users', []));

        if ($request->input('attachments', false)) {
            $actionPlan->addMedia(storage_path('tmp/uploads/' . $request->input('attachments')))->toMediaCollection('attachments');
        }

        return (new ActionPlanResource($actionPlan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ActionPlan $actionPlan)
    {
        abort_if(Gate::denies('action_plan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ActionPlanResource($actionPlan->load(['initiative', 'users', 'team']));
    }

    public function update(UpdateActionPlanRequest $request, ActionPlan $actionPlan)
    {
        $actionPlan->update($request->all());
        $actionPlan->users()->sync($request->input('users', []));

        if ($request->input('attachments', false)) {
            if (!$actionPlan->attachments || $request->input('attachments') !== $actionPlan->attachments->file_name) {
                if ($actionPlan->attachments) {
                    $actionPlan->attachments->delete();
                }

                $actionPlan->addMedia(storage_path('tmp/uploads/' . $request->input('attachments')))->toMediaCollection('attachments');
            }
        } elseif ($actionPlan->attachments) {
            $actionPlan->attachments->delete();
        }

        return (new ActionPlanResource($actionPlan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ActionPlan $actionPlan)
    {
        abort_if(Gate::denies('action_plan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actionPlan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
