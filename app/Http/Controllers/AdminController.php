<?php

namespace App\Http\Controllers;

use App\Models\AdminActiveLogs;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\BlockUserPostRequest;
use App\Http\Requests\Admin\AddUserPostRequest;
use App\Http\Requests\Admin\UpdateUserPostRequest;

class AdminController extends Controller
{
    public function index()
    {
        $users = AdminActiveLogs::paginate(10);
        return view('admin.users.index')->with('users', $users);
    }
    public function blockUser(BlockUserPostRequest $request, $id)
    {
        $request->validated();
        unset($request['_token']);
        $user = AdminActiveLogs::where('user_id', $id)->first();
        if ($user) {
            $user->active = false;
            $user->expires_at = now()->addDays((int)$request->block_until);
            $user->activated_at = null;
            $user->created_by = Auth::id() ?? 2;
            $user->save();
        }

        return redirect()->back();
    }

    public function unblockUser($id)
    {
        $user = AdminActiveLogs::where('user_id', $id)->first();
        if ($user) {
            $user->active = true;
            $user->expires_at = null;
            $user->activated_at = now();
            $user->created_by = Auth::id() ?? 2;
            $user->save();
        }
        return redirect()->back();
    }

    public function addUser(AddUserPostRequest $request)
    {
        $request->validated();
        $data = $request->all();
        unset($data['_token']);
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->is_dnc_student = $data['is_dnc_student'] ?? 0;
        if(isset($data['is_dnc_student'])) { 
            $user->student_id = $data['student_id'] ?? null;
            $user->class_id = $data['class_id'] ?? null;
        } else {
            $user->student_id = null;
            $user->class_id = null;   
        }
        if ($data['role'] == 1) {
            $user->role_id = 1;
        } else {
            $user->role_id = 2;
        }
        $user->save();
        $adminActiveLog = new AdminActiveLogs();
        $adminActiveLog->user_id = $user->id;
        $adminActiveLog->active = true;
        $adminActiveLog->expires_at = null;
        $adminActiveLog->activated_at = now();
        $adminActiveLog->created_by = Auth::id() ?? 2;
        $adminActiveLog->save();
        return redirect()->back()->with('success', 'Thêm người dùng thành công');
    }

    public function updateUser(UpdateUserPostRequest $request, $id)
    {
        $request->validated();
        $data = $request->all();
        unset($data['_token']);
        $user = User::find($id);
        if ($user) {
            $user->name = $data['name'];
            $user->email = $data['email'];
            if ($data['password']) {
                $user->password = Hash::make($data['password']);
            }
            $user->is_dnc_student = $data['is_dnc_student'] ?? 0;
            if(isset($data['is_dnc_student'])) { 
                $user->student_id = $data['student_id'] ?? null;
                $user->class_id = $data['class_id'] ?? null;
            } else {
                $user->student_id = null;
                $user->class_id = null;   
            }
            if ($data['role'] == 1) {
                $user->role_id = 1;
            } else {
                $user->role_id = 2;
            }
            $user->save();
            $adminActiveLog = AdminActiveLogs::where('user_id', $id)->first();
            if ($adminActiveLog) {
                $adminActiveLog->active = true;
                $adminActiveLog->expires_at = null;
                $adminActiveLog->activated_at = now();
                $adminActiveLog->created_by = Auth::id() ?? 2;
            } else {
                $adminActiveLog = new AdminActiveLogs();
                $adminActiveLog->user_id = $user->id;
                $adminActiveLog->active = true;
                $adminActiveLog->expires_at = null;
                $adminActiveLog->activated_at = now();
                $adminActiveLog->created_by = Auth::id() ?? 2;
            }
            $adminActiveLog->save();
        }
        return redirect()->back()->with('success', 'Cập nhật người dùng thành công');
    }
}
