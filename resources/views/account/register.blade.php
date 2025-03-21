<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <link rel="stylesheet" href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}">
</head>
<body class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white d-flex align-items-center justify-content-center text-center">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="me-2" style="height: 40px;">
                    <h4 class="mb-0">Register</h4>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register.post') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Họ tên <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu <span class="text-danger">*</span></label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="cfpassword" class="form-label">Xác nhận mật khẩu <span class="text-danger">*</span></label>
                            <input type="password" id="cfpassword" name="cfpassword" class="form-control" required>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" id="is_dnc_student" name="is_dnc_student" class="form-check-input" value="1" {{ old('is_dnc_student') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_dnc_student">Là sinh viên của trường DNC</label>
                        </div>

                        <div id="student_fields" class="mb-3" style="display: none;">
                            <div class="mb-3">
                                <label for="student_id" class="form-label">Mã sinh viên <span class="text-danger">*</span></label>
                                <input type="text" id="student_id" name="student_id" class="form-control" value="{{ old('student_id') }}">
                            </div>
                            <div class="mb-3">
                                <label for="class_id" class="form-label">Mã lớp <span class="text-danger">*</span></label>
                                <input type="text" id="class_id" name="class_id" class="form-control" value="{{ old('class_id') }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info w-100 text-white">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/register.js') }}"></script>
</body>
</html>
