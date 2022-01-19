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
                    <label>
                        <h4>Bộ phận</h4>
                    </label>
                    <input type="text" name="team" id="team" class="form-control" disabled
                        value="{{ Auth::user()->team }}" />
                </div>

                <!-- Thể loại -->
                <div class="form-group">
                    <label>
                        <h4>Thể loại</h4>
                    </label>
                    <select class="form-control" id="exampleSelectd">
                        <option value="Ảnh">Picture</option>
                        <option value="Video">Video</option>
                    </select>
                </div>

                <!-- chủng loại -->
                <div class="form-group">
                    <label>
                        <h4>Chủng loại</h4>
                    </label>
                    <select class="form-control" id="exampleSelectd">
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
                    <textarea name="kt-ckeditor-1" id="kt-ckeditor-1"></textarea>
                </div>

                {{-- Ghi chú --}}
                <div class="form-group">
                    <label>
                        <h4>Ghi chú</h4>
                    </label>
                    <textarea class="form-control form-control-solid" rows="5"></textarea>
                </div>

                {{-- Ngày giao--}}
                <div class="form-group">
                    <label>
                        <h4>Ngày giao</h4>
                    </label>
                    <input class="form-control" type="date" value="" id="example-date-input">
                </div>

                {{-- Ngày hết hạn--}}
                <div class="form-group">
                    <label>
                        <h4>Ngày hến hạn</h4>
                    </label>
                    <input class="form-control" type="date" value="" id="example-date-input">
                </div>

                {{-- Ngày hết hạn--}}
                <div class="form-group">
                    <label>
                        <h4>Người được giao</h4>
                    </label>
                    <select class="form-control" id="exampleSelectd">
                        @foreach ($users as $key => $user )
                            <option value="{{$user->last_name}}">{{$user->last_name}}</option>
                        @endforeach
                    </select>
                </div>



                <div class="form-group">
                    <label class="col-xl-3 col-lg-3 col-form-label">
                        <h4>Trạng thái</h4>
                    </label>
                    <div class="radio-inline">
                        <label class="radio">
                            <input type="radio" name="status" id="status" value="0">
                            <span></span>Không hiển thị</label>
                        <label class="radio">
                            <input type="radio" name="status" id="status" value="1" checked>
                            <span></span>Hiển thị</label>
                    </div>
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
@endsection
