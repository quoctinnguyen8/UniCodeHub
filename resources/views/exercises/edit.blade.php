@extends('layout._admin')

@section('content')
<div class="container">
    <h2 class="my-4">Chỉnh sửa Bài Tập</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('exercises.update', $exercise->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Tiêu đề bài tập -->
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" id="title" name="title"
                   value="{{ old('title', $exercise->title) }}" required>
        </div>

        <!-- Mô tả bài tập -->
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $exercise->description) }}</textarea>
        </div>

        <!-- Test Cases -->
        @if($exercise->testCases->count())
            <hr>
            <h5 class="mt-4">Test Cases</h5>
            @foreach($exercise->testCases as $testCase)
                <div class="mb-3 p-3 border rounded">
                    <label>Input</label>
                    <input type="text" name="test_cases[{{ $testCase->id }}][input]" value="{{ $testCase->input }}" class="form-control mb-2">

                    <label>Expected Output</label>
                    <input type="text" name="test_cases[{{ $testCase->id }}][expected_output]" value="{{ $testCase->expected_output }}" class="form-control">
                </div>
            @endforeach
        @else
            <p class="text-muted">Chưa có test case nào.</p>
        @endif

        <!-- Nút lưu -->
        <button type="submit" class="btn btn-success mt-3">
            <i class="bi bi-save me-1"></i> Cập nhật
        </button>

        <a href="{{ route('exercises.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
    </form>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endpush
@endsection
