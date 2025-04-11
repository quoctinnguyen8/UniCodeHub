<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exercises;
use App\Models\TestCase;

class ExercisesController extends Controller
{
    /**
     * Hiển thị danh sách bài tập kèm test case.
     */
    public function index()
    {
        $exercises = Exercises::with('testCases')->get();
        return view('exercises.index', compact('exercises'));
    }

    /**
     * Hiển thị form tạo mới bài tập.
     */
    public function create()
    {
        return view('exercises.create');
    }

    /**
     * Lưu bài tập mới và các test case kèm theo.
     */
    public function store(Request $request)
    {
        // Validate đầu vào
        $request->validate([
            'new_title' => 'required|string|max:255',
            'new_description' => 'nullable|string|max:500',
            'variation_name.*' => 'nullable|string|max:500',
            'variation_value.*' => 'nullable|string|max:500',
        ]);

        // Tạo bài tập mới
        $exercise = new Exercises();
        $exercise->title = $request->input('new_title');
        $exercise->description = $request->input('new_description');
        $exercise->save();

        // Tạo test case nếu có
        if ($request->has('variation_name') && $request->has('variation_value')) {
            $names = $request->input('variation_name');
            $values = $request->input('variation_value');

            foreach ($names as $index => $name) {
                $expected = $values[$index] ?? null;

                if (!empty($name) && !empty($expected)) {
                    $exercise->testCases()->create([
                        'input' => $name,
                        'expected_output' => $expected,
                    ]);
                }
            }
        }

        return redirect()->route('exercises.index')->with('success', 'Đã thêm bài tập và test case!');
    }

    /**
     * Hiển thị form chỉnh sửa bài tập.
     */
    public function edit($id)
    {
        $exercise = Exercises::findOrFail($id);
        return view('exercises.edit', compact('exercise'));
    }

    /**
     * Cập nhật bài tập.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);
    
        $exercise = Exercises::findOrFail($id);
        $exercise->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
    
        // Cập nhật test cases
        if ($request->has('test_cases')) {
            foreach ($request->test_cases as $testCaseId => $data) {
                $testCase = $exercise->testCases()->find($testCaseId);
                if ($testCase) {
                    $testCase->update([
                        'input' => $data['input'] ?? '',
                        'expected_output' => $data['expected_output'] ?? '',
                    ]);
                }
            }
        }
    
        return redirect()->route('exercises.index')->with('success', 'Bài tập và Test Cases đã được cập nhật thành công!');
    }

    /**
     * Xóa bài tập và test case liên quan.
     */
    public function destroy($id)
    {
        $exercise = Exercises::findOrFail($id);
        $exercise->testCases()->delete();
        $exercise->delete();

        return redirect()->route('exercises.index')->with('success', 'Bài tập và các Test Case liên quan đã được xóa thành công.');
    }
}
