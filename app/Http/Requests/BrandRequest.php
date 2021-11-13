<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:64|unique:brands,name,'.$this->id,
            'logo_url' => 'required|url|max:1024',
            'letter' => 'required|string|size:1'
        ];
    }
}
