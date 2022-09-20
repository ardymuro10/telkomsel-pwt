<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessInfoRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'identity_number' => ['required', 'integer', 'digits:16'],
            'birth_place' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'marriage_status' => ['required', 'string', 'in:kawin,belum kawin,cerai'],
            'rt' => ['nullable', 'string', 'max:5'],
            'rw' => ['nullable', 'string', 'max:5'],
            'address' => ['required', 'string', 'max:255'],
            'jenisusaha' => ['required', 'string', 'max:255'],
            'jenisbarang' => ['required', 'string', 'max:255'],
            'mulaiusaha' => ['required', 'integer', 'digits:4'],
            'lokasiusaha' => ['required', 'string', 'max:255'],
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
            'marriage_status' => 'status perkawinan',
            'rt' => 'rt',
            'rw' => 'rw',
            'address' => 'alamat',
            'jenisusaha' => 'jenis usaha',
            'jenisbarang' => 'jenis barang',
            'mulaiusaha' => 'mulai usaha tahun',
            'lokasiusaha' => 'lokasi usaha',
            'status' => 'status',
        ];
    }
}
