<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyStrategicPlanRequest;
use App\Http\Requests\StoreStrategicPlanRequest;
use App\Http\Requests\UpdateStrategicPlanRequest;
use App\Models\StrategicPlan;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class StrategicPlansController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('strategic_plan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = StrategicPlan::with(['team'])->select(sprintf('%s.*', (new StrategicPlan)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'strategic_plan_show';
                $editGate      = 'strategic_plan_edit';
                $deleteGate    = 'strategic_plan_delete';
                $crudRoutePart = 'strategic-plans';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.strategicPlans.index');
    }

    public function create()
    {
        abort_if(Gate::denies('strategic_plan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.strategicPlans.create');
    }

    public function store(StoreStrategicPlanRequest $request)
    {
        $strategicPlan = StrategicPlan::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $strategicPlan->id]);
        }

        return redirect()->route('admin.strategic-plans.index');
    }

    public function edit(StrategicPlan $strategicPlan)
    {
        abort_if(Gate::denies('strategic_plan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $strategicPlan->load('team');

        return view('admin.strategicPlans.edit', compact('strategicPlan'));
    }

    public function update(UpdateStrategicPlanRequest $request, StrategicPlan $strategicPlan)
    {
        $strategicPlan->update($request->all());

        return redirect()->route('admin.strategic-plans.index');
    }

    public function show(StrategicPlan $strategicPlan)
    {
        abort_if(Gate::denies('strategic_plan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $strategicPlan->load('team', 'strategicPlanGoals');

        return view('admin.strategicPlans.show', compact('strategicPlan'));
    }

    public function destroy(StrategicPlan $strategicPlan)
    {
        abort_if(Gate::denies('strategic_plan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $strategicPlan->delete();

        return back();
    }

    public function massDestroy(MassDestroyStrategicPlanRequest $request)
    {
        StrategicPlan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('strategic_plan_create') && Gate::denies('strategic_plan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new StrategicPlan();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
