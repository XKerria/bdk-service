<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlackRequest extends FormRequest
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
            'name' => 'required|string|max:32',
            'phone' => 'required|string|max:11',
            'description' => 'nullable|string|max:255',

            'images.*.src' => 'required|url|max:1024',
            'images.*.type' => 'required|string|max:10',
            'images.*.height' => 'required|integer|min:0',
            'images.*.width' => 'required|integer|min:0',
        ];
    }
}
