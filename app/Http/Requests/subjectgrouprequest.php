<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class subjectgrouprequest extends FormRequest
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
            'GROUP_ID'=>'required|max:255',
            'CLASS_ID'=>'required',
            'SECTION_ID' =>'required',
            'SESSION_ID' =>'required',
        ];
    }
}
