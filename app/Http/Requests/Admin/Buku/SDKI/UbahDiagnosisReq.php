<?php

namespace App\Http\Requests\Admin\Buku\SDKI;

use App\Models\MasterKeperawatan\SDKI\Diagnosis;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UbahDiagnosisReq extends FormRequest
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

        $diagnosis = $this->route('diagnosi');

        $diagnosis = Diagnosis::findOrFail($diagnosis);

        return [
            "nama" => "required",
            "definisi" => "required",
            "kode" => ["required", Rule::unique("diagnosis_keperawatan","kode")->ignore($diagnosis->kode , "kode")]
        ];
    }

    public function messages()
    {
        return [
            "required" => "Kolom ini wajib diisi",
            "unique" => "Sudah ada yang menggunakan"
        ];
    }
}
