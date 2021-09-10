<?php

namespace App\Http\Requests\Server;

use Illuminate\Foundation\Http\FormRequest;

class SeriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'image' => 'required|url|max:1024',
            'price' => 'nullable|string|max:255',
            'brand_id' => 'required|exists:brands,id'
        ];
    }
}
