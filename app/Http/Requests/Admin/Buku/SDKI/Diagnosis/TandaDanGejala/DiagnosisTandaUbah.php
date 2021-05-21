<?php

namespace App\Http\Requests\Admin\Buku\SDKI\Diagnosis\TandaDanGejala;

use Illuminate\Foundation\Http\FormRequest;

class DiagnosisTandaUbah extends FormRequest
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
            "mayor" => ["required", "boolean"],
            "objektif" => ["required", "boolean"]
        ];
    }

    public function attributes()
    {
        return [
            "mayor" => "Mayor/Minor",
            "objektif" => "Objektif/Subjektif"
        ];
    }

    public function messages()
    {
        return [
            "required" => "Kolom :attribute wajib diisi",
        ];
    }
}
