@extends('layout')
@section('title', 'Submissions')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Nộp Bài Tập</h1>
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 p-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email của bạn"
                    required>
            </div>
            <div class="mb-3 p-3">
                <label for="submission" class="form-label">Chủ Đề: </label>
                <textarea class="form-control" id="editor" name="submission" rows="3" placeholder="Nhập bài tập của bạn"
                    required>
                </textarea>
            </div>
            <div class="mb-3 p-3 border border-1 rounded-3">
                <label for="submission" class="form-label">Bài Tập</label>
                <textarea class="form-control" id="editor" name="submission" rows="3" placeholder="Nhập bài tập của bạn"
                    required>
                </textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary p-3">Nộp Bài</button>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/Submissions.js') }}"></script>
@endsection
