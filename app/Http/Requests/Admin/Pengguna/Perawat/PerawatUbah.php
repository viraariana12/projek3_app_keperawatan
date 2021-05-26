<?php

namespace App\Http\Requests\Admin\Pengguna\Perawat;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PerawatUbah extends FormRequest
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
        $id_perawat = $this->route('perawat');

        return [
            "nama" => ["required"],
            "email" => ["required",
                Rule::unique("perawat","email")
                ->ignore($id_perawat, "id_perawat")
            ],
            "aktif" => ["required", "boolean"]
        ];
    }

    public function attributes()
    {
        return [
            "nama" => "Nama",
            "email" => "Alamat E-Mail",
            "aktif" => "Aktif"
        ];
    }

    public function messages()
    {
        return [
            "required" => "Kolom :attribute wajib diisi",
            "unique" => ":attribute sudah ada yang menggunakan"
        ];
    }
}
