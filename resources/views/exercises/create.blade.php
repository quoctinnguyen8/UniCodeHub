@extends('layout._admin')

@section('content')
<div class="container mt-4">
    <h2>Thêm bài tập mới</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('exercises.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea name="description" class="form-control" id="description" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Lưu bài tập</button>
        <a href="{{ route('exercises.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
