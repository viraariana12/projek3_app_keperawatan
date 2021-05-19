<?php

namespace App\Http\Requests\Admin\Buku\SDKI\Diagnosis;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class DiagnosisUbah extends FormRequest
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
        $id_diagnosis = $this->route('diagnosi');

        return [
            "nama" => [
                "required",
                Rule::unique('diagnosis_keperawatan','nama')
                ->ignore($id_diagnosis, 'id_diagnosis_keperawatan')
            ],
            "definisi" => ["required"],
            "kode" => [
                "required",
                Rule::unique('diagnosis_keperawatan','kode')
                ->ignore($id_diagnosis, 'id_diagnosis_keperawatan')
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
