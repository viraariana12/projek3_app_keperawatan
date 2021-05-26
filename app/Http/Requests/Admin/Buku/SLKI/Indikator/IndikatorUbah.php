<?php

namespace App\Http\Requests\Admin\Buku\SLKI\Indikator;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class IndikatorUbah extends FormRequest
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
        $id_indikator = $this->route('indikator');

        return [
            "nama" => [
                "required",
                Rule::unique('indikator_luaran','nama')
                ->ignore($id_indikator, 'id_indikator_luaran')
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
