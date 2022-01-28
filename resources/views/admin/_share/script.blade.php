<!--begin::jquery js-->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!--begin::toastr js-->
<!--begin::jquery js-->
<script src="{{ asset('assets/js/popper.js') }}"></script>
<!--end::Page Scripts-->
<script src="{{ asset('js/toastr.min.js') }}"></script>

<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('assets/js/pages/widgets.js') }}"></script>
<!--end::Page Scripts-->
<!--begin::font anwesome(used by this page)-->
<script src="{{ asset('assets/js/fontawesome/all.js') }}"></script>
<!--end::Page Scripts-->
<!--begin::todo js-->
<script src="{{ asset('assets/js/customer.js') }}"></script>
<!--end::Page todo-->
<!--begin::jquery js-->
<script src="{{ asset('assets\js\pages\custom\todo\todo.js') }}"></script>
<!--end::Page Scripts-->
<!-- Ckeditor -->
<script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>

@yield('script')
<!-- end: add script -->
<!--end::Page Scripts-->
<script>
    $('.delete_accept').click(function(event) {
        var form = $(this).closest("form");
        event.preventDefault();
        swal({
                title: `Bạn có chắc chắn muốn xoá không?`,
                text: "Nếu bạn xoá, dữ liệu sẽ mất vĩnh viễn",
                icon: "warning",
                buttons: ["Quay lại", "Có, tôi đồng ý"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>
<!-- Plugin added sweetalert custom-->

<!--end::Page Scripts-->
<script>
    $('.delete_soft').click(function(event) {
        var form = $(this).closest("form");
        event.preventDefault();
        swal({
                title: `Bạn có chắc chắn muốn đưa đơn hàng vào thùng rác không?`,
                text: "Bạn có thể lấy lại được dữ liệu khi đưa vào thùng rác",
                icon: "warning",
                buttons: ["Quay lại", "Có, tôi đồng ý"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>
<!-- Plugin added sweetalert custom-->

<!-- Toastr script-->
<script>
    @if (Session::has('message'))
        toastr.options = {
        "closeButton": true,
        "progressBar": true
        }
        toastr.success("{{ session('message') }}");
    @endif

    @if (Session::has('error'))
        toastr.options = {
        "closeButton": true,
        "progressBar": true
        }
        toastr.error("{{ session('error') }}");
    @endif

    @if (Session::has('info'))
        toastr.options = {
        "closeButton": true,
        "progressBar": true
        }
        toastr.info("{{ session('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.options = {
        "closeButton": true,
        "progressBar": true
        }
        toastr.warning("{{ session('warning') }}");
    @endif
</script>
