<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DifferentDataRequest extends FormRequest
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
            'rt' => ['nullable', 'string', 'max:5'],
            'rw' => ['nullable', 'string', 'max:5'],
            'address' => ['required', 'string', 'max:255'],
            'document' => ['required', 'string', 'max:255'],
            'number' => ['required', 'integer', 'digits_between:1,20'],
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
            'rt' => 'rt',
            'rw' => 'rw',
            'address' => 'alamat',
            'document' => 'dokumen',
            'number' => 'nomor',
            'status' => 'status',
        ];
    }
}
