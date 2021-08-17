<?php

namespace App\Http\Requests;

use App\Models\ProductVariationSize;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProductVariationSizeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('product_variation_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:product_variation_sizes,id',
        ];
    }
}
