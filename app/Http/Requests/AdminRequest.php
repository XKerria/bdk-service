<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|string|between:2,32',
            'phone' => 'required|string',
        ];
        if ($this->method() == 'POST') {
            $rules['password'] = 'required|string|between:6,32';
        }
        if ($this->method() == 'PUT') {
            $rules['password'] = 'nullable|string|between:6,32';
        }
        return $rules;
    }
}
