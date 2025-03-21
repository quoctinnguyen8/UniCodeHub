<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function register()
    {
        return view('account.register');
    }

    public function registerPost(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|min:4',
            'cfpassword' => 'required|same:password',
            'is_dnc_student' => 'nullable|boolean',
        ]);

         if ($request->input('is_dnc_student') == 1) {
            $request->validate([
                'email' => 'required|email|unique:users,email|max:255|ends_with:@student.dnc.edu',
                'student_id' => 'required|string|max:10',
                'class_id' => 'required|string|max:20',
            ]);
        }
 
        $data = $request->only('name', 'email', 'password', 'is_dnc_student');
        $data['password'] = Hash::make($data['password']);
        $data['is_dnc_student'] = $request->input('is_dnc_student', 0); // Mặc định 0
        $data['role_id'] = 1;  

         if ($data['is_dnc_student']) {
            $data['student_id'] = $request->input('student_id');
            $data['class_id'] = $request->input('class_id');
        }

         User::create($data);

        return redirect()->route('login')
            ->with('success', 'Đăng ký tài khoản thành công');
    }

    public function login()
    {
        return view('account.login');
    }

    public function loginPost(Request $request)
    {
         $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

         $credentials = $request->only('email', 'password');

         if (Auth::attempt($credentials)) { 
            return redirect()->route('/')
                ->with('success', 'Đăng nhập thành công');
        }

         return redirect()->route('login')
            ->with('error', 'Email hoặc mật khẩu không đúng')
            ->withInput($request->except('password'));
    }
    // đăng xuất
    public function logout()
    {
        Auth::logout();
        
        return redirect()->route('login');
    }

}