<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\LessonCategory;
use Illuminate\Http\Request;

class LessonCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = LessonCategory::all();
        return view('lesson_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lesson_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:lesson_categories,name',
            'description' => 'nullable|string',
        ]);
        $data = $request->all();
        unset($data['_token']);
        LessonCategory::create($data);

        return redirect()->route('lesson_categories.index')->with('success', 'Danh mục đã được tạo thành công!');
    }

    public function edit(LessonCategory $lessonCategory)
    {
        return view('lesson_categories.edit', compact('lessonCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request, LessonCategory $lessonCategory)
    {
        $request->validate([
            'name' => 'required|unique:lesson_categories,name,' . $lessonCategory->id,
            'description' => 'nullable|string',
        ]);

        $lessonCategory->update($request->all());

        return redirect()->route('lesson_categories.index')->with('success', 'Danh mục đã được cập nhật!');
    }

    public function destroy(LessonCategory $lessonCategory)
    {
        $lessonCategory->delete();
        return redirect()->route('lesson_categories.index')->with('success', 'Danh mục đã bị xóa!');
    }
}
