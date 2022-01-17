@extends('admin.master')
@section('title', 'Chi tiết tài khoản')
@section('active_user', 'menu-item-active')
@section('info', 'active')
@section('name_page', 'Tài khoản ' . $user->name)

@section('main')
<!--begin::Profile Personal Information-->
<div class="d-flex flex-row">
    <!--begin::Aside-->
    <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
        <!--begin::Profile Card-->
        <div class="card card-custom card-stretch">
            <!--begin::Body-->
            <div class="card-body pt-4">
                <!--begin::User-->
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                        <div class="symbol-label" style="background-image:url({{ asset('images/posts/' . $user->images) }})"></div>
                        <i class="symbol-badge bg-success"></i>
                    </div>
                    <div>
                        <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{ $user->name }}</a>
                    </div>
                </div>
                <!--end::User-->
                <!--begin::Contact-->
                <div class="py-9">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">Email:</span>
                        <a href="#" class="text-muted text-hover-primary">{{ $user->email }}</a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">Điện thoại:</span>
                        <span class="text-muted">{{ $user->phone }}</span>
                    </div>
                </div>
                <!--end::Contact-->
                <!--begin::Nav-->
                <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                    <div class="navi-item mb-2">
                        <a href="{{ route('user.edit', $user->id) }}" class="navi-link py-4 @yield('info')">
                            <span class="navi-icon mr-2">
                                <span class="svg-icon">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="navi-text font-size-lg">Thông tin cá nhân</span>
                        </a>
                    </div>
                    <div class="navi-item mb-2">
                        <a href="{{ route('user.change_pass', [$user->id]) }}" class="navi-link py-4">
                            <span class="navi-icon mr-2">
                                <span class="svg-icon">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />
                                            <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3" />
                                            <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="navi-text font-size-lg">Đổi mật khẩu</span>
                        </a>
                    </div>
                </div>
                <!--end::Nav-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Profile Card-->
    </div>
    <!--end::Aside-->
    <!--begin::Content-->
    <div class="flex-row-fluid ml-lg-8">
        <!--begin::Card-->
        <div class="card card-custom card-stretch">
            <!--begin::Header-->
            <div class="card-header py-3">
                <div class="card-title align-items-start flex-column">
                    <h3 class="card-label font-weight-bolder text-dark">Thông tin cá nhân</h3>
                    <span class="text-muted font-weight-bold font-size-sm mt-1">Bạn có thể cập nhật thông tin cá nhân
                        ngay tại đây</span>
                </div>
                <div class="card-toolbar">
                    <button type="reset" class="btn btn-secondary"><a href="{{ route('admin') }}">trở lại</a></button>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form class="form" action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data" role="form">
                @csrf
                <!-- change mathot to PUT request -->
                <input type='hidden' name='_method' value='PUT' />
                <!--begin::Body-->
                <div class="card-body">
                    <div class="row">
                        <label class="col-xl-3"></label>
                        <div class="col-lg-9 col-xl-6">
                            <h5 class="font-weight-bold mb-6">thông tin người dùng</h5>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Hình ảnh</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="image-input image-input-outline" id="kt_profile_avatar">
                                <div class="image-input-wrapper" style="background-image: url({{ asset('images/posts/' . $user->images) }})"></div>
                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="images" id="images" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="images" />
                                </label>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                            </div>
                            <span class="form-text text-muted">Chỉ chấp nhận file có dạng: png, jpg, jpeg.</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Tên người dùng</label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ $user->name }}" />
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
                        <label class="col-xl-3 col-lg-3 col-form-label">Tên họ đệm</label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control form-control-lg form-control-solid" type="text" name="first_name" id="first_name" value="{{ $user->first_name }}" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Tên</label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control form-control-lg form-control-solid" type="text" name="last_name" id="last_name" value="{{ $user->last_name }}" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Giới tính</label>
                        <div class="radio-inline">
                            <label class="radio">
                                <input type="radio" name="gender" id="gender" value="0" {{ $user->gender === 0 ? 'checked' : '' }}>
                                <span></span>Nam</label>
                            <label class="radio">
                                <input type="radio" name="gender" id="gender" value="1" {{ $user->gender === 1 ? 'checked' : '' }}>
                                <span></span>Nữ</label>
                            <label class="radio">
                                <input type="radio" name="gender" id="gender" value="2" {{ $user->gender === 2 ? 'checked' : '' }}>
                                <span></span>Không xác định</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Ngày sinh</label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control form-control-lg form-control-solid" type="date" name="birthday" id='birthday' value="{{ $user->birthday }}" />
                        </div>
                    </div>
                    @if ($errors->has('birthday'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first('birthday') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Địa chỉ</label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control form-control-lg form-control-solid" type="text" name="address" id='address' value="{{ $user->address }}" />
                        </div>
                    </div>
                    @if ($errors->has('address'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first('address') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="row">
                        <label class="col-xl-3"></label>
                        <div class="col-lg-9 col-xl-6">
                            <h5 class="font-weight-bold mt-10 mb-6">Thông tin liên lạc</h5>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Số điện thoại</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group input-group-lg input-group-solid">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="la la-phone"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control form-control-lg form-control-solid" name="phone" id='phone' value="{{ $user->phone }}" />
                            </div>
                            <span class="form-text text-muted">Chúng tôi sẽ không bao giờ chia sẻ dữ liệu của bạn với
                                bất kỳ ai khác.</span>
                        </div>
                    </div>
                    @if ($errors->has('phone'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first('phone') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group input-group-lg input-group-solid">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="la la-at"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control form-control-lg form-control-solid" name="email" id='email' value="{{ $user->email }}" />
                            </div>
                        </div>
                    </div>

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
                                    <option selected>{{implode($user->getRoleNames()->toArray())}}</option>
                                    @foreach($role as $key)
                                    <option value="{{$key->name}}">{{$key->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Trạng thái</label>
                        <div class="radio-inline">
                            <label class="radio">
                                <input type="radio" name="is_active" id="is_active" value="0" {{ $user->is_active === 0 ? 'checked' : '' }}>
                                <span></span>Không kích hoạt</label>
                            <label class="radio">
                                <input type="radio" name="is_active" id="is_active" value="1" {{ $user->is_active === 1 ? 'checked' : '' }}>
                                <span></span>Kích hoạt</label>
                        </div>
                    </div>
                    <button type="submit " class="btn btn-success mr-2">Lưu thông tin</button>
                </div>
                <!--end::Body-->
            </form>
            <!--end::Form-->
        </div>
    </div>
    <!--end::Content-->
</div>
<!--end::Profile Personal Information-->
@stop

@section('script')
<!-- Sweetalert JS default delete-->
<script src="{{ asset('assets/js/pages/custom/profile/profile.js') }}"></script>
@endsection
