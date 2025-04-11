<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TestCase;
use App\Models\Exercises;

class TestCaseController extends Controller
{
    public function index()
    {
        $testCases = TestCase::with('exercise')->get();
        return view('testcases.index', compact('testCases'));
    }

    public function create()
    {
        $exercises = Exercises::all();
        return view('testcases.create', compact('exercises'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'exercises_id' => 'nullable|exists:exercises,id',
            'new_title' => 'nullable|required_without:exercises_id|string|max:255',
            'new_description' => 'nullable|required_without:exercises_id|string|max:500',
            'input' => 'nullable|string|max:500',
            'expected_output' => 'nullable|string|max:500',
        ]);

        // Add new exercise or use existing one
        if ($request->exercises_id) {
            $exerciseId = $request->exercises_id;
        } else {
            $exercise = Exercises::create([
                'title' => $request->new_title,
                'description' => $request->new_description,
            ]);
            $exerciseId = $exercise->id;
        }

        // Add Test Case only if input and expected_output are provided
        if ($request->filled('input') && $request->filled('expected_output')) {
            TestCase::create([
                'exercises_id' => $exerciseId,
                'input' => $request->input,
                'expected_output' => $request->expected_output,
            ]);
        }

        return redirect()->route('testcases.index')->with('success', 'Test case added successfully!');
    }

    public function destroy(TestCase $testCase)
    {
        $testCase->delete();
        return redirect()->route('testcases.index')->with('success', 'Test case deleted successfully.');
    }
}
