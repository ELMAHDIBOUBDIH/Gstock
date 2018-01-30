<?php

namespace Drstock\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCmdventeRequest extends FormRequest {

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
        'client_id'=>'required',
           'date' => 'required|date|after:1/1/2017',

        ];
    }

}
