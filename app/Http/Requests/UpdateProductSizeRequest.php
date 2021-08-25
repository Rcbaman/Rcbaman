<?php

namespace App\Http\Requests;

use App\Models\ProductSize;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductSizeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_size_edit');
    }

    public function rules()
    {
        return [
            'product_id' => [
                'required',
                'integer',
            ],
            'size_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
