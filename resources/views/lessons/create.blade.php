@extends('layouts._layout')

@section('content')
    <div class="container">
        <h1>Thêm bài học</h1>

        <form action="{{ route('lessons.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="category_id" class="form-label">Danh mục</label>
                <select class="form-control" id="category_id" name="category_id">
                    <option value=""></option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Nội dung</label>
                <textarea class="form-control" id="content" name="content" required></textarea>
            </div>

            <button type="submit" class="btn btn-success">Thêm bài học</button>
            <a href="{{ route('lessons.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
