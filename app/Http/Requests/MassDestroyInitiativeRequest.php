<?php

namespace App\Http\Requests;

use App\Models\Initiative;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyInitiativeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('initiative_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:initiatives,id',
        ];
    }
}
