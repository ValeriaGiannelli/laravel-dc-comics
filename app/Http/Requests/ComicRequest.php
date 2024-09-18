<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|min:3',
            'thumb'=>'required|min:3',
            'price'=>'required|min:3|max:30',
            'series'=>'required|min:3|max:70',
            'sale_date'=>'required|date',
            'type'=>'required|min:3|max:70',
        ];
    }

    // funzione per la modifica degli errori
    public function messages(): array {
        return [
            'title.required' => 'Il titolo è un campo obbligatorio',
            'title.min' => 'Il titolo deve avere almeno :min caratteri',
            'thumb.required' => 'L\'immagine è un campo obbligatorio',
            'thumb.min' => 'L\'immagine deve avere almeno :min caratteri',
            'price.required' => 'Il prezzo è un campo obbligatorio',
            'price.min' => 'Il prezzo deve avere almeno :min caratteri',
            'price.max' => 'Il prezzo deve avere massimo :max caratteri',
            'series.required' => 'La serie è un campo obbligatorio',
            'series.min' => 'La serie deve avere almeno :min caratteri',
            'series.max' => 'La serie deve avere massimo :max caratteri',
            'sale_date.required' => 'La data è un campo obbligatorio',
            'sale_date.date' => 'La data deve avere un formato corretto',
            'type.required' => 'La tipologia è un campo obbligatorio',
            'type.min' => 'La tipologia deve avere almeno :min caratteri',
            'type.max' => 'La tipologia deve avere massimo :max caratteri',
        ];
    }
}
