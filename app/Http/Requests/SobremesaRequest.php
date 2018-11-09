<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SobremesaRequest extends FormRequest
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
            'nm_sobremesa' => 'required',
            'vl_sobremesa' => 'required',
            'qt_sobremesa' => 'required',
            'desc_sobremesa' => 'required',
            'images.*' => 'required|image|mimes:jpeg,bmp,png',
        ];
    }
}
