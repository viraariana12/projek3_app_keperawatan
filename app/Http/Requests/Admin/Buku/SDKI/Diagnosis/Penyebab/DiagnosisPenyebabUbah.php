<?php

namespace App\Http\Requests\Admin\Buku\SDKI\Diagnosis\Penyebab;

use Illuminate\Foundation\Http\FormRequest;

class DiagnosisPenyebabUbah extends FormRequest
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
            "id_jenis_penyebab" => ["required", "exists:jenis_penyebab,id_jenis_penyebab"]
        ];
    }

    public function attributes()
    {
        return [
            "id_jenis_penyebab" => "Jenis Penyebab"
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
