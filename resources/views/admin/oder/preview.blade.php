@extends('admin.master')
@section('title', 'Thông tin thiết kế')
@section('active_design', 'menu-item-active')
@section('name_page', 'Trang quản thông tin thiết kế cá nhân')

@section('main')

    <!--begin::Card-->
    <div class="card card-custom pb-5" >
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Báo cáo
                    <span class="text-muted pt-2 font-size-sm d-block">Xem trước xuất bản báo cáo</span>
                </h3>
            </div>
            <div class="card-toolbar">
                <form action="{{ route('oder.export') }}" method="get">
                    <input type="hidden" name="ids" value="{{ $ids }}">
                    <button class="float-right btn btn-success" data-toggle="tooltip" data-placement="top" title="Xuất file .xlsx">
                        <i class="fas fa-download"></i>
                        Xuất File
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-xl-12 card card-custom mt-5 p-5" style="height: 100vh">
        <iframe src='https://view.officeapps.live.com/op/embed.aspx?src={{ $excel }}?t={{ time() }}' width='100%' height="100%" frameborder='0'> </iframe>
    </div>


@stop

