<!DOCTYPE html>
<html dir='ltr' lang='vi'>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset='utf-8' />
    <link rel="dns-prefetch" href="http://fonts.googleapis.com/" />
    <link rel='stylesheet' href='/client/catalog/view/theme/etravel/stylesheet/stylesheet.min63ac.css?v=1624930764' />
    <script type="text/javascript" src='/client/catalog/view/theme/etravel/javascript/jquery-2.2.1.min63ac.js?v=1624930764'></script>
    <link href="/client/image/catalog/logo/favicon.png" rel="icon" />
    <link href="/client/index.html" rel="canonical" />
    <link href='/client/catalog/view/theme/etravel/stylesheet_custom/stylesheet63ac.css?v=1624930764' rel='stylesheet' />
    <link rel="stylesheet" href="/client/./css/fontawesome/all.min.css" />
    <script src="/client/./js/fontawesome/all.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            /* An hien menu mobile */
            $('.container-icon-bar').click(function() {
                var content_menu_mobile = $('.content_menu_mobile');
                content_menu_mobile.toggle();
            });
        });
    </script>
    <script src='/client/catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js' type='text/javascript'></script>
    <script src='/client/catalog/view/javascript/jquery/datetimepicker/moment.js' type='text/javascript'></script>
    <script src='/client/catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js' type='text/javascript'></script>
    <link rel="stylesheet" href="/client/./css/main.css">
</head>

<body class="common-home">
    @include('layout/client/header_mobile')
    @include('layout/client/header')
    <div id="position_end_header"></div>
    <div class="main">
        @yield('content')
    </div>
    @include('layout/client/footer')
    <div class="powered">
        <div class="container"><span id="copyright">&copy; Copyright 2021 ETravel Tours. </span>
        </div>
    </div>
    <script src="/client/catalog/view/theme/etravel/javascript/zozo-main.min63ac.js?v=1624930764"></script> <!-- Html Tag-->
    <!-- Facebook script -->
    <div id="fb-root"></div>
    <script type="text/javascript">
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "../connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=829732533863539";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            /*Language*/
            $('#form-language .language-select').on('click', function(e) {
                e.preventDefault();
                $('#form-language input[name=\'code\']').attr('value', $(this).attr('name'));
                $('#form-language').submit();
            });
        });
    </script>
</body>

</html>