<?php
namespace Drstock\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreJournalRequest extends FormRequest {
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
'date_debut'=> 'required|date_format:Y-m-d',
'date_fin'=> 'date_format:Y-m-d|after:date_debut',
'id_art' => 'required',
            
        ];
    }
}