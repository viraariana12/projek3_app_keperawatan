<?php

namespace App\Http\Requests\Admin\Buku\SLKI\Luaran;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class LuaranUbah extends FormRequest
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
        $id_luaran = $this->route('luaran');

        return [
            "nama" => [
                "required",
                Rule::unique('luaran_keperawatan','nama')
                ->ignore($id_luaran, 'id_luaran_keperawatan')
            ],
            "definisi" => ["required"],
            "kode" => [
                "required",
                Rule::unique('luaran_keperawatan','kode')
                ->ignore($id_luaran, 'id_luaran_keperawatan')
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
