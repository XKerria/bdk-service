<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'amount' => 'required|integer|between:0,99999',
            'remain' => 'required|integer|between:0,99999',
            'series_id' => 'required|exists:series,id',
            'firm_id' => 'required|exists:firms,id'
        ];
    }
}
