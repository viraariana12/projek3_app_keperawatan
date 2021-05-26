<?php

namespace App\Http\Requests\Admin\Buku\SLKI\Luaran\Indikator;

use Illuminate\Foundation\Http\FormRequest;

class LuaranIndikatorTambah extends FormRequest
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
            "id_indikator_luaran" => ["required", "exists:indikator_luaran,id_indikator_luaran"],
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
