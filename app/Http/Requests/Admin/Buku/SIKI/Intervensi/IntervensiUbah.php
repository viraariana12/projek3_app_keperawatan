<?php

namespace App\Http\Requests\Admin\Buku\SIKI\Intervensi;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class IntervensiUbah extends FormRequest
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
        $id_intervensi = $this->route('diagnosi');

        return [
            "nama" => [
                "required",
                Rule::unique('intervensi_keperawatan','nama')
                ->ignore($id_intervensi, 'id_intervensi_keperawatan')
            ],
            "definisi" => ["required"],
            "kode" => [
                "required",
                Rule::unique('intervensi_keperawatan','kode')
                ->ignore($id_intervensi, 'id_intervensi_keperawatan')
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
