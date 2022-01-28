<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>403 Permission</title>

    @include('admin._share.style')

    <link href="{{ asset('assets/css/pages/error/error.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <!--begin::Body-->
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Error-->
			<div class="d-flex flex-row-fluid flex-column bgi-size-cover bgi-position-center bgi-no-repeat p-10 p-sm-30" style="background-image: url({{ asset('assets/media/error/bg1.jpg') }});">
				<!--begin::Content-->
				<h1 class="font-weight-boldest text-dark-75 mt-15" style="font-size: 10rem">403</h1>
				<p class="font-size-h3 text-muted font-weight-normal">OOPS! Bạn không có quyền truy cập</p>
				<!--end::Content-->
			</div>
			<!--end::Error-->
		</div>
		<!--end::Main-->
    </body>
    <!--end::Body-->
</body>
</html>
