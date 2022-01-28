@extends('admin.master')
@section('title', 'Thêm yêu cầu')
@section('active_design', 'menu-item-active')
@section('name_page', 'Thêm yêu cầu thiết kế')

@section('main')
    <div class="card ">
        <form action="{{ route('oder.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group mb-8">
                    <div class="alert alert-custom alert-default" role="alert">
                        <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                        <div class="alert-text">
                            Tip: Điển đầy đủ thông tin trước khi gửi yêu cầu.
                        </div>
                    </div>
                </div>
                <!-- Bộ phận -->
                <div class="form-group">
                    <input type="hidden" name="team" id="team" value="{{ Auth::user()->team }}" />
                </div>

                <!-- Người đặt -->
                <div class="form-group">
                    <input type="hidden" name="customer" id="customer" value="{{ Auth::user()->last_name }}" />
                </div>

                <!-- Thể loại -->
                <div class="form-group">
                    <label>
                        <h4>Thể loại</h4>
                    </label>
                    <select class="form-control" name="category" id="category">
                        <option value="Picture">Picture</option>
                        <option value="Video">Video</option>
                    </select>
                </div>

                <!-- chủng loại -->
                <div class="form-group">
                    <label>
                        <h4>Chủng loại</h4>
                    </label>
                    <select class="form-control" name="tag" id="tag">
                        <option value="Web Banner">Web Banner</option>
                        <option value="Cover FB">Cover FB</option>
                        <option value="FB Image">FB Image</option>
                        <option value="IG Image">IG Image</option>
                        <option value="Card">Card</option>
                        <option value="Catalog">Catalog</option>
                        <option value="Khác">Khác</option>
                    </select>
                </div>

                {{-- Nội dung --}}
                <div class="form-group">
                    <label>
                        <h4>Nội dung yêu cầu</h4>
                    </label>
                    <textarea name="content" id="kt-ckeditor-1" class="@error('content') is-invalid @enderror"></textarea>
                </div>

                @if ($errors->has('content'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first('content') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                {{-- Ghi chú --}}
                <div class="form-group">
                    <label>
                        <h4>Ghi chú</h4>
                    </label>
                    <textarea name="description" id="kt-ckeditor-2">
                        </textarea>
                </div>
                {{-- Ngày giao --}}
                <div class="form-group">
                    <label>
                        <h4>Ngày giao</h4>
                    </label>
                    <input class="form-control" name="start_date" type="date" value="" id="example-date-input">
                </div>

                {{-- Ngày hết hạn --}}
                <div class="form-group">
                    <label>
                        <h4>Ngày hến hạn</h4>
                    </label>
                    @if (Auth::user()->department == 'Marketing' && Auth::user()->team == 'Manager')
                        <input class="form-control" name="end_date" type="date" value="" id="example-date-input">
                    @else
                        <input class="form-control" disabled name="end_date" type="date" value="" id="example-date-input">
                        <div class="alert alert-warning mt-3" role="alert">
                            Chỉ có trưởng phòng marketing được quyền sửa đổi
                        </div>
                    @endif
                </div>

                {{-- Người được giao --}}
                <div class="form-group">
                    <label>
                        <h4>Người được giao</h4>
                    </label>
                    <select class="form-control" name="pic_id" id="exampleSelectd">
                        @foreach ($users as $key => $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- Trạng thái desgin cập nhât --}}
                <div class="form-group">
                    <label class="col-xl-3 col-lg-3 col-form-label">
                        <h4>Trạng thái hoàn thành</h4>
                    </label>
                    @if (Auth::user()->department == 'Marketing' && Auth::user()->team == 'Design')
                        <div class="radio-inline">
                            <label class="radio">
                                <input type="radio" name="status" id="status" value="0" checked>
                                <span></span>Đã order</label>
                            <label class="radio">
                                <input type="radio" name="status" id="status" value="1">
                                <span></span>Đang làm</label>
                            <label class="radio">
                                <input type="radio" name="status" id="status" value="2">
                                <span></span>Đã hoàn thành</label>
                            <label class="radio">
                                <input type="radio" name="status" id="status" value="3">
                                <span></span>Chưa hoàn thành</label>
                        </div>
                    @else
                        <div class="radio-inline">
                            <label class="radio">
                                <input type="radio" name="status" id="status" value="0" checked>
                                <span></span>Đã order</label>
                            <label class="radio">
                                <input type="radio" name="status" id="status" value="1" disabled>
                                <span></span>Đang làm</label>
                            <label class="radio">
                                <input type="radio" name="status" id="status" value="2" disabled>
                                <span></span>Đã hoàn thành</label>
                            <label class="radio">
                                <input type="radio" name="status" id="status" value="3" disabled>
                                <span></span>Chưa hoàn thành</label>
                        </div>
                        <div class="alert alert-warning mt-3" role="alert">
                            Chỉ có Designer mới có quyền thay đổi trạng thái
                        </div>
                    @endif
                </div>
                {{-- trả ảnh desgin --}}
                <div class="form-group">
                    <label>
                        <h4>Link trả ảnh</h4>
                    </label>
                    <input type="text" class="form-control" name="return_link">
                </div>

                {{-- Ngày thực hiện hoàn thành của design --}}
                <div class="form-group">
                    <label>
                        <h4>Ngày thực hiện</h4>
                    </label>
                    @if (Auth::user()->department == 'Marketing' && Auth::user()->team == 'Design')
                        <input class="form-control" type="date" name="finish_date" value="" id="finish_date">
                    @else
                        <input class="form-control" type="date" name="finish_date" value="" id="finish_date" disabled>
                        <div class="alert alert-warning mt-3" role="alert">
                            Chỉ có Designer mới có quyền thay đổi ngày thực hiện
                        </div>
                    @endif
                </div>

                {{-- Phản hồi của người order --}}
                <div class="form-group">
                    <label>
                        <h4>Phản hồi về chất lượng ảnh</h4>
                    </label>
                    @if (Auth::user()->team == 'Macsara' || Auth::user()->team == 'Apo' || Auth::user()->team == 'Luxshine' || Auth::user()->team == 'Seo' || Auth::user()->team == 'Content' || Auth::user()->team == 'Manager' || Auth::user()->team == 'Staff' || Auth::user()->team == 'IT')
                        <input type="text" class="form-control" name="comment">
                    @else
                        <input type="text" class="form-control" name="comment" disabled>
                        <div class="alert alert-warning mt-3" role="alert">
                            Chỉ có người order mới có quyền thay đổi ngày thực hiện
                        </div>
                    @endif
                </div>

                {{-- Trạng thái người oder cập nhât --}}
                <div class="form-group">
                    <label class="col-xl-3 col-lg-3 col-form-label">
                        <h4>Trạng thái duyệt</h4>
                    </label>
                    @if (Auth::user()->team == 'Macsara' || Auth::user()->team == 'Apo' || Auth::user()->team == 'Luxshine' || Auth::user()->team == 'Seo' || Auth::user()->team == 'Content' || Auth::user()->team == 'Manager' || Auth::user()->team == 'Staff' || Auth::user()->team == 'IT')
                    <div class="radio-inline">
                        <label class="radio">
                            <input type="radio" name="success" id="success" value="0" checked>
                            <span></span>Chưa duyệt</label>
                        <label class="radio">
                            <input type="radio" name="success" id="success" value="1">
                            <span></span>Đã duyệt</label>
                    </div>
                    @else
                    <div class="radio-inline">
                        <label class="radio">
                            <input type="radio" name="success" id="success" value="0" disabled checked>
                            <span></span>Chưa duyệt</label>
                        <label class="radio">
                            <input type="radio" name="success" id="success" value="1" disabled>
                            <span></span>Đã duyệt</label>
                    </div>
                    <div class="alert alert-warning mt-3" role="alert">
                        Chỉ có người order mới có quyền thay trạng thái oder
                    </div>
                    @endif
                </div>

                {{-- Người update lên mạng xã hội --}}
                <div class="form-group">
                    <label>
                        <h4>Người cập nhật lên các kênh</h4>
                    </label>
                    <select class="form-control" id="exampleSelectd" name="pic_social_id">
                        @foreach ($users_social as $key => $user_social)
                            <option value="{{ $user_social->id }}">{{ $user_social->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Trạng thái content cập nhật --}}
                <div class="form-group">
                    <label class="col-xl-3 col-lg-3 col-form-label">
                        <h4>Trạng cập nhật mạng xã hội</h4>
                    </label>
                    @if (Auth::user()->department == 'Marketing' && Auth::user()->team == 'Content')
                        <div class="radio-inline">
                            <label class="radio">
                                <input type="radio" name="status_social" id="status_social" value="0" checked>
                                <span></span>Chưa cập nhật</label>
                            <label class="radio">
                                <input type="radio" name="status_social" id="status_social" value="1">
                                <span></span>Đã cập nhật</label>
                        </div>
                    @else
                        <div class="radio-inline">
                            <label class="radio">
                                <input type="radio" name="status_social" id="status_social" value="0" checked disabled>
                                <span></span>Chưa cập nhật</label>
                            <label class="radio">
                                <input type="radio" name="status_social" id="status_social" value="1" disabled>
                                <span></span>Đã cập nhật</label>
                        </div>

                        <div class="alert alert-warning mt-3" role="alert">
                            Chỉ có Content mới có quyền cập nhật được trạng thái
                        </div>
                    @endif
                </div>

                {{-- Link dữ liệu --}}
                <div class="form-group">
                    <label>
                        <h4>Link dữ liệu</h4>
                    </label>
                    <input type="text" name="link_social" class="form-control">
                </div>

                {{-- Ngày thực hiện cập nhật --}}
                <div class="form-group">
                    <label>
                        <h4>Ngày thực hiện cập nhật</h4>
                    </label>
                    @if (Auth::user()->department == 'Marketing' && Auth::user()->team == 'Content')
                        <input class="form-control" type="date" name="date_social" value="" id="example-date-input">
                    @else
                        <input class="form-control" type="date" name="date_social" value="" id="example-date-input"
                            disabled>
                        <div class="alert alert-warning mt-3" role="alert">
                            Chỉ có Content mới có quyền cập nhật được ngày hoàn thành
                        </div>
                    @endif
                </div>

                <div>
                    <input type="hidden" name="user_id" id="user_id" class="form-control"
                        value="{{ Auth::user()->id }}" />
                </div>

                <button type="submit" class="btn btn-success mr-2">Tiếp tục</button>
                <button type="reset" class="btn btn-secondary"><a href="{{ route('admin') }}">Trở lại</a></button>
            </div>
        </form>
    </div>
@stop



@section('script')
    <script>
        // Class definition

        var KTCkeditor = function() {
            // Private functions
            var demos = function() {
                ClassicEditor
                    .create(document.querySelector('#kt-ckeditor-1'))
                    .then(editor => {
                        console.log(editor);
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }

            return {
                // public functions
                init: function() {
                    demos();
                }
            };
        }();

        // Initialization
        jQuery(document).ready(function() {
            KTCkeditor.init();
        });
    </script>
    <script>
        // Class definition

        var KTCkeditor2 = function() {
            // Private functions
            var demos = function() {
                ClassicEditor
                    .create(document.querySelector('#kt-ckeditor-2'))
                    .then(editor => {
                        console.log(editor);
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }

            return {
                // public functions
                init: function() {
                    demos();
                }
            };
        }();

        // Initialization
        jQuery(document).ready(function() {
            KTCkeditor2.init();
        });
    </script>
@endsection
