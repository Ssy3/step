<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreStrategicPlanRequest;
use App\Http\Requests\UpdateStrategicPlanRequest;
use App\Http\Resources\Admin\StrategicPlanResource;
use App\Models\StrategicPlan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StrategicPlansApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('strategic_plan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StrategicPlanResource(StrategicPlan::with(['team'])->get());
    }

    public function store(StoreStrategicPlanRequest $request)
    {
        $strategicPlan = StrategicPlan::create($request->all());

        return (new StrategicPlanResource($strategicPlan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StrategicPlan $strategicPlan)
    {
        abort_if(Gate::denies('strategic_plan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StrategicPlanResource($strategicPlan->load(['team']));
    }

    public function update(UpdateStrategicPlanRequest $request, StrategicPlan $strategicPlan)
    {
        $strategicPlan->update($request->all());

        return (new StrategicPlanResource($strategicPlan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StrategicPlan $strategicPlan)
    {
        abort_if(Gate::denies('strategic_plan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $strategicPlan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
