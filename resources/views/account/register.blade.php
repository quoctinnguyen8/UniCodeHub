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
                <div class="card-header bg-info text-white text-center">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="mb-2" style="height: 80px;">
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

                        <x-input name="name" label="Họ tên" required />
                        <x-input name="email" type="email" label="Email" required />
                        <x-input name="password" type="password" label="Mật khẩu" required />
                        <x-input name="cfpassword" type="password" label="Xác nhận mật khẩu" required />

                        <div class="form-check mb-3">
                            <input type="checkbox" id="is_dnc_student" name="is_dnc_student" class="form-check-input" value="1" {{ old('is_dnc_student') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_dnc_student">Là sinh viên của trường DNC</label>
                        </div>

                        <div id="student_fields" class="mb-3" style="display: none;">
                            <x-input name="student_id" label="Mã sinh viên" />
                            <x-input name="class_id" label="Mã lớp" />
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