<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'image_url' => 'required|url|max:1024',
            'price' => 'nullable|string|max:255',
            'brand_id' => 'required|exists:brands,id'
        ];
    }
}
