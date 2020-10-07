<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class campusrequest extends FormRequest
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
            'schoolname' => 'required|max:255',
            'schooladdress' => 'required|max:255',
            'phoneno' => 'required',
            'city' =>   'required|max:255',
            'instuition'=> 'required',
            'status'=>  'required',
            'smsstatus'=>  'required',
            'billingcharges' => 'required|max:255',
            'discount' => 'required',
            'billingdate' => 'required',
        ];
    }
}
