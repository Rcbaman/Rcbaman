<?php

namespace App\Http\Requests;

use App\Models\TaxProfile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTaxProfileRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tax_profile_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'type' => [
                'string',
                'nullable',
            ],
            'value' => [
                'string',
                'nullable',
            ],
        ];
    }
}
