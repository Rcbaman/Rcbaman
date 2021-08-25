<?php

namespace App\Http\Requests;

use App\Models\Log;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLogRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('log_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'uuid' => [
                'string',
                'required',
            ],
            'device_ip' => [
                'string',
                'required',
            ],
            'device_type' => [
                'string',
                'nullable',
            ],
            'action' => [
                'string',
                'required',
            ],
        ];
    }
}
