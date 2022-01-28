@extends('admin.master')
@section('title', 'Chỉnh sửa yêu cầu')
@section('active_design', 'menu-item-active')
@section('name_page', 'Chỉnh sửa yêu cầu thiết kế')

@section('main')
    <div class="card ">
        <form action="{{ route('oder.update', $oder->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- change mathot to PUT request -->
            <input type='hidden' name='_method' value='PUT' />
            <div class="card-body">
                <div class="form-group mb-8">
                    <div class="alert alert-custom alert-default" role="alert">
                        <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                        <div class="alert-text">
                            Tip: Điển đầy đủ thông tin trước khi gửi yêu cầu.
                        </div>
                    </div>
                </div>

                <!-- Thể loại -->
                <div class="form-group">
                    <label>
                        <h4>Thể loại</h4>
                    </label>
                    <select class="form-control" name="category" id="category">
                        <option value="{{$oder->category}}">{{$oder->category}}</option>
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
                        <option value="{{$oder->tag}}">{{$oder->tag}}</option>
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
                    <textarea name="content" id="kt-ckeditor-1" class="@error('content') is-invalid @enderror">
                        {{$oder->content}}
                    </textarea>
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
                        {{$oder->description}}
                    </textarea>
                </div>

                {{-- Ngày giao --}}
                <div class="form-group">
                    <label>
                        <h4>Ngày giao</h4>
                    </label>
                    <input class="form-control" name="start_date" type="date" value="{{ $oder->start_date }}" id="start_date">
                </div>

                {{-- Ngày hết hạn --}}
                <div class="form-group">
                    <label>
                        <h4>Ngày hến hạn</h4>
                    </label>
                    @if (Auth::user()->department == 'Marketing' && Auth::user()->team == 'Manager')
                        <input class="form-control" name="end_date" type="date" value="{{ $oder->end_date }}" id="end_date">
                    @else
                        <input class="form-control" disabled name="end_date" type="date" value="{{ $oder->end_date }}" id="example-date-input">
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
                        <option value="{{$oder->pic_id}}">{{$oder->pic->name}}</option>
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
                                <input type="radio" name="status" id="status" value="0" {{$oder->status === 0 ? "checked" : ""}}>
                                <span></span>Đã order</label>
                            <label class="radio">
                                <input type="radio" name="status" id="status" value="1" {{$oder->status === 1 ? "checked" : ""}}>
                                <span></span>Đang làm</label>
                            <label class="radio">
                                <input type="radio" name="status" id="status" value="2" {{$oder->status === 2 ? "checked" : ""}}>
                                <span></span>Đã hoàn thành</label>
                            <label class="radio">
                                <input type="radio" name="status" id="status" value="3" {{$oder->status === 3 ? "checked" : ""}}>
                                <span></span>Chưa hoàn thành</label>
                        </div>
                    @else
                        <div class="radio-inline">
                            <label class="radio">
                                <input type="radio" name="status" id="status" value="0" {{$oder->status === 0 ? "checked" : ""}} disabled>
                                <span></span>Đã order</label>
                            <label class="radio">
                                <input type="radio" name="status" id="status" value="1" {{$oder->status === 1 ? "checked" : ""}} disabled>
                                <span></span>Đang làm</label>
                            <label class="radio">
                                <input type="radio" name="status" id="status" value="2" {{$oder->status === 2 ? "checked" : ""}} disabled>
                                <span></span>Đã hoàn thành</label>
                            <label class="radio">
                                <input type="radio" name="status" id="status" value="3" {{$oder->status === 3 ? "checked" : ""}} disabled>
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
                    <input type="text" class="form-control" name="return_link" value="{{$oder->return_link}}">
                </div>

                {{-- Ngày thực hiện hoàn thành của design --}}
                <div class="form-group">
                    <label>
                        <h4>Ngày thực hiện</h4>
                    </label>
                    @if (Auth::user()->department == 'Marketing' && Auth::user()->team == 'Design')
                        <input class="form-control" type="date" name="finish_date" value="{{$oder->finish_date}}" id="finish_date">
                    @else
                        <input class="form-control" type="date" name="finish_date" value="{{$oder->finish_date}}" id="example-date-input" disabled>
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
                        <input type="text" class="form-control" name="comment" value="{{$oder->comment}}">
                    @else
                        <input type="text" class="form-control" name="comment" value="{{$oder->comment}}" disabled>
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
                            <input type="radio" name="success" id="success" value="0" value="0" {{$oder->success === 0 ? "checked" : ""}}>
                            <span></span>Chưa duyệt</label>
                        <label class="radio">
                            <input type="radio" name="success" id="success" value="1" value="0" {{$oder->success === 1 ? "checked" : ""}}>
                            <span></span>Đã duyệt</label>
                    </div>
                    @else
                    <div class="radio-inline">
                        <label class="radio">
                            <input type="radio" name="success" id="success" value="0" disabled {{$oder->success === 0 ? "checked" : ""}}>
                            <span></span>Chưa duyệt</label>
                        <label class="radio">
                            <input type="radio" name="success" id="success" value="1" disabled {{$oder->success === 1 ? "checked" : ""}}>
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
                        <option value="{{$oder->pic_social_id}}">{{$oder->pic_social->name}}</option>
                        @foreach ($users_social as $key => $user_social)
                            <option value="{{ $user_social->name }}">{{ $user_social->name }}</option>
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
                                <input type="radio" name="status_social" id="status_social" value="0" {{$oder->status_social === 0 ? "checked" : ""}}>
                                <span></span>Chưa cập nhật</label>
                            <label class="radio">
                                <input type="radio" name="status_social" id="status_social" value="1" {{$oder->status_social === 1 ? "checked" : ""}}>
                                <span></span>Đã cập nhật</label>
                        </div>
                    @else
                        <div class="radio-inline">
                            <label class="radio">
                                <input type="radio" name="status_social" id="status_social" value="0" {{$oder->status_social === 0 ? "checked" : ""}} disabled>
                                <span></span>Chưa cập nhật</label>
                            <label class="radio">
                                <input type="radio" name="status_social" id="status_social" value="1" {{$oder->status_social === 1 ? "checked" : ""}} disabled>
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
                    <input type="text" name="link_social" id="link_social" class="form-control" value=" {{$oder->link_social}}">
                </div>

                {{-- Ngày thực hiện cập nhật --}}
                <div class="form-group">
                    <label>
                        <h4>Ngày thực hiện cập nhật</h4>
                    </label>
                    @if (Auth::user()->department == 'Marketing' && Auth::user()->team == 'Content')
                        <input class="form-control" type="date" name="date_social" value="{{$oder->date_social}}" id="date_social">
                    @else
                        <input class="form-control" type="date" name="date_social" value="{{$oder->date_social}}" id="example-date-input" disabled>
                        <div class="alert alert-warning mt-3" role="alert">
                            Chỉ có Content mới có quyền cập nhật được ngày hoàn thành
                        </div>
                    @endif
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
