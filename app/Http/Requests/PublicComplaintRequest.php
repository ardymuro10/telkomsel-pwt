<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicComplaintRequest extends FormRequest
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
            'complaint' => ['required', 'string', 'max:1000'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nama',
            'complaint' => 'pengaduan',
        ];
    }
}
