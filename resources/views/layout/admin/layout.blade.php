<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/admin/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/admin/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/admin/css/style.css">
    <link rel="stylesheet" href="/admin/css/main.css" />
    <link rel="shortcut icon" href="/admin/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        @include('layout/admin/nav')
        <div class="container-fluid page-body-wrapper">
            @include('layout/admin/sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- Nội dung cần viết -->
                    @yield('content')
                </div>
                @include('layout/admin/footer')
            </div>
        </div>
    </div>
    <script src="/admin/js/jquery3.js"></script>
    <script src="/admin/js/file-upload.js"></script>
    <script>
        const urlPathName = window.location.pathname;
        const arr = urlPathName.split('/');
        const nameId = arr[2];
        let item = document.getElementById(nameId);
        item.classList.add("active");
    </script>
    <script src="/admin/js/bootstrap.min.js"></script>
    @yield('script')
</body>

</html>