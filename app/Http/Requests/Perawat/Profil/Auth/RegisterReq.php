<?php

namespace App\Http\Requests\Perawat\Profil\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterReq extends FormRequest
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
            "email" => ["required","email","unique:perawat,email"],
            "password" => ["required"]
        ];
    }

    public function attributes()
    {
        return [
            "nama" => "Nama",
            "email" => "Alamat E-Mail",
            "password" => "Password",
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
