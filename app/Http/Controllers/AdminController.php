<?php

namespace App\Http\Controllers;

use App\Models\AdminActiveLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $users = AdminActiveLogs::paginate(10);
        return view('admin.users.index')->with('users', $users);
    }
    public function blockUser(Request $request, $id)
    {
        $request->validate([
            'block_until' => 'required|numeric|min:1',

        ]);
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
}
