@extends('layouts._layout')

@section('content')
    <div class="container">
        <h1>Chỉnh sửa danh mục</h1>

        <form action="{{ route('lesson_categories.update', $lessonCategory->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Tên danh mục</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $lessonCategory->name }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea class="form-control" id="description" name="description">{{ $lessonCategory->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('lesson_categories.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
