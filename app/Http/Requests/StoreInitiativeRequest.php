<?php

namespace App\Http\Requests;

use App\Models\Initiative;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInitiativeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('initiative_create');
    }

    public function rules()
    {
        return [
            'title'             => [
                'string',
                'required',
            ],
            'project_id'        => [
                'required',
                'integer',
            ],
            'kpi_previous'      => [
                'string',
                'nullable',
            ],
            'kpi_previous_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'kpi_current'       => [
                'string',
                'nullable',
            ],
            'kpi_current_date'  => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'kpi_target'        => [
                'string',
                'nullable',
            ],
            'kpi_target_date'   => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'users.*'           => [
                'integer',
            ],
            'users'             => [
                'array',
            ],
        ];
    }
}
