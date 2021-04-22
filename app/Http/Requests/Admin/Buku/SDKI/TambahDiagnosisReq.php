<?php

namespace App\Http\Requests\Admin\Buku\SDKI;

use Illuminate\Foundation\Http\FormRequest;

class TambahDiagnosisReq extends FormRequest
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
            "nama" => "required",
            "definisi" => "required",
            "kode" => "required|unique:App\Models\MasterKeperawatan\SDKI\Diagnosis,kode"
        ];
    }


    public function messages()
    {
        return [
            "required" => "Kolom ini wajib diisi",
            "unique" => "Sudah ada yang menggunakan"
        ];
    }

}
