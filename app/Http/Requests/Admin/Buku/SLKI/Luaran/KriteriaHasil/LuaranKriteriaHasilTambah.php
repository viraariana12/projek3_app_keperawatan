<?php

namespace App\Http\Requests\Admin\Buku\SLKI\Luaran\KriteriaHasil;

use Illuminate\Foundation\Http\FormRequest;

class LuaranKriteriaHasilTambah extends FormRequest
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
            "id_kriteria_hasil" => ["required", "exists:kriteria_hasil,id_kriteria_hasil"]
        ];
    }

    public function attributes()
    {
        return [
            "id_kriteria_hasil" => "Kriteria Hasil"
        ];
    }

    public function messages()
    {
        return [
            "required" => "Kolom :attribute ini wajib diisi",
            "exists" => ":attribute ini tidak ditemukan"
        ];
    }

}
