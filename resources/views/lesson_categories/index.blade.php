@extends('layouts._layout')

@section('content')
    <div class="container">
        <h1>Danh mục bài học</h1>
        <a href="{{ route('lesson_categories.create') }}" class="btn btn-primary">Thêm danh mục</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Khóa</th>
                    <th>Mô tả</th>
                    <th>Tương tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($category->description, 50, '...') }}</td>
                        <td>
                            <a href="{{ route('lesson_categories.edit', $category->id) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('lesson_categories.destroy', $category->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Bạn có chắc muốn xóa.')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
