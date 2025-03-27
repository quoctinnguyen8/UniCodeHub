@extends('layout')
@section('title', 'Submissions')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Nộp Bài Tập</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/submissionss" method="POST" class="p-3 border border-1 rounded-3">
            @csrf
            <div class="mb-3 p-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Nhập email của bạn" >
            </div>
            <div class="mb-3 p-3">
                <label for="subject" class="form-label">Chủ Đề: </label>
                <textarea class="form-control" id="subject" rows="3" placeholder="Nhập bài tập" name="exercise_id" required>
                </textarea>
            </div>
            <div class=" border-1 rounded-3">
                <label for="submission" class="form-label">Bài Tập</label>
                <div id="editor"></div>
                <input type="hidden" id="submission" name="source_code">
            </div>
            <div class="text-center">
                <button type="submit" id="submit" class="btn btn-primary p-3">Nộp Bài</button>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script src="{{ asset('lib/monaco-editor/min/vs/loader.js') }}"></script>
    <script>
        require.config({
            paths: {
                'vs': '{{ asset('lib/monaco-editor/min/vs') }}'
            }
        });
        require(['vs/editor/editor.main'], function() {
            const editor = monaco.editor.create(document.getElementById('editor'), {
                value: "// Viết mã của bạn ở đây",
                language: 'javascript',
                theme: 'vs-light',
            });

            document.getElementById('submit').addEventListener('click', () => { // Xử lý sự kiện click nút nộp bài
                const code = editor.getValue();
                document.getElementById('submission').value = code;
            });
        });
    </script>
@endsection
