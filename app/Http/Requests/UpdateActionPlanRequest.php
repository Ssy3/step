<?php

namespace App\Http\Requests;

use App\Models\ActionPlan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateActionPlanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('action_plan_edit');
    }

    public function rules()
    {
        return [
            'title'         => [
                'string',
                'required',
            ],
            'initiative_id' => [
                'required',
                'integer',
            ],
            'risks'         => [
                'string',
                'nullable',
            ],
            'resources'     => [
                'string',
                'nullable',
            ],
            'start'         => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'end'           => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'users.*'       => [
                'integer',
            ],
            'users'         => [
                'array',
            ],
        ];
    }
}
