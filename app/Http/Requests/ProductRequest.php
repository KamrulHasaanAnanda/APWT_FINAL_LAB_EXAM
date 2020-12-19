<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
   
	public function rules()
    {
        return [
            'pname'=>'required|min:3',
            'pprice'=>'required',
            'quantity'=>'required|min:1'
        ];
    }
    
    public function messages(){
        return [
            'pname.required'=> "can't left empty....",
            'pname.min'=> "must be at least 3 ch...."
        ];
    }
}
