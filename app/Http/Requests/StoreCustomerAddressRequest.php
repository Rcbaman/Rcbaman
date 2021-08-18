<?php

namespace App\Http\Requests;

use App\Models\CustomerAddress;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCustomerAddressRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_address_create');
    }

    public function rules()
    {
        return [
            'customer_id' => [
                'required',
                'integer',
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
