<?php

namespace App\Http\Requests;

use App\Models\ProductCrustSize;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProductCrustSizeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('product_crust_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:product_crust_sizes,id',
        ];
    }
}
