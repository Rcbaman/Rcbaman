<?php

namespace App\Http\Requests;

use App\Models\Crust;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCrustRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('crust_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:crusts,id',
        ];
    }
}
