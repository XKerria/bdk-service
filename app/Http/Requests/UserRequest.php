<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:32',
            'phone' => 'required|string|max:32|unique:users,phone,'.$this->id,
            'firm_id' => 'required|string|exists:firms,id'
        ];
    }
}
