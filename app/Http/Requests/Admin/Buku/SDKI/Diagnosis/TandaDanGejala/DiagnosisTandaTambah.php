<?php

namespace App\Http\Requests\Admin\Buku\SDKI\Diagnosis\TandaDanGejala;

use Illuminate\Foundation\Http\FormRequest;

class DiagnosisTandaTambah extends FormRequest
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
            "id_tanda_dan_gejala" => ["required", "exists:tanda_dan_gejala,id_tanda_dan_gejala"],
            "mayor" => ["required", "boolean"],
            "objektif" => ["required", "boolean"]
        ];
    }

    public function attributes()
    {
        return [
            "id_tanda_dan_gejala" => "Tanda Dan Gejala",
            "mayor" => "Mayor/Minor",
            "objektif" => "Objektif/Subjektif"
        ];
    }

    public function messages()
    {
        return [
            "required" => "Kolom :attribute wajib diisi",
            "unique" => ":attribute ini sudah ada yang menggunakan"
        ];
    }
}
