<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:100'],
            'author' => ['required', 'string'],
            'genre_id' => ['nullable', 'exists:genres,id'],
            'types' => ['nullable', 'exists:types,id'],

            'publication_year' => ['required', 'integer'],
            'price' => ['required', 'numeric', 'decimal: 0,2'],
            'abstract' => ['nullable', 'string']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.string' => 'Il titolo deve essere una stringa',
            'title.max' => 'Il titolo deve massimo di 100 caratteri',

            'author.required' => 'L\'autore è obbligatorio',
            'author.string' => 'L\'autore deve essere una stringa',

            'genre.exists' => 'Il genere deve appartenere alla lista dei generi',
            'type.exists' => 'Il tipo deve appartenere alla lista delle tipologie',

            'publication_year.required' => 'L\'anno di pubblicazione è obbligatorio',
            'publication_year.integer' => 'L\'anno di pubblicazione deve essere un numero',

            'price.required' => 'Il prezzo è obbligatorio',
            'price.numeric' => 'Il prezzo deve essere un numero',
            'price.decimal' => 'Il prezzo può avere solo 2 valori decimali',

            'abstract.string' => 'La descrizione deve essere una stringa',
        ];
    }
}
