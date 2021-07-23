<?php

namespace App\Http\Requests\Server;

use Illuminate\Foundation\Http\FormRequest;

class FirmRequest extends FormRequest
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
            'logo' => 'required|url|max:1024',
            'name' => 'required|string|max:64|unique:brands,name',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|url|max:1024',
            'brands' => 'nullable|array'
        ];
    }
}
