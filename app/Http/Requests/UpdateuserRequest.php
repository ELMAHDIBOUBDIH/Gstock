<?php

namespace Drstock\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateuserRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [

           'name' => 'required|max:25',
           'email' => 'required|email|unique:Users,email,'.$this->id,
           'username' => 'required|unique:Users,username,'.$this->id,
'password' =>'Required|AlphaNum|Between:4,8|Confirmed',
'password_confirmation'=>'Required|AlphaNum|Between:4,8'
           
        ];
    }

}
