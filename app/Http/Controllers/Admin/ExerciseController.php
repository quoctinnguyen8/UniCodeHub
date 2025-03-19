<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exercise;

class ExerciseController extends Controller
{
    /**
     * Hiển thị danh sách bài tập.
     */
    public function index()
    {
        $exercises = Exercise::all(); // Lấy danh sách bài tập
        return view('exercises.index', compact('exercises')); // Đảm bảo đường dẫn đúng
    }



    /**
     * Hiển thị form tạo bài tập mới.
     */
    public function create()
{
    return view('exercises.create'); // Đổi lại view path
}
    /**
     * Lưu bài tập mới vào cơ sở dữ liệu.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Exercise::create($request->all());

        return redirect()->route('exercises.index')->with('success', 'Thêm bài tập thành công.');
    }

    /**
     * Hiển thị chi tiết bài tập (có thể bổ sung nếu cần).
     */
    public function show($id)
    {
        $exercise = Exercise::findOrFail($id);
        return view('exercises.show', compact('exercise'));
    }

    /**
     * Hiển thị form chỉnh sửa bài tập.
     */
    public function edit($id)
    {
        $exercise = Exercise::findOrFail($id);
        return view('exercises.edit', compact('exercise'));
    }

    /**
     * Cập nhật thông tin bài tập.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $exercise = Exercise::findOrFail($id);
        $exercise->update($request->all());

        return redirect()->route('exercises.index')->with('success', 'Cập nhật bài tập thành công.');
    }

    /**
     * Xóa bài tập.
     */
    public function destroy($id)
    {
        $exercise = Exercise::find($id);
        
        if (!$exercise) {
            return redirect()->route('exercises.index')->with('error', 'Bài tập không tồn tại.');
        }

        $exercise->delete();

        return redirect()->route('exercises.index')->with('success', 'Xóa bài tập thành công.');
    }
}
