<?php

namespace Drstock\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCmdachatRequest extends FormRequest {

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
       
           'provider_id'=>'required',
           'date' => 'required|date',

        ];
    }

}