@extends('layout._admin')

@section('content')
<div class="container">
    <h2 class="my-4">Thêm Bài Tập & Test Cases</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header bg-primary text-white">Thêm Bài Tập & Test Case</div>
        <div class="card-body">
            <form action="{{ route('exercises.store') }}" method="POST">
                @csrf

                <!-- Tiêu đề bài tập -->
                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề bài tập</label>
                    <input type="text" id="title" name="new_title" class="form-control" placeholder="Nhập tiêu đề bài tập" required>
                </div>

                <!-- Mô tả bài tập -->
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả bài tập</label>
                    <textarea id="description" name="new_description" class="form-control" placeholder="Nhập mô tả bài tập" rows="4"></textarea>
                </div>

                <!-- Khu vực biến thể -->
                <div id="variationFields" style="display: none;">
                    <h5 class="mt-4">Biến Thể Mới</h5>
                    <div id="variationFieldsContainer">
                        <div class="variation mb-3 d-flex align-items-center">
                            <input type="text" name="variation_name[]" class="form-control me-2" placeholder="Tên Biến Thể">
                            <input type="text" name="variation_value[]" class="form-control me-2" placeholder="Giá Trị Biến Thể">
                            <button type="button" class="btn btn-danger btn-sm removeVariationButton">Xóa</button>
                        </div>
                    </div>
                    <button type="button" id="addVariationButton" class="btn btn-success btn-sm">
                        <i class="bi bi-plus-circle me-1"></i> Thêm Biến Thể
                    </button>
                </div>

                <!-- Nút hiện/ẩn khu vực biến thể -->
                <button type="button" class="btn btn-secondary mt-3" id="toggleVariationFields">
                    <i class="bi bi-arrow-down-up me-1"></i> Thêm Biến Thể
                </button>

                <!-- Nút Submit -->
                <button type="submit" class="btn btn-primary mt-3 d-inline-flex align-items-center">
                    <i class="bi bi-save me-2"></i> Thêm Bài Tập
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Nhúng script xử lý tương tác -->
<script src="{{ asset('js/script.js') }}"></script>

<!-- Nhúng Bootstrap Icons nếu chưa có -->
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endpush
@endsection
