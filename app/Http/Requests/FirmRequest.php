<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FirmRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:64|unique:firms,name,'.$this->id,
            'logo_url' => 'nullable|url|max:1024',
            'image_url' => 'nullable|url|max:1024',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'brands.*' => 'required|string'
        ];
    }
}
