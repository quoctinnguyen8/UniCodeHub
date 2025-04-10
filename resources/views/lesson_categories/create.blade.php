@extends('layouts._layout')

@section('content')
    <div class="container">
        <h1>Thêm danh mục bài học</h1>

        <form action="{{ route('lesson_categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên danh mục</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea class="form-control" id="description" name="description" ></textarea>
            </div>
            <script src="{{ asset('lib\tinymce\js\tinymce\tinymce.min.js') }}"></script>
            <script>
                tinymce.init({
                    selector: '#description', // Chỉ định textarea cần tích hợp TinyMCE
                    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    toolbar_mode: 'floating',
                });
            </script>

                <button type="submit" class="btn btn-success">Thêm danh mục</button>
                <a href="{{ route('lesson_categories.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection

