<?php

namespace App\Http\Requests;

use App\Models\ProductProfile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductProfileRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_profile_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
        ];
    }
}
