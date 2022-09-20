<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoverLetterRequest extends FormRequest
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
            'gender' => ['required', 'string', 'in:laki-laki,perempuan'],
            'birth_place' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'nationality' => ['required', 'string', 'in:WNI,WNA'],
            'religion' => ['required', 'string', 'in:islam,katolik,protestan,hindu,budha,khonghucu,lainnya'],
            'marriage_status' => ['required', 'string', 'in:kawin,belum kawin,cerai'],
            'occupation' => ['required', 'string', 'max:255'],
            'education' => ['required', 'string', 'max:255'],
            'rt' => ['nullable', 'string', 'max:5'],
            'rw' => ['nullable', 'string', 'max:5'],
            'address' => ['required', 'string', 'max:255'],
            'proof_of_self' => ['nullable', 'string', 'max:255'],
            'necessity' => ['required', 'string', 'max:255'],
            'valid_from' => ['required', 'date'],
            'description' => ['required', 'string', 'max:255'],
            'status' => ['string'],

        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nama',
            'identity_number' => 'nik',
            'gender' => 'jenis kelamin',
            'birth_place' => 'tempat lahir',
            'birth_date' => 'tanggal lahir',
            'nationality' => 'warga negara',
            'religion' => 'agama',
            'marriage_status' => 'status perkawinan',
            'occupation' => 'pekerjaan',
            'education' => 'pendidikan',
            'rt' => 'rt',
            'rw' => 'rw',
            'address' => 'alamat',
            'proof_of_self' => 'surat bukti diri',
            'necessity' => 'keperluan',
            'valid_from' => 'tanggal berlaku',
            'description' => 'keterangan',
            'status' => 'status',
        ];
    }
}
