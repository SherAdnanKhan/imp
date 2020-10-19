<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeetypeRequest extends FormRequest
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
            'CLASS_ID'=>'required',
            'SECTION_ID'=>'required',
            'FEE_CAT_ID' =>'required|max:255',
            'SHIFT'=>'required',
            'SESSION_ID'=>'required',
        ];
    }
}
