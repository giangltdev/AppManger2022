@extends('layouts.app')

@section('title','Apogroup - Quên mật khẩu')

@section('content')
<!--begin::Wrapper-->
<div class="d-flex flex-row-fluid flex-center">
    <!--begin::Forgot-->
    <div class="login-form">
        <!--begin::Form-->
        <form class="form" id="kt_login_forgot_form" method="POST" action="{{ route('password.email') }}">
            @csrf
            <!--begin::Title-->
            <div class="pb-5 pb-lg-15">
                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Quên mật khẩu?</h3>
                <p class="text-muted font-weight-bold font-size-h4">Bạn vui lòng nhập mật email để lấy lại mật khẩu</p>
            </div>
            <!--end::Title-->
            {{-- Notification success email fogot password --}}
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show mt-5 ml-2 mr-2" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        {{-- End notification success email fogot password --}}
            <!--begin::Form group-->
            <div class="form-group">
                <input class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Nhập email của bạn" autocomplete="off" />
            </div>
            <!--end::Form group-->
            @if($errors->has('email'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{$errors->first('email')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <!--begin::Form group-->
            <div class="form-group d-flex flex-wrap">
                <button type="submit" id="kt_login_forgot_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Hoàn thành</button>
                <a href="{{ route('login') }}" id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">trở lại</a>
            </div>
            <!--end::Form group-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Forgot-->
</div>
<!--end::Wrapper-->
@endsection
