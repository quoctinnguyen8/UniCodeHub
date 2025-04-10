<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\LessonCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::with('category')->get();
        return view('lessons.index', compact('lessons'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = LessonCategory::all();
        return View('lessons.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:lesson_categories,id',
            'title' => 'required|string',
            'content' => 'required',
        ]);
        // Lesson::create($request->all());
        Lesson::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id, 
        ]);
    
        return redirect()->route('lessons.index')->with('success', 'Tạo mới bài học thành công');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        $categories = LessonCategory::all();
        return view('lessons.edit', compact('lesson', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'category_id' => 'nullable|exists:lesson_categories,id',
            'title' => 'required|string',
            'discrption' => 'nullable|string',
            'content' => 'required',
           
        ]);
        $lesson->update($request->all());
        return redirect()->route('lessons.index')->with('success', 'bài học đã được cập nhật');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('lessons.index')->with('success', 'Xóa bài học thành công');
    }
}
