<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreRiskRequest;
use App\Http\Requests\UpdateRiskRequest;
use App\Http\Resources\Admin\RiskResource;
use App\Models\Risk;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RisksApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('risk_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RiskResource(Risk::with(['initiative', 'team'])->get());
    }

    public function store(StoreRiskRequest $request)
    {
        $risk = Risk::create($request->all());

        return (new RiskResource($risk))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Risk $risk)
    {
        abort_if(Gate::denies('risk_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RiskResource($risk->load(['initiative', 'team']));
    }

    public function update(UpdateRiskRequest $request, Risk $risk)
    {
        $risk->update($request->all());

        return (new RiskResource($risk))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Risk $risk)
    {
        abort_if(Gate::denies('risk_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $risk->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
