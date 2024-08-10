<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;


class Bienfilterrequest extends FormRequest
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
            'slug' => ['required'],
            'vendu' => ['required'],
            'titre' => ['required'],
            'adresse' => ['required'],
            'ville' => ['required'],
            'code_postal' => ['required'],
            'surface' => ['required'],
            'nb_pieces' => ['required'],
            'prix' => ['required'],
            'nb_chambres' => ['required'],
            'nb_étages' => ['required'],
            'chauffage' => ['required'],
            'description' => ['required'],
            'photos' => ['required', 'array'],
            'photos.*' => ['required', 'image'],
        ];

    }
    public function prepareForValidation()
    {
        $this -> merge([
            'slug' => $this->input('slug') ?: str::slug( $this->input('titre'), '-' ),
            'vendu' => $this->input('vendu') ? true : false,
            'chauffage' => $this->input('chauffage') ? true : false,
        ]);
    }
}
