@extends('layout._admin')

@section('content')
<div class="container">
    <h2 class="my-4">Danh Sách Bài Tập & Test Cases</h2>

    <!-- Display Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Button to Navigate to Create Exercise -->
    <div class="mb-4 text-end">
        <a href="{{ route('exercises.create') }}" class="btn btn-success">Thêm Bài Tập Mới</a>
    </div>

    <!-- List of Exercises and Test Cases -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Bài Tập</th>
                <th>Mô Tả</th>
                <th>Test Cases</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exercises as $exercise)
            <tr>
                <td>{{ $exercise->id }}</td>
                <td>{{ $exercise->title }}</td>
                <td>{{ $exercise->description }}</td>
                <td>
                    @if($exercise->testCases->isEmpty())
                        <span class="text-muted">Chưa có Test Case</span>
                    @else
                        <ul class="list-unstyled">
                            @foreach($exercise->testCases as $testCase)
                                <li>
                                    <strong>Input:</strong> {{ $testCase->input }} <br>
                                    <strong>Output:</strong> {{ $testCase->expected_output }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    <!-- Edit Exercise -->
                    <a href="{{ route('exercises.edit', $exercise->id) }}" class="btn btn-primary btn-sm">Sửa</a>

                    <!-- Delete Exercise -->
                    <form action="{{ route('exercises.destroy', $exercise->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xóa bài tập này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
