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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-12 mb-3 p-3">
                        <p id="text">
                            <b>Bài tập:</b> yêu cầu bạn viết một hàm JavaScript để kiểm tra xem một chuỗi có phải là
                            palindrome
                            hay không. Một chuỗi được coi là palindrome nếu nó đọc giống nhau từ trái sang phải và từ phải
                            sang trái. Ví dụ: "madam" và "racecar" là các palindrome.
                        </p>
                    </div>
                    </head>

                    <body>
                        <div class="container">
                            <div class="header-controls">
                                <div>
                                    <label for="languageSelect" class="form-label">Language</label>
                                    <select id="languageSelect" class="form-select w-auto">
                                        <option value="javascript">JavaScript</option>
                                        <option value="c">C</option>
                                        <option value="cpp">C++</option>
                                        <option value="csharp">C#</option>
                                        <option value="python">Python</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="themeSelect" class="form-label">Theme</label>
                                    <select id="themeSelect" class="form-select w-auto">
                                        <option value="vs">Visual Studio</option>
                                        <option value="vs-dark">Visual Studio Dark</option>
                                        <option value="hc-black">High Contrast</option>
                                    </select>
                                </div>
                            </div>
                            <div id="editor"></div>
                        </div>
                        <br>
                        <label for="submission" class="form-label">Bài Tập</label>
                        <div id="editor"></div>
                        <input type="hidden" id="submission" name="source_code">
                        <div class="text-center">
                            <button type="submit" id="submit" class="btn btn-primary p-3">Nộp Bài</button>
                        </div>
                </div>
            </div>
    </div>
    </form>
    </div>
@endsection

@section('js')
    <script src="{{ asset('lib/monaco-editor/min/vs/loader.js') }}"></script>
    <script src="{{ asset('js/update_exc/Sub.js') }}"></script>
@endsection
