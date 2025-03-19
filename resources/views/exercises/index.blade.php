@extends('layout._admin')

@section('content')
<div class="container mt-4">
    <h2>Danh sách bài tập</h2>
    <a href="{{ route('exercises.create') }}" class="btn btn-primary mb-3">Thêm bài tập</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exercises as $exercise)
            <tr>
                <td>{{ $exercise->id }}</td>
                <td>{{ $exercise->title }}</td>
                <td>{{ $exercise->description }}</td>
                <td>
                    <a href="{{ route('exercises.edit', $exercise->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('exercises.destroy', $exercise->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

