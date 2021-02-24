<?php

namespace App\Http\Requests;

use App\Models\ActionPlan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyActionPlanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('action_plan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:action_plans,id',
        ];
    }
}
