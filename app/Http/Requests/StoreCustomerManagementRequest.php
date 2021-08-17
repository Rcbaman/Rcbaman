<?php

namespace App\Http\Requests;

use App\Models\CustomerManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCustomerManagementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_management_create');
    }

    public function rules()
    {
        return [
            'mobile_number' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:customer_managements,mobile_number',
            ],
            'first_name' => [
                'string',
                'required',
            ],
            'last_name' => [
                'string',
                'nullable',
            ],
            'email' => [
                'required',
                'unique:customer_managements',
            ],
            'dob' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
