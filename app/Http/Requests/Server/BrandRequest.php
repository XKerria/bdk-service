<?php

namespace App\Http\Requests\Server;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name' => 'required|string|max:64|unique:brands,name,'.$this->id,
            'logo' => 'required|url|max:1024',
            'letter' => 'required|string|size:1'
        ];
    }
}
