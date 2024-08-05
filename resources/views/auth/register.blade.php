@extends('auth.layouts.master')

@section('title')
    Login
@endsection

@section('content')
    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container" style="margin-top: 200px">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Chào mừng đến với website !</h5>
                                <p class="text-muted">Đăng ký</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form action="{{ route('auth.register') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username"
                                            placeholder="Enter username" name="name">
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('title') is-invalid @enderror"
                                            id="email" placeholder="Enter email" name="email">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="password-input">Password</label>
                                        <input type="password"
                                            class="form-control pe-5 password-input @error('title') is-invalid @enderror"
                                            placeholder="Enter password" id="password-input" name="password">
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="re-password-input">Xác nhận password</label>
                                        <input type="password" class="form-control pe-5 password-input"
                                            placeholder="Enter password" id="re-password-input"
                                            name="password_confirmation">
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">Đăng ký</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="mt-4 text-center">
                        <p class="mb-0">Bạn đã có tài khoản <a href="{{ route('auth.login') }}"
                                class="fw-semibold text-primary text-decoration-underline"> Đăng nhập </a> </p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->
@endsection
