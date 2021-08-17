<?php

namespace App\Http\Requests;

use App\Models\CustomerManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCustomerManagementRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('customer_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:customer_managements,id',
        ];
    }
}
