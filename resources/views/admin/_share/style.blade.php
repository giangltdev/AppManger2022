<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Page Vendors Styles(used by this page)-->
<link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles-->
<!--begin::Global Theme Styles(used by all pages)-->
<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Global Theme Styles-->
<!--begin::Layout Themes(used by all pages)-->
<link href="{{ asset('assets/css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/themes/layout/brand/light.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/themes/layout/aside/light.css') }}" rel="stylesheet" type="text/css" />
<!--end::Layout Themes-->

<!--begin::font anwesome(used by all pages)-->
<link href="{{ asset('assets/css/fontawesome/all.css') }}" rel="stylesheet" type="text/css" />
<!--end::font anwesome-->

<!--begin::font anwesome(used by all pages)-->
<link href="{{ asset('assets/css/customer.css') }}" rel="stylesheet" type="text/css" />
<!--end::font anwesome-->


<!--begin::toastr css-->
<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<!--end::toastr css-->


<!-- begin: add style -->
@yield('style')
<!-- end: add style -->
