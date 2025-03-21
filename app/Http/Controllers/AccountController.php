<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
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