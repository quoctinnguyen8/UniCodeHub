<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddUserPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
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
            'password' => 'required|string|min:4|confirmed',
            'is_dnc_student' => 'nullable|boolean',
            'student_id' => 'nullable|string|max:255',
            'class_id' => 'nullable|string|max:255',
            'role' => [
                'required',
                'integer',
                Rule::in([1, 2]), // Assuming 1 is for admin and 2 is for user
            ]
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'password_confirmation' => 'Xác nhận mật khẩu',
            'is_dnc_student' => 'Sinh viên DNC',
            'student_id' => 'Mã sinh viên',
            'class_id' => 'Lớp',
            'role' => 'Quyền'
        ];
    }
}
