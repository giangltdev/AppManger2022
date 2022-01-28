@extends('admin.master')
@section('title','Tất cả quyền')
@section('active_role', 'menu-item-active')
@section('name_page', 'Trang quản lý quyền')

@section('main')

<div class="card ">
    <form action="{{ route('roles.updatePer', $per->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group mb-8">
                <div class="alert alert-custom alert-default" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                    <div class="alert-text">
                        Tip: Cẩn trọng trong việc chỉnh sửa nhé!
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>
                    <h4>Mã thiết bị</h4>
                </label>
                <input type="text" name="pername" id="pername" class="form-control" placeholder="Nhập Tên Quyền" value="{{ $per->name }}"/>
            </div>
            <button type="submit" class="btn btn-success mr-2">Tiếp tục</button>
            <button type="reset" class="btn btn-secondary"><a href="{{ route('admin') }}">Trở lại</a></button>
        </div>
    </form>
</div>



@stop
