<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefeicaoRequest extends FormRequest
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
            'nm_refeicao' => 'required',
            'desc_refeicao' => 'required',
            'vl_refeicao' => 'required',
            'qt_refeicao' => 'required',
            'images.*' => 'required|image|mimes:jpeg,bmp,png'
        ];
    }
}
