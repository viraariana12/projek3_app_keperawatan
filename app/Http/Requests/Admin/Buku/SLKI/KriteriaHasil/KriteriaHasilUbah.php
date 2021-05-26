<?php

namespace App\Http\Requests\Admin\Buku\SLKI\KriteriaHasil;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class KriteriaHasilUbah extends FormRequest
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

        $id_kriteria_hasil = $this->route('kriteria_hasil');

        return [
            "nama" => ["required", Rule::unique('kriteria_hasil','nama')->ignore($id_kriteria_hasil,'id_kriteria_hasil')]
        ];

    }

    public function attributes()
    {
        return [
            "nama" => "Nama"
        ];
    }

    public function messages()
    {
        return [
            "unique" => ":attribute ini sudah ada yang menggunakan"
        ];
    }
}
