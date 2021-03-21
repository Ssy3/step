<?php

namespace App\Http\Requests;

use App\Models\StrategicPlan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStrategicPlanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('strategic_plan_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
