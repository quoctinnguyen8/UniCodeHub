<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Submissions;
use Illuminate\Support\Facades\Auth;

class SubmissionsController extends Controller
{
    public function index() //dung de hien thi danh sach file da duoc upload
    {
        $submissions = Submissions::all(); //lay tat ca cac ban ghi trong bang submissions
        return view('submissions', compact('submissions'));
    }

    public function store(Request $request) //dung de luu file va thong tin cua file
    {
        $request->validate([
            'source_code' => 'required',
            'exercise_id' => 'required',
        ]);
        $data = $request->all();
        unset($data['_token']);

        $data['user_id'] = Auth::id() ?? 2;
        $data['score'] = 0;
        Submissions::create($data);
        return view('submissions');
    }
}
