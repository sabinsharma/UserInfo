<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitClientInfo extends FormRequest
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
	    switch ($this->request->get('prov_id')){
			//if quebec is selected
		    case '2':
			    return [
				    'name'=>'min:2|required',
				    'prov_id'=>'required',
				    'telephone'=>['required','regex:/^\(?\d{3}[\-|\)][[:space:]]?\d{3}\-\d{4}$/'],
				    'postal'=>'required|regex:/^[A-Z]{1}\d{1}[A-Z]{1}[[:space:]]?\d{1}[A-Z]{1}\d{1}$/',
				    'salary'=>['required','regex:/^\d{1,3}(?(?=[[:space:]])([[:space:]]\d{3})*|)(?(?=\,)\,\d{2}|)$|(^(\d{1,3}(?(?=\,)(\,\d{3})*|\d*)(?(?=\.)\.\d{2}|))$)/'],
			    ];
			    break;
		    Default:
			    return [
				    'name'=>'min:2|required',
				    'prov_id'=>'required',
				    'telephone'=>['required','regex:/^\(?\d{3}[\-|\)][[:space:]]?\d{3}\-\d{4}$/'],
				    'postal'=>'required|regex:/^[A-Z]{1}\d{1}[A-Z]{1}[[:space:]]?\d{1}[A-Z]{1}\d{1}$/',
				    'salary'=>['required','regex:/^(\d{1,3}(?(?=\,)(\,\d{3})*|\d*)(?(?=\.)\.\d{2}|))$/'],
			    ];
			    break;
	    }

    }
}
