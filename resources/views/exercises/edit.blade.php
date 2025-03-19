@extends('layout._admin')

@section('content')
<div class="container mt-4">
    <h2>Chỉnh sửa bài tập</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('exercises.update', $exercise->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tiêu đề:</label>
            <input type="text" name="title" class="form-control" value="{{ $exercise->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mô tả:</label>
            <textarea name="description" class="form-control" required>{{ $exercise->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('exercises.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
