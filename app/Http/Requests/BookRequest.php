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
            'title' =>'required',
            'isbn' =>'required',
            'langue' =>'required',
            'annee_acqui' =>'required',
            'nb_partie' =>'required',
            'nb_exemplaire' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' =>'Le titre est obligatoire',
            'isbn.required' =>'L Isbn est obligatoire',
            'langue.required' =>'La langue est obligatoire',
            'annee_acqui.required' =>'La date d acquisition est obligatoire',
            'nb_partie.required' =>'Le nombre de partie est obligatoire',
            'nb_exemplaire.required' =>'Le nombre d exemplaire est obligatoire',
        ];
    }
}
