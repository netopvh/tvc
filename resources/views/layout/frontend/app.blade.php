<!DOCTYPE html>
<html lang="en">
<head>
    <title>TV Cidade Porto Velho</title>

    <meta charset="utf-8">

    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CRaleway:300,400,500,600,700"
          rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ mix('frontend/css/all.css') }}" media="screen">

    <link rel="icon" href="{{ asset('frontend/images/favicon.png') }}" sizes="32x32"/>

</head>
<body>


<!-- Container -->
<div id="container">
    <!-- Header
        ================================================== -->
    <header class="clearfix">
        <!-- Static navbar -->
        <nav class="navbar navbar-default navbar-static-top">
            <div class="top-line">
                <div class="container">
                    <div class="row">
                        <ul class="top-info col-md-8 ">
                            <li><a href="#"><i class="fa fa-envelope"></i>contato@tvportovelho.net</a></li>
                            <li><p><i class="fa fa-phone"></i>+55 69 3216-5421</p></li>
                        </ul>
                        <ul class="top-socials col-md-4">
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end topline -->
            <nav class="navigation">
                <div class="container">
                    <div class="logo" style="padding-top:32px">
                        <a href="{{ route('home') }}"><img src="{{ asset('frontend/images/tvc-logo.png') }}" alt="" width="150"></a>
                    </div>
                    <nav class="pull-right">
                        @if(counter($top_banner))
                            @foreach($top_banner as $top)
                                <img src="{{ asset('storage/banners/'.$top->imagem) }}" class="img-responsive"/>
                            @endforeach
                        @else
                            <img src="{{ asset('frontend/images/800x130.png') }}" class="img-responsive"/>
                        @endif
                    </nav>
                </div>
            </nav>
            @include('layout.frontend.partials.menu')
        </nav>
    </header>
    <!-- End Header -->

    @yield('player')

    <div id="eventos">
        <div class="container">
            <section class="dnd_section_dd mt80">
                <div class="dnd_section_content">
                    <div class="row">
                        <div class="col-md-3">
                            @if(counter($box_banner))
                                @foreach($box_banner as $box)
                                    <img src="{{ asset('storage/banners/'.$box->imagem) }}" class="img-responsive"/>
                                @endforeach
                            @else
                                <img src="{{ asset('frontend/images/260x250.png') }}" class="img-responsive"/>
                            @endif
                        </div>
                        @yield('eventos-home')
                        @yield('lat-anuncio')
                    </div>
                </div>
            </section>
        </div>
    </div>
    @yield('content-home')
    @yield('destaques-home')

    @yield('noticias-home')
</div>
<br><br>
<footer>
    <div class="inner-footer container">
        <div class="row">
            <div class="col-md-3 f-about">
                <h3>ENTRE EM CONTATO</h3>
                <ul>
                    <li><i class="fa fa-envelope"></i><a href="#">contato@tvportovelho.net</a></li>
                    <li><i class="fa fa-phone"></i>
                        <p>+55 69 3216-5421</p></li>
                </ul>
                <div class="socials">
                    <ul>
                        <li><a href="#" title="Twitter" target="_self"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" title="Facebook" target="_self"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" title="Google" target="_self"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" title="Flickr" target="_self"><i class="fa fa-flickr"></i></a></li>
                        <li><a href="#" title="Instagram" target="_self"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#" title="Youtube" target="_self"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 f-posts">
                <h3>Links Úteis</h3>

                <ul>
                    <li>
                        <a href="#">Corpo de Bombeiros</a>
                        <a href="#">Polícia militar</a>
                        <a href="#">Prefeitura</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 f-links">
                <h3>Mapa do Site</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Quem Somos</a></li>
                    <li><a href="#">Programação</a></li>
                    <li><a href="#">Parceiros</a></li>
                    <li><a href="#">Notícias</a></li>
                    <li><a href="#">Contato</a></li>
                </ul>
            </div>
        </div>


    </div>
    <!-- end contanir & inner-footer -->
    <div class="last-div">
        <div class="container">
            <div class="row">
                <div class="col-md-5 copyright">
                    © 2017 Todos os direitos Reservados | TV Porto Velho
                </div>
                <div class="col-md-6">

                    <div id="back-to-top">
                        <a href="#top">Ir para o Topo <i class="fa fa-caret-up"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End footer -->


<script type="text/javascript" src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/jquery.isotope.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/jquery.imagesloaded.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/jquery.fancybox-1.3.4.pack.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/jquery.appear.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/lightslider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/retina-1.1.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/plugins-scroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/waypoint.min.js') }}"></script>

<script type="text/javascript" src="{{ mix('frontend/js/app.js') }}"></script>

</body>
</html>