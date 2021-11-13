<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image_url' => 'required|url|max:1024',
            'text' => 'nullable|string|max:64',
            'disabled' => 'nullable|boolean',
            'order' => 'nullable|integer|between:0,9999',
        ];
    }
}
