<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
            'amount' => 'required|integer|between:0,99999',
            'remain' => 'required|integer|between:0,99999',
            'series_id' => 'required|exists:series,id',
            'firm_id' => 'required|exists:firms,id',
        ];
    }
}
