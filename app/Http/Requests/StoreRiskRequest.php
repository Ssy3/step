<?php

namespace App\Http\Requests;

use App\Models\Risk;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRiskRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('risk_create');
    }

    public function rules()
    {
        return [
            'title'       => [
                'string',
                'nullable',
            ],
            'probability' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'impact'      => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'gross'       => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
