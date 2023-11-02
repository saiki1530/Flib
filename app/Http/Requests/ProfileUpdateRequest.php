<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'avatar' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'], // validation cho ảnh đại diện (kiểu file ảnh và kích thước)
            'balance' => ['numeric', 'min:0'], // validation cho số dư tài khoản (kiểu số và giá trị tối thiểu là 0)
        ];
    }
    
}
