<?php

namespace App\Http\Requests;

use App\Models\Address;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAddressRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('address_edit');
    }

    public function rules()
    {
        return [
            'customers.*' => [
                'integer',
            ],
            'customers' => [
                'required',
                'array',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'address_2' => [
                'string',
                'nullable',
            ],
            'country' => [
                'string',
                'nullable',
            ],
            'state' => [
                'string',
                'nullable',
            ],
            'zip' => [
                'string',
                'nullable',
            ],
        ];
    }
}
