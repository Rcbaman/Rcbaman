<?php

namespace App\Http\Requests;

use App\Models\CrustSize;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCrustSizeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('crust_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:crust_sizes,id',
        ];
    }
}
