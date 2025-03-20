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
    
}
