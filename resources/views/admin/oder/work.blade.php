@extends('admin.master')
@section('title', 'Thông tin công việc')
@section('active_design', 'menu-item-active')
@section('name_page', 'Trang quản lý thông tin công việc')

@section('main')
    <!--begin::Notice-->
    <div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
        <div class="alert-icon">
            <span class="svg-icon svg-icon-primary svg-icon-xl">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <path
                            d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z"
                            fill="#000000" opacity="0.3"></path>
                        <path
                            d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z"
                            fill="#000000" fill-rule="nonzero"></path>
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
        </div>
        <div class="alert-text">Có thể thêm, chỉnh sửa thông tin, xóa và cập nhật yêu cầu thiết kế.
        </div>
    </div>
    <!--end::Notice-->
    <!--begin::Card-->



    <div class="card card-custom pb-5" >
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Thiết kế
                    <span class="text-muted pt-2 font-size-sm d-block">Danh sách yêu cầu thiết kế được cập nhật</span>
                </h3>
            </div>
            <div class="card-toolbar">
                <form action="" method="GET" role="form" class="mr-5">
                    <div class="input-icon">
                        <input type="text" class="form-control" placeholder="Nhập tìm kiếm" name="search">
                        <span>
                            <i class="flaticon2-search-1 text-muted"></i>
                        </span>
                    </div>
                </form>
                <!--begin::Button-->
                <a href="{{ route('oder.create') }}" class="btn btn-primary font-weight-bolder">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                                <path
                                    d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                    fill="#000000" opacity="0.3"></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>Thêm mới</a>
                <!--end::Button-->
            </div>
        </div>
    </div>

    <table class="table" style="background-color: #fff">
        <thead>
            <tr class="table-head">
                <th scope="col" class="text-center">Thể loại</th>
                <th scope="col" class="text-center">Ngày đặt</th>
                <th scope="col" class="text-center">Thời hạn</th>
                <th scope="col" class="text-center">Người đặt</th>
                <th scope="col" class="text-center">Người làm</th>
                <th scope="col" class="text-center">Nhóm</th>
                <th scope="col" class="text-center">Design</th>
                <th scope="col" class="text-center">Người đặt</th>
                <th scope="col" class="text-center">Cập nhật kênh</th>
                <th scope="col" class="text-center">Sửa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($oders as $key => $oder)
                <tr>
                    <td class="text-center">{{ $oder->category }}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($oder->start_date)) }}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($oder->end_date)) }}</td>
                    <td class="text-center">{{$oder->customer}}</td>
                    <td class="text-center">{{$oder->pic->name}}</td>
                    <td class="text-center">{{$oder->team}}</td>

                    @if ($oder->status == 1)
                        <td class="text-center text-primary">
                            Đang làm
                        </td>
                    @elseif ($oder->status == 2)
                        <td class="text-center text-success">
                            Đã hoàn thành
                        </td>
                    @elseif ($oder->status == 3)
                        <td class="text-center text-danger">
                            Chưa hoàn thành
                        </td>
                    @else
                        <td class="text-center text-dark">
                            Đã Oder
                        </td>
                    @endif

                    @if ($oder->success == 0)
                    <td class="text-center text-danger">
                       Chưa duyệt
                    </td>
                    @else
                    <td class="text-center text-success">
                        Đã duyệt
                     </td>
                    @endif

                    @if ($oder->status_social == 1)
                    <td class="text-center text-success">
                       Đã cập nhật
                    </td>
                    @else
                    <td class="text-center text-danger">
                        Chưa cập nhật
                     </td>
                    @endif

                    <td class="text-center">
                        <a href="{{ route('oder.edit', $oder->id) }}" class="edit_admin">
                            <span class="svg-icon svg-icon-primary">
                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Design\Edit.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="clearfix float-right">
        {{ $oders->links() }}
    </div>
@stop


@section('script')
    <!-- Sweetalert JS default delete-->
    <script src="{{ asset('js/sweetalert.js') }}"></script>
@endsection
