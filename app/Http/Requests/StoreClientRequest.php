<?php

namespace Drstock\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest {

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
           'tel' => 'required|regex:/(06)[0-9]{8}/',
           'fax' => 'nullable|regex:/(05)[0-9]{8}/',
           'mail' => 'required|email|unique:clients',
        ];
    }

}
