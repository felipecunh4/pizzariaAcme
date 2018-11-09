<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BebidaRequest extends FormRequest
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
            'nm_bebida' => 'required',
            'vl_bebida' => 'required',
            'qt_bebida' => 'required',
            'images.*' => 'required|image|mimes:jpeg,bmp,png',
            'desc_bebida' => 'required',
        ];
    }
}
