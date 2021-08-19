<?php

namespace App\Http\Requests;

use App\Models\CustomerDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCustomerDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_detail_edit');
    }

    public function rules()
    {
        return [
            'first_name' => [
                'string',
                'nullable',
            ],
            'last_name' => [
                'string',
                'nullable',
            ],
            'email' => [
                'required',
                'unique:customer_details,email,' . request()->route('customer_detail')->id,
            ],
            'mobile_number' => [
                'string',
                'required',
                'unique:customer_details,mobile_number,' . request()->route('customer_detail')->id,
            ],
            'dob' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
