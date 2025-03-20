@extends('layout')
@section('title', 'Quản lý thông tin tài khoản')
@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Quản lý thông tin tài khoản</h1>
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $u)
                        <tr>
                            <td>{{ $u->user->id }}</td>
                            <td>{{ $u->user->name }}</td>
                            <td>{{ $u->user->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
@endsection
