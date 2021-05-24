<?php

namespace App\Http\Requests\Perawat\Profil\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginReq extends FormRequest
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
            "email" => ["required", "email" ,"exists:perawat,email"],
            "password" => ["required"]
        ];
    }

    public function attributes()
    {
        return [
            "email" => "Alamat E-Mail",
            "password" => "Password",
        ];
    }

    public function messages()
    {
        return [
            "required" => "Kolom :attribute wajib diisi",
            "exists" => ":attribute tidak ditemukan"
        ];
    }
}
