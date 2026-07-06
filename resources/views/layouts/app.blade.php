<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', $settings->site_name ?? 'AKTVA Instituti')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="@yield('meta_keywords', $settings->meta_keywords ?? '')">
    <meta name="description" content="@yield('meta_description', $settings->meta_description ?? '')">
    <meta name="author" content="{{ $settings->site_name ?? 'AKTVA Instituti' }}">

    <link rel="icon" href="{{ asset('template/images/ahi.png') }}" type="image/png" />
    <link rel="apple-touch-icon" href="{{ asset('template/images/ahi.png') }}">

    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('template/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/harbiy-theme.css') }}">

    @stack('styles')

    <!--[if lt IE 9]>
      <script src="{{ asset('template/js/vendor/html5shiv.min.js') }}"></script>
      <script src="{{ asset('template/js/vendor/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body>

    <div id="preloader">
        <img class="preloader" src="{{ asset('template/images/ahi.png') }}" alt="Yuklanmoqda">
    </div>

    <div id="wrapper">
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div id="div-forms">
                        <form id="login-form">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="flaticon-add" aria-hidden="true"></span>
                            </button>
                            <div class="modal-body">
                                <input class="form-control" type="text" placeholder="Sayt bo'yicha qidiruv..." required>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <x-header :header-class="$headerClass ?? ''" />

        @yield('content')

        <x-footer />
    </div>

    <script src="{{ asset('template/js/jquery.min.js') }}"></script>
    <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/js/carousel.js') }}"></script>
    <script src="{{ asset('template/js/animate.js') }}"></script>
    <script src="{{ asset('template/js/custom.js') }}"></script>
    <script src="{{ asset('template/js/videobg.js') }}"></script>

    @stack('scripts')
</body>
</html>
