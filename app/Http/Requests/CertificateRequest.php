<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificateRequest extends FormRequest
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
            'telegram_id' => ['nullable'],
            'name' => ['required', 'string', 'max:255'],
            'identity_number' => ['required', 'integer', 'digits:16'],
            'birth_place' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'gender' => ['required', 'string', 'in:laki-laki,perempuan'],
            'nationality' => ['required', 'string', 'in:WNI,WNA'],
            'religion' => ['required', 'string', 'in:islam,katolik,protestan,hindu,budha,khonghucu,lainnya'],
            'rt' => ['nullable', 'string', 'max:5'],
            'rw' => ['nullable', 'string', 'max:5'],
            'address' => ['required', 'string', 'max:255'],
            'status' => ['string'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nama',
            'identity_number' => 'nik',
            'birth_place' => 'tempat lahir',
            'birth_date' => 'tanggal lahir',
            'gender' => 'jenis kelamin',
            'nationality' => 'warga negara',
            'religion' => 'agama',
            'rt' => 'rt',
            'rw' => 'rw',
            'address' => 'alamat',
            'status' => 'status',
        ];
    }
}
