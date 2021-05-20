<?php

namespace App\Http\Requests\Admin\Buku\SIKI\Intervensi\Tindakan;

use Illuminate\Foundation\Http\FormRequest;

class IntervensiTindakanTambah extends FormRequest
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
            "id_tindakan_keperawatan" => ["required", "exists:tindakan_keperawatan,id_tindakan_keperawatan"],
            "id_jenis_tindakan_keperawatan" => ["required", "exists:jenis_tindakan_keperawatan,id_jenis_tindakan_keperawatan"]
        ];
    }

    public function attributes()
    {
        return [
            "id_tindakan_keperawatan" => "Tindakan",
            "id_jenis_tindakan_keperawatan" => "Jenis Tindakan"
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
