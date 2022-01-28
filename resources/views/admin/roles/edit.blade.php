@extends('admin.master')
@section('title', 'Thay Đổi Chức Vụ')
@section('active_role', 'menu-item-active')
@section('name_page', 'Thay Đổi chức vụ')

@section('main')
<div class="card ">
    <form action="{{ route('roles.update', $role->id) }}" method="POST" enctype="multipart/form-data">
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
                <label class="col-xl-3 col-lg-3 col-form-label">Tên chức vụ</label>
                <div class="col-lg-9 col-xl-6">
                    <input class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror"
                        type="text" name="name" id="name" placeholder="Nhập tên chúc vụ" value="{{$role->name}}" />
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
                <label class="col-xl-3 col-lg-3 col-form-label">Các quyền</label>
                <div class="col-lg-9 col-xl-6">
                    @foreach($permissions as $permission)
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text ">
                                <input type="checkbox" name="permission[]" value="{{$permission->id}}"
                                    aria-label="Checkbox for following text input">
                                <label for="{{$permission->id}}"
                                    class="col-xl-3 col-lg-3 col-form-label">{{$permission->name}}</label>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-10">
                    <button type="submit" class="btn btn-success mr-2">Tiếp tục</button>
                    <button type="reset" class="btn btn-secondary">
                        <a href="{{ route('roles.index') }}">Trở lại</a>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@stop
