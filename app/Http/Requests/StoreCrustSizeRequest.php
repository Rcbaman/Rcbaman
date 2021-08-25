<?php

namespace App\Http\Requests;

use App\Models\CrustSize;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCrustSizeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('crust_size_create');
    }

    public function rules()
    {
        return [
            'crust_id' => [
                'required',
                'integer',
            ],
            'amount' => [
                'required',
            ],
        ];
    }
}
