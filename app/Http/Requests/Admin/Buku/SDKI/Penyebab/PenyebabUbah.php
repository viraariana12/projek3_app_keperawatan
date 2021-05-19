<?php

namespace App\Http\Requests\Admin\Buku\SDKI\Penyebab;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class PenyebabUbah extends FormRequest
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
        $id_penyebab = $this->route('penyebab');

        return [
            "nama" => [
                "required",
                Rule::unique('penyebab','nama')
                ->ignore($id_penyebab, 'id_penyebab')
            ],
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
