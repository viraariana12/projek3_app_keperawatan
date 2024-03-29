<?php

namespace App\Http\Requests\Admin\Profil;

use Illuminate\Foundation\Http\FormRequest;

class ProfilUpdateReq extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return true;
        return !$this->user()->tokenCan('admin:super');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
