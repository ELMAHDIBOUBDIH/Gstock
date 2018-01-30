<?php

namespace Drstock\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest {

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
    'barre_code' => 'required|numeric|unique:articles,barre_code,'.$this->id,
            'name' => 'required',
            'Brand' => 'required',
            'prix_vente' => 'required|numeric|',
            'prix_achat' => 'required|numeric|max:prix_vente',
            'available_qnt' => 'required|numeric',
            'min_qnt' => 'required|numeric'
        ];
    }

}
