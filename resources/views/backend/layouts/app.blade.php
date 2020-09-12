<!DOCTYPE html>
@langrtl
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', app_name())</title>
    <meta name="description" content="@yield('meta_description', 'San Jose')">
    <meta name="author" content="@yield('meta_author', 'Flores Raul')">
    @yield('meta')

    {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
    @stack('before-styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css" rel="stylesheet" />

    <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet">   
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">

    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.bootstrap.min.css"> --}}

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    {{ style(mix('css/backend.css')) }}

    @stack('after-styles')

    <style type="text/css">


      /*clear button on nullable fields*/
/*    .select2-selection__clear::after {
        content: ' limpiar';
    }
    .select2-selection__clear {
        background: #a2a2a2;
        padding: 0 5px;
        border-radius: 6px;
        line-height: 150%;
        margin: 4px;        
        color: #fff !important;
    }
    .select2-selection__clear:hover {
        background: #333;
        color: #ccc !important;    
    }
*/
      
    .form-group.required label:after {
      content:" *";
      color:red;
    }

    .select2-selection{
        overflow: hidden !important;
        height: auto !important;
    }

      sup {color:green;}


        .icon{
            position: absolute;
        }
        .pic{
            color: rgb(128, 180, 232);
            animation: fadein 5s;   
        }
        .icon:nth-child(1){
            left:7%;
            top:26%;
            width:70px;
            animation: rotate_left 8500ms linear 0s infinite;
        }
        .icon:nth-child(1)>i{

            animation: rotate_right 8500ms linear 0s infinite;
        }
        .icon:nth-child(2){
            left:10%;
            top:3%;
            width: 60px;
            animation: rotate_right 8500ms linear 0s infinite;
        }
        .icon:nth-child(2)>i{
            animation: rotate_left 8500ms linear 0s infinite;
        }
        .icon:nth-child(3){
            left:14%;
            top:54%;
            width: 70px;
            animation: rotate_left 14000ms linear 0s infinite;
        }
        .icon:nth-child(3)>i{
            animation: rotate_right 14000ms linear 0s infinite;
        }
        .icon:nth-child(4){
            left:4%;
            top:82%;
            width: 90px;
            animation: rotate_right 12600ms linear 0s infinite;
        }
        .icon:nth-child(4)>i{
            animation: rotate_left 12600ms linear 0s infinite;
        }
        .icon:nth-child(5){
            left:25%;
            top:79%;
            width: 60px;
            animation: rotate_right 7000ms linear 0s infinite;
        }
        .icon:nth-child(5)>i{
            animation: rotate_left 7000ms linear 0s infinite;
        }
        .icon:nth-child(6){
            left:20%;
            top:20%;
            width: 60px;
            animation: rotate_left 8000ms linear 0s infinite;
        }
        .icon:nth-child(6)>i{
            animation: rotate_right 8000ms linear 0s infinite;
        }
        .icon:nth-child(7){
            left:37%;
            top:83%;
            width: 70px;
            animation: rotate_right 9500ms linear 0s infinite;
        }
        .icon:nth-child(7)>i{
            animation: rotate_left 9500ms linear 0s infinite;
        }
        .icon:nth-child(8){
            left:56%;
            top:90%;
            width: 60px;
            animation: rotate_left 6500ms linear 0s infinite;
        }
        .icon:nth-child(8)>i{
            animation: rotate_right 6500ms linear 0s infinite;
        }
        .icon:nth-child(9){
            left:74%;
            top:4%;
            width: 60px;
            animation: rotate_left 9500ms linear 0s infinite;
        }
        .icon:nth-child(9)>i{
            animation: rotate_right 9500ms linear 0s infinite;
        }
        .icon:nth-child(10){
            left:80%;
            top:32%;
            width: 60px;
            animation: rotate_right 8500ms linear 0s infinite;
        }
        .icon:nth-child(10)>i{
            animation: rotate_left 8500ms linear 0s infinite;
        }
        .icon:nth-child(11){
            left:82%;
            top:55%;
            width: 80px;
            animation: rotate_left 11500ms linear 0s infinite;
        }
        .icon:nth-child(11)>i{
            animation: rotate_right 11500ms linear 0s infinite;
        }
        .icon:nth-child(12){
            left:94%;
            top:70%;
            width: 75px;
            animation: rotate_right 9000ms linear 0s infinite;
        }
        .icon:nth-child(12)>i{
            animation: rotate_left 9000ms linear 0s infinite;
        }
        .icon:nth-child(13){
            left:70%;
            top:80%;
            width: 60px;
            animation: rotate_left 11500ms linear 0s infinite;
        }
        .icon:nth-child(13)>i{
            animation: rotate_right 11500ms linear 0s infinite;
        }
        .icon:nth-child(14){
            left:95%;
            top:10%;
            width: 60px;
            animation: rotate_right 10000ms linear 0s infinite;
        }
        .icon:nth-child(14)>i{
            animation: rotate_left 10000ms linear 0s infinite;
        }




        @keyframes rotate_left{
            50%{
                transform: rotate(180deg);
            }
            100%{
                transform: rotate(360deg);
            }
        }

        @keyframes rotate_right{
            50%{
                transform: rotate(-180deg);
            }
            100%{
                transform: rotate(-360deg);
            }
        }
        @keyframes fadein{
            from{
                opacity: 0;
            }
            to{
                opacity: 1;
            }
        }
    </style>

</head>

<body class="{{ config('backend.body_classes') }}">
    @include('backend.includes.header')

    <div class="app-body">
        @include('backend.includes.sidebar')

        <main class="main">
            @include('includes.partials.demo')
            @include('includes.partials.logged-in-as')
            {!! Breadcrumbs::render() !!}

            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="content-header">
                        @yield('page-header')
                    </div><!--content-header-->

                    @include('includes.partials.messages')
                    @yield('content')
                </div><!--animated-->
            </div><!--container-fluid-->
        </main><!--main-->

        @include('backend.includes.aside')
    </div><!--app-body-->

    @include('backend.includes.footer')

    <!-- Scripts -->
    @stack('before-scripts')
    {!! script(mix('js/manifest.js')) !!}
    {!! script(mix('js/vendor.js')) !!}
    {!! script(mix('js/backend.js')) !!}

    {{-- <script src="//code.jquery.com/jquery-3.3.1.js"></script> --}}

    <script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"></script>

    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
        {{-- <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script> --}}

    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    <script>
        $.fn.select2.defaults.set('language', '@lang('labels.general.language')');
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/i18n/es.js"></script>

    @stack('after-scripts')
</body>
</html>
