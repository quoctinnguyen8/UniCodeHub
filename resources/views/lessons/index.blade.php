@extends('layouts._layout')

@section('content')
    <div class="container">
        <h1>Danh sách bài học</h1>
        <a href="{{ route('lessons.create') }}" class="btn btn-primary">Thêm bài học</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Danh mục</th>
                    <th>Tiêu đề</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lessons as $lesson)
                    <tr>
                        <td>{{ $lesson->id }}</td>
                        <td>{{ $lesson->category ? $lesson->category->name : 'Không có' }}</td>
                        <td>{{ $lesson->title }}</td>
                        <td>
                            <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
