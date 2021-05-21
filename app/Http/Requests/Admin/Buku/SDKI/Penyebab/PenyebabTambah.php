<?php

namespace App\Http\Requests\Admin\Buku\SDKI\Penyebab;

use Illuminate\Foundation\Http\FormRequest;

class PenyebabTambah extends FormRequest
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
                "unique:App\Models\MasterKeperawatan\SDKI\Penyebab\Penyebab,nama"
            ]
        ];
    }

    public function attributes()
    {
        return [
            "nama" => "Nama",
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
