<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title'=> 'required|max:255',
            'isbn'=> 'required|max:20',
            'publ_date'=> 'required',
            'publ_house'=> 'required|max:255',
            'description' => 'required',
        ];
    }
    public function messages(){
        return[
            'title.required'=> 'Pole tytuł jest wymagane',
            'isbn.required'=> 'Pole ISBN jest wymagane',
            'publ_date.required'=> 'Pole data opublikowania jest wymagane',
            'publ_house.required'=> 'Pole wydawnictwo jest wymagane',
            'description.required' => 'Pole opis jest wymagane'
        ];
    }
}
