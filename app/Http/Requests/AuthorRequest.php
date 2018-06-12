<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
    public function rules()
    {
        return [
            'last_name'=>'required|max:255',
            'first_name'=>'required|max:255',
            'description'=>'required',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages(){
    {
        return [
            'last_name.required'=>'Pole nazwisko jest wymagane',
            'first_name.required'=>'Pole imię jest wymagane',
            'description.required'=>'Pole opis jest wymagane',
        ];
    }
}
}
