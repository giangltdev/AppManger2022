@extends('layouts.app')

@section('title','Apogroup - Xác minh mật khẩu')

@section('content')
<!--begin::Wrapper-->
<div class="d-flex flex-row-fluid flex-center">
    <!--begin::Signin-->
    <div class="login-form">
        <!--begin::Form-->
        <form class="form" id="kt_login_singup_form" method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <!--begin::Title-->
            <div class="pb-5 pb-lg-15">
                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Xác nhận mật khẩu</h3>
            </div>
            <!--begin::Title-->
            <!--begin::Form group-->
            <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                    <label class="font-size-h6 font-weight-bolder text-dark pt-5">Vui lòng xác nhận mật khẩu và tiếp tục.</label>
                </div>
                <input class="form-control h-auto py-7 px-6 rounded-lg border-0 @error('password') is-invalid @enderror"
                type="password" name="password" id="password" placeholder="Nhập mật khẩu của bạn"
                required autocomplete="current-password" autofocus />
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
            <!--begin::Action-->
            <div class="pb-lg-0 pb-5">
                <button type="submit" id="kt_login_singup_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Hoàn tất</button>
            </div>

            <div class="pb-lg-0 pb-5">
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Quên mật khẩu?
                    </a>
                @endif
            </div>
            <!--end::Action-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Signin-->
</div>
<!--end::Wrapper-->
@endsection
