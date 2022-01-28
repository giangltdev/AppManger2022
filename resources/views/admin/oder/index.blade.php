@extends('admin.master')
@section('title', 'Quản lý thiết kế')
@section('active_design', 'menu-item-active')
@section('name_page', 'Trang quản lý yêu cầu thiết kế')

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
        <div class="alert-text">Có thể xuất file, chỉnh sửa thông tin, xóa và cập nhật yêu cầu thiết kế.
        </div>
    </div>
    <!--end::Notice-->
    <!--begin::Card-->



    <div class="card card-custom pb-5">
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
                <div class="form-group form_submit mb-0">

                    <button id="btnViewReport" type="button" class="btn btn-primary " disabled="" onclick="gotoReport()">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                        <span class="svg-icon svg-icon-dark svg-icon-2x">
                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Binocular.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M12.8434797,16 L11.1565203,16 L10.9852159,16.6393167 C10.3352654,19.064965 7.84199997,20.5044524 5.41635172,19.8545019 C2.99070348,19.2045514 1.55121603,16.711286 2.20116652,14.2856378 L3.92086709,7.86762789 C4.57081758,5.44197964 7.06408298,4.00249219 9.48973122,4.65244268 C10.5421727,4.93444352 11.4089671,5.56345262 12,6.38338695 C12.5910329,5.56345262 13.4578273,4.93444352 14.5102688,4.65244268 C16.935917,4.00249219 19.4291824,5.44197964 20.0791329,7.86762789 L21.7988335,14.2856378 C22.448784,16.711286 21.0092965,19.2045514 18.5836483,19.8545019 C16.158,20.5044524 13.6647346,19.064965 13.0147841,16.6393167 L12.8434797,16 Z M17.4563502,18.1051865 C18.9630797,18.1051865 20.1845253,16.8377967 20.1845253,15.2743923 C20.1845253,13.7109878 18.9630797,12.4435981 17.4563502,12.4435981 C15.9496207,12.4435981 14.7281751,13.7109878 14.7281751,15.2743923 C14.7281751,16.8377967 15.9496207,18.1051865 17.4563502,18.1051865 Z M6.54364977,18.1051865 C8.05037928,18.1051865 9.27182488,16.8377967 9.27182488,15.2743923 C9.27182488,13.7109878 8.05037928,12.4435981 6.54364977,12.4435981 C5.03692026,12.4435981 3.81547465,13.7109878 3.81547465,15.2743923 C3.81547465,16.8377967 5.03692026,18.1051865 6.54364977,18.1051865 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <!--end::Svg Icon-->
                        Xem báo cáo
                    </button>
                </div>
            </div>
        </div>
    </div>

    <table class="table" style="background-color: #fff">
        <thead>
            <tr class="table-head">
                <th scope="col">
                    <input id="select-all" type="checkbox" class="mr-1">
                </th>
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
                <th scope="col" class="text-center">Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($oders as $key => $oder)
                <tr>
                    <td>
                        <input id="viewCheck" value="{{ @$oder['id'] }}" type="checkbox" class="mr-1">
                    </td>
                    <td class="text-center">{{ $oder->category }}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($oder->start_date)) }}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($oder->end_date)) }}</td>
                    <td class="text-center">{{ $oder->customer }}</td>
                    <td class="text-center">{{ $oder->pic->name }}</td>
                    <td class="text-center">{{ $oder->team }}</td>

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

                    <td class="text-center">
                        <form class="delete_button" action="{{ route('oder.destroy', $oder->id) }}" method="POST">
                            @csrf
                            <input type='hidden' name='_method' value='DELETE'>
                            <button class="delete_accept" type='submit'>
                                <span class="svg-icon svg-icon-md svg-icon-danger"> <svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                        viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path
                                                d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                fill="#000000" fill-rule="nonzero"></path>
                                            <path
                                                d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                fill="#000000" opacity="0.3"></path>
                                        </g>
                                    </svg> </span>
                            </button>
                        </form>
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
    <script>
        $(function() {
            $('input[type=checkbox]').on('change', function(e) {
                let totalChecked = $('input[type=checkbox]:checked').length;

                if (totalChecked === 0) {
                    $('#btnViewReport').attr('disabled', 'disabled')
                } else {
                    $('#btnViewReport').removeAttr('disabled')
                }
            });
        });

        function gotoReport() {
            let viewContent = document.getElementById('viewCheck').value;
            console.log('viewContent: ', viewContent);
            let ids = [];
            let viewchecks = $('#viewCheck[type=checkbox]:checked').each(function(e) {
                ids.push($(this).val())
            });
            window.location.href = '{{ route('oder.analytic') }}?ids=' + ids.join(',');

        }
    </script>

    <script>
        $('#select-all').click(function(event) {
            if (this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    </script>
@endsection
