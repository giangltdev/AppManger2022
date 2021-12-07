@extends('layouts.app')

@section('title','Apogroup - Đăng nhập')

@section('content')
    <!--begin::Wrapper-->
    <div class="d-flex flex-row-fluid flex-center">
        <!--begin::Signin-->
        <div class="login-form">
            <!--begin::Form-->
            <form class="form" id="kt_login_singin_form" method="POST">
                @csrf
                <!--begin::Title-->
                <div class="pb-5 pb-lg-15">
                    <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Đăng nhập</h3>
                    <div class="text-muted font-weight-bold font-size-h4">Bạn chưa có tài khoản?
                    <a href="{{ route('register') }}" class="text-primary font-weight-bolder">Tạo tài khoản mới</a></div>
                </div>
                <!--begin::Title-->
                <!--begin::Form group-->
                <div class="form-group">
                    <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
                    <input class="form-control h-auto py-7 px-6 rounded-lg border-0 @error('email') is-invalid @enderror" id="email" type="text" name="email" placeholder="Nhập email của bạn" autocomplete="off" />
                </div>

                <!--end::Form group-->
                <!--begin::Form group-->
                <div class="form-group">
                    <div class="d-flex justify-content-between mt-n5">
                        <label class="font-size-h6 font-weight-bolder text-dark pt-5">Mật khẩu</label>
                        <a href="{{ route('password.request') }}" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5">Bạn quên mật khẩu ?</a>
                    </div>
                    <input class="form-control h-auto py-7 px-6 rounded-lg border-0  @error('password') is-invalid @enderror"  id="password" type="password" name="password" placeholder="Nhập mật khẩu của bạn" autocomplete="current-password" />
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                @if($errors->has('email'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$errors->first('email')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <!--end::Form group-->
                <div class="form-group">
                    <div class="d-flex justify-content-between mt-5">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label ml-2" for="remember">
                                Ghi nhớ lần đăng nhập này
                            </label>
                        </div>
                    </div>
                </div>
                <!--begin::Action-->
                <div class="pb-lg-0 pb-5">
                    <button id="kt_login_singin_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Đăng nhập</button>
                </div>
                <!--end::Action-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Signin-->
    </div>
    <!--end::Wrapper-->
@endsection
