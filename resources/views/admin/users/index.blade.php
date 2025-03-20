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
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $u)
                        <tr>
                            <td>{{ $u->user->id }}</td>
                            <td>{{ $u->user->name }}</td>
                            <td>{{ $u->user->email }}</td>
                            <td>{{ $u->active ? 'Đang hoạt động' : 'Đã chặn' }}</td>
                            <td>
                                @if ($u->active)
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#blockModal{{ $u->user->id }}">
                                        Chặn
                                    </button>
                                @else
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#unblockModal{{ $u->user->id }}">
                                        Mở chặn
                                    </button>
                                @endif
                            </td>
                        </tr>
                        <!-- Modal chặn -->
                        <div class="modal fade" id="blockModal{{ $u->user->id }}" tabindex="-1"
                            aria-labelledby="blockModalLabel{{ $u->user->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="blockModalLabel{{ $u->user->id }}">Xác nhận chặn người
                                            dùng</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('admin.users.block', $u->user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <p>Bạn có chắc chắn muốn chặn người dùng
                                                <strong>{{ $u->user->name }}</strong>?
                                            </p>
                                            <div class="mb-3">
                                                <label for="blockUntilDate{{ $u->user->id }}" class="form-label">Số
                                                    Ngày chặn:</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control"
                                                        id="blockUntilDate{{ $u->user->id }}" name="block_until"
                                                        min="1">
                                                    <span class="input-group-text">ngày</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Hủy</button>
                                            <button type="submit" class="btn btn-danger">Xác nhận chặn</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal mở chặn -->
                        <div class="modal fade" id="unblockModal{{ $u->user->id }}" tabindex="-1"
                            aria-labelledby="unblockModalLabel{{ $u->user->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="unblockModalLabel{{ $u->user->id }}">Xác nhận mở chặn
                                            người dùng
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Bạn có chắc chắn muốn mở chặn người dùng
                                            <strong>{{ $u->user->name }}</strong>?
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Hủy</button>
                                        <form action="{{ route('admin.users.unblock', $u->user->id) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Xác nhận mở chặn</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
@endsection
