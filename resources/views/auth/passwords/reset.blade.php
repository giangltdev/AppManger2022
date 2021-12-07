@extends('layouts.app')

@section('title','Apogroup - Đổi mật khẩu')

@section('content')
<!--begin::Wrapper-->
<div class="d-flex flex-row-fluid flex-center">
    <!--begin::Signin-->
    <div class="login-form">
        <!--begin::Form-->
        <form class="form" id="kt_login_singup_form" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <!--begin::Title-->
            <div class="pb-5 pb-lg-15">
                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Lấy lại mật khẩu</h3>
            </div>
            <!--begin::Title-->
            <!--begin::Form group-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
                <input class="form-control h-auto py-7 px-6 rounded-lg border-0 @error('email')
                is-invalid @enderror" type="email" name="email" id="email" value="{{ $email ?? old('email') }}"
                placeholder="Nhập email của bạn"required autocomplete="email" autofocus />
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
            <!--begin::Form group-->
            <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                    <label class="font-size-h6 font-weight-bolder text-dark pt-5">Mật khẩu</label>
                </div>
                <input class="form-control h-auto py-7 px-6 rounded-lg border-0 @error('password') is-invalid @enderror"
                type="password" name="password" id="password" placeholder="Nhập mật khẩu của bạn"
                required autocomplete="new-password" autofocus />
            </div>
            @if($errors->has('password'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{$errors->first('password')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <!--end::Form group-->
            <!--begin::Form group-->
            <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                    <label class="font-size-h6 font-weight-bolder text-dark pt-5">Xác nhận mật khẩu</label>
                </div>
                <input class="form-control h-auto py-7 px-6 rounded-lg border-0" type="password" name="password_confirmation" id="password-confirm" placeholder="Nhập lại mật khẩu của bạn" required autocomplete="new-password" autofocus />
            </div>
            <!--end::Form group-->
            <!--begin::Action-->
            <div class="pb-lg-0 pb-5">
                <button type="submit" id="kt_login_singup_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Hoàn tất</button>
            </div>
            <!--end::Action-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Signin-->
</div>
<!--end::Wrapper-->
@endsection
