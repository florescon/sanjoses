<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>San José Uniformes | Documentación</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Documentacion">
    <meta name="author" content="San José">
    <link rel="shortcut icon" href="favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- Global CSS -->
    <link rel="stylesheet" href="{{ asset('/documentation/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('/documentation/assets/plugins/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('/documentation/assets/plugins/elegant_font/css/style.css') }}">

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('/documentation/assets/css/styles.css') }}">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="landing-page">

    <div class="page-wrapper">

        <!-- ******Header****** -->
        <header class="header text-center">
            <div class="container">
                <div class="branding">
                    <h1 class="logo">
                        <span aria-hidden="true" class="icon_documents_alt icon"></span>
                        <span class="text-highlight">San José</span><span class="text-bold"> Uniformes</span>
                    </h1>
            
                </div><!--//branding-->
            </div><!--//container-->
        </header><!--//header-->

        <section class="cards-section text-center">
            <div class="container">
                <h2 class="title">¡Comenzar es fácil!</h2>
                <div class="intro">
                    <p>San José Uniformes, en esta documentación podrá ver cuestiones relacionadas con el manejo de la aplicación.
                    </p>

                    <div class="cta-container">
                        <a class="btn btn-primary btn-cta" href="{{ route('admin.dashboard') }}"><i class="fa fa-tachometer"></i> Ir al panel de administración</a>


                    </div><!--//cta-container-->
                </div><!--//intro-->

                <div id="cards-wrapper" class="cards-wrapper row">

                    <div class="item item-green col-sm-6">
                        <div class="item-inner">
                            <div class="icon-holder">
                                <i class="icon fa fa-paper-plane"></i>
                            </div><!--//icon-holder-->
                            <h3 class="title">Inicio rápido</h3>
                            <p class="intro">Detalles rápidos para usarlo fácilmente.</p>
                            <a class="link" href="{{ route('admin.documentation.start') }}"><span></span></a>
                        </div><!--//item-inner-->
                    </div><!--//item-->

                    <div class="item item-pink item-2 col-sm-6">
                        <div class="item-inner">
                            <div class="icon-holder">
                                <span aria-hidden="true" class="icon icon_puzzle_alt"></span>
                            </div><!--//icon-holder-->
                            <h3 class="title">Documentación</h3>
                            <p class="intro">Lo que necesitas saber para el buen uso de la app.</p>
                            <a class="link" href="{{ route('admin.documentation.documentation') }}"><span></span></a>
                        </div><!--//item-inner-->
                    </div><!--//item-->

                    <div class="item item-purple col-sm-6">
                        <div class="item-inner">
                            <div class="icon-holder">
                                <span aria-hidden="true" class="icon icon_lifesaver"></span>
                            </div><!--//icon-holder-->
                            <h3 class="title">Preguntas frecuentes</h3>
                            <p class="intro">Dudas frecuentes que se pueden presentar al transcurso de utilizar la app.</p>
                            <a class="link" href="{{ route('admin.documentation.faqs') }}"><span></span></a>
                        </div><!--//item-inner-->
                    </div><!--//item-->

                    <div class="item item-orange col-sm-6">
                        <div class="item-inner">
                            <div class="icon-holder">
                                <span aria-hidden="true" class="icon icon_gift"></span>
                            </div><!--//icon-holder-->
                            <h3 class="title">Licencia</h3>
                            <p class="intro">Útil conocer</p>
                            <a class="link" href="{{ route('admin.documentation.license') }}"><span></span></a>
                        </div><!--//item-inner-->
                    </div><!--//item-->
                </div><!--//cards-->
            </div><!--//container-->
        </section><!--//cards-section-->
    </div><!--//page-wrapper-->

    <footer class="footer text-center">
        <div class="container">
            <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can check out other license options via our website: themes.3rdwavemedia.com */-->
            <small class="copyright">Diseñado con <i class="fa fa-heart"></i></small>


        </div><!--//container-->
    </footer><!--//footer-->

    <!-- Main Javascript -->
    <script type="text/javascript" src="{{ asset('/documentation/assets/plugins/jquery-1.12.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/documentation/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/documentation/assets/plugins/jquery-match-height/jquery.matchHeight-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/documentation/assets/js/main.js') }}"></script>
</body>
</html>
