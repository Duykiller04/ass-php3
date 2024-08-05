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
                                <h5 class="text-primary">Chào mừng quay trở lại !</h5>
                                <p class="text-muted">Đăng nhập để tiếp tục</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form action="{{ route('auth.login') }}" method="POST">
                                    @csrf

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
{{-- 
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="auth-remember-check">
                                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                    </div> --}}

                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">Sign In</button>
                                    </div>

                                    {{-- <div class="mt-4 text-center">
                                        <div class="signin-other-title">
                                            <h5 class="fs-13 mb-4 title">Sign In with</h5>
                                        </div>
                                        <div>
                                            <button type="button"
                                                class="btn btn-primary btn-icon waves-effect waves-light"><i
                                                    class="ri-facebook-fill fs-16"></i></button>
                                            <button type="button"
                                                class="btn btn-danger btn-icon waves-effect waves-light"><i
                                                    class="ri-google-fill fs-16"></i></button>
                                            <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i
                                                    class="ri-github-fill fs-16"></i></button>
                                            <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i
                                                    class="ri-twitter-fill fs-16"></i></button>
                                        </div>
                                    </div> --}}
                                </form>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="mt-4 text-center">
                        <p class="mb-0">Bạn chưa có tài khoản ? <a href="{{ route('auth.register') }}"
                                class="fw-semibold text-primary text-decoration-underline"> Đăng ký </a> </p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->
@endsection
