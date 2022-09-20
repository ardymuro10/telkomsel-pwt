<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserListRequest extends FormRequest
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
            'telegram_id' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'nohp' => ['required', 'string', 'max:255'],
            'rt' => ['nullable', 'string', 'max:5'],
            'rw' => ['nullable', 'string', 'max:5'],
            'address' => ['required', 'string', 'max:255'],
        ];
    }

    public function attributes()
    {
        return [
            'telegram_id' => 'id telegram',
            'name' => 'nama',
            'nohp' => 'no hp',
            'rt' => 'rt',
            'rw' => 'rw',
            'address' => 'alamat',
        ];
    }
}
