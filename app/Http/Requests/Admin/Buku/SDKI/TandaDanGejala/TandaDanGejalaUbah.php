<?php

namespace App\Http\Requests\Admin\Buku\SDKI\TandaDanGejala;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class TandaDanGejalaUbah extends FormRequest
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
        $id_tanda_dan_gejala = $this->route('tanda_dan_gejala');

        return [
            "nama" => [
                "required",
                Rule::unique('tanda_dan_gejala','nama')
                ->ignore($id_tanda_dan_gejala, 'id_tanda_dan_gejala')
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
