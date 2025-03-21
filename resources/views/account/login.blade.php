<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header bg-info text-white d-flex align-items-center justify-content-center">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="me-2" style="height: 40px;">
                        <h4 class="mb-0">Login</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <x-input name="email" type="email" label="Email" />
                            <x-input name="password" type="password" label="Password" />
                            <button type="submit" class="btn btn-info w-100 text-white">Login</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>