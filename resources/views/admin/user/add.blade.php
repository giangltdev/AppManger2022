@extends('admin.master')
@section('title', 'Thêm tài khoản')
@section('active_user', 'menu-item-active')
@section('name_page', 'Thêm tài khoản mới')

@section('main')
<div class="card ">
    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group mb-8">
                <div class="alert alert-custom alert-default" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                    <div class="alert-text">
                        Chỉ có người có quyền quản trị mới có thể được sử dụng chức năng này. Chúng tôi không khuyến
                        khích sử dụng chức năng này vì mục đích bảo mật.
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">Tên người dùng</label>
                <div class="col-lg-9 col-xl-6">
                    <input class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="Nhập tên người dùng" value="" />
                </div>
            </div>
            @if ($errors->has('name'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first('name') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                <div class="col-lg-9 col-xl-6">
                    <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" type="text" name="email" id="email" placeholder="Nhập email người dùng" value="" />
                </div>
            </div>
            @if ($errors->has('email'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first('email') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">Mật khẩu</label>
                <div class="col-lg-9 col-xl-6">
                    <input class="form-control form-control-lg form-control-solid @error('password')is-invalid @enderror" type="" name="password" id="email" placeholder="Nhập mật khẩu" value="" />
                </div>
            </div>
            @if ($errors->has('password'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first('password') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">Chức vụ</label>
                <div class="col-lg-9 col-xl-6">
                    <div class="input-group input-group-lg input-group-solid">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="la la-user"></i>
                            </span>
                        </div>
                        <select name="role" class="form-control" id="exampleSelectd">
                            <option selected>Chức vụ</option>
                            @foreach($role as $key)
                            <option value="{{$key->name}}">{{$key->name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
            @error('role')
            <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @enderror


            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">Trạng thái</label>
                <div class="radio-inline">
                    <label class="radio">
                        <input type="radio" name="is_active" id="is_active" value="0" checked>
                        <span></span>Không kích hoạt</label>
                    <label class="radio">
                        <input type="radio" name="is_active" id="is_active" value="1">
                        <span></span>Kích hoạt</label>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-10">
                    <button type="submit" class="btn btn-success mr-2">Tiếp tục</button>
                    <button type="reset" class="btn btn-secondary"><a href="{{ route('admin') }}">Trở lại</a></button>
                </div>
            </div>
        </div>
    </form>
</div>
@stop
