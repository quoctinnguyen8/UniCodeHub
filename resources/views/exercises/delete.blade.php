@extends('layout._admin')

@section('content')
<div class="container mt-4">
    <h2>Xóa bài tập</h2>
    <p>Bạn có chắc chắn muốn xóa bài tập <strong>{{ $exercise->title }}</strong> không?</p>

    <form action="{{ route('admin.exercises.destroy', $exercise->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Xóa</button>
        <a href="{{ route('exercises.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection