<!DOCTYPE html>
@langrtl
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title', app_name())</title>
        <meta name="keywords" content="Jose" />
        <meta name="description" content="@yield('meta_description', 'San Jose Uniformes')">
        <meta name="author" content="@yield('meta_author', 'www')">
        @yield('meta')

        @stack('before-styles')
       
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('/porto/assets/images/icons/favicon.ico') }}">
        
        <script type="text/javascript">
            WebFontConfig = {
                google: { families: [ 'Open+Sans:300,400,600,700,800','Poppins:300,400,500,600,700','Segoe Script:300,400,500,600,700' ] }
            };
            (function(d) {
                var wf = d.createElement('script'), s = d.scripts[0];
                wf.src = '{{ asset('/porto/assets/js/webfont.js') }}';
                wf.async = true;
                s.parentNode.insertBefore(wf, s);
            })(document);
        </script>

        <!-- Plugins CSS File -->
        <link rel="stylesheet" href="{{ asset('/porto/assets/css/bootstrap.min.css') }}">

        <!-- Main CSS File -->
        <link rel="stylesheet" href="{{ asset('/porto/assets/css/style.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/porto/assets/vendor/fontawesome-free/css/all.min.css') }}">
       
        @stack('after-styles')

    </head>
    <body>

    <div class="page-wrapper">

        @include('frontend.includes2.header')

        <main class="main">

            <div class="mb-3"></div><!-- margin -->

            {{-- <div role="alert"> --}}
            <div class="container">
                @include('includes.partials.messages')
            </div>
            {{-- </div> --}}<!-- End .alert -->
            

            @yield('content')

        </main><!-- End .main -->

        @include('frontend.includes2.footer')

    </div><!-- End .page-wrapper -->

    @include('frontend.includes2.mobile')

    @stack('before-scripts')
        
    <!-- Plugins JS File -->
    <script src="{{ asset('/porto/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/porto/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/porto/assets/js/plugins.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('/porto/assets/js/main.min.js') }}"></script>

    @stack('after-scripts')

    </body>

</html>