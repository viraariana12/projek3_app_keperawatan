<?php

namespace App\Http\Requests\Perawat\Pengguna\Pasien;

use Illuminate\Foundation\Http\FormRequest;

class PasienTambah extends FormRequest
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
            "nama" => ["required"],
            "no_rm" => ["required", "unique:pasien,no_rm"],
            "jenis_kelamin" => ["required","boolean"],
            "tempat_lahir" => ["required"],
            "tanggal_lahir" => ["required","date"],
            "alamat" => ["required"],
            "no_hp" => ["required"],
            "email" => ["required","email", "unique:pasien,email"]
        ];
    }

    public function attributes()
    {
        return [
            "nama" => "Nama",
            "no_rm" => "No RM",
            "jenis_kelamin" => "Jenis Kelamin",
            "tempat_lahir" => "Tempat Lahir",
            "tanggal_lahir" => "Tanggal Lahir",
            "alamat" => "Alamat",
            "no_hp" => "No HP",
            "email" => "Alamat E-Mail"
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
