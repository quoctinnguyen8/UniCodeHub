<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class RegisterPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // tạo validate request cho registerPost
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email'),
                'ends_with:@student.nctu.edu.vn'
            ],
            'password' => 'required|min:4',
            'cfpassword' => 'required|same:password',
            'is_dnc_student' => 'boolean',
        ];
    }
    
    // thêm cái field
    public function attributes(): array
    {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'cfpassword' => 'Xác nhận mật khẩu',
            'is_dnc_student' => 'Sinh viên DNC'
        ];
    }

}
