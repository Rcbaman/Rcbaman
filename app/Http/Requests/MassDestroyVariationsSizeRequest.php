<?php

namespace App\Http\Requests;

use App\Models\VariationsSize;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyVariationsSizeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('variations_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:variations_sizes,id',
        ];
    }
}
