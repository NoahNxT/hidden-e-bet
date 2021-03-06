<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsernameWithdrawKeyRequest extends FormRequest
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
            'username' => 'string|min:3|max:12',
            'withdrawKey' => 'nullable|string|min:34|max:34',
        ];
    }
}
