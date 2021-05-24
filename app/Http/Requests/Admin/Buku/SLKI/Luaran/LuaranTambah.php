<?php

namespace App\Http\Requests\Admin\Buku\SLKI\Luaran;

use Illuminate\Foundation\Http\FormRequest;

class LuaranTambah extends FormRequest
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
            "nama" => [
                "required",
                "unique:App\Models\MasterKeperawatan\SLKI\Luaran,nama"
            ],
            "definisi" => ["required"],
            "kode" => [
                "required",
                "unique:App\Models\MasterKeperawatan\SLKI\Luaran,kode"
            ]
        ];
    }

    public function attributes()
    {
        return [
            "nama" => "Nama",
            "definisi" => "Definisi",
            "kode" => "Kode"
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
