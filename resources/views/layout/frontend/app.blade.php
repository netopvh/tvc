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
                        <a href="index.html"><img src="{{ asset('frontend/images/tvc-logo.png') }}" alt="" width="150"></a>
                    </div>
                    <nav class="pull-right">
                        <img src="http://via.placeholder.com/800x130" class="img-responsive"/>
                    </nav>
                </div>
            </nav>
            <nav id="nav" class="container">
                <ul id="main_menu" class="sf-menu">
                    <li><a href="{{ route('home') }}"><span>Home</span></a>
                    </li>
                    <li><a href=""><span>Quem Somos</span></a></li>
                    <li><a href="services.html"><span>Programação</span></a></li>
                    <li class="menu-item-has-children"><a href="portfolio.html"><span>Programas</span></a>
                        <ul class="navi first menu-depth-1">
                            <li class="menu-item"><a href="portfoliofull-2column.html"><span><span
                                                class="mob-line">-</span> Portfolio Fullwidth 2 Columns</span></a></li>
                            <li class="menu-item"><a href="portfoliofull-3column.html"><span><span
                                                class="mob-line">-</span> Portfolio Fullwidth 3 Columns</span></a></li>
                            <li class="menu-item"><a href="portfolio.html"><span><span class="mob-line">-</span> Portfolio Fullwidth 4 Columns</span></a>
                            </li>
                            <li class="menu-item"><a href="portfoliogrid-2col.html"><span><span
                                                class="mob-line">-</span> Portfolio Grid 2 Columns</span></a></li>
                            <li class="menu-item"><a href="portfoliogrid-3col.html"><span><span
                                                class="mob-line">-</span> Portfolio Grid 3 Columns</span></a></li>
                            <li class="menu-item"><a href="portfoliogrid-4col.html"><span><span
                                                class="mob-line">-</span> Portfolio Grid 4 Columns</span></a></li>
                            <li class="menu-item"><a href="portfolio-single.html"><span><span class="mob-line">-</span> Portfolio Single</span></a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="services.html"><span>Parceiros</span></a></li>
                    <li><a href="services.html"><span>Notícias</span></a></li>
                    <li><a href="contact.html"><span>Contato</span></a></li>
                </ul>
            </nav>
        </nav>
    </header>
    <!-- End Header -->

    <div class="intrinsic-container">
        <iframe src="http://player.crosshost.com.br/playerdev/flashvideo/38?versao=2" width="580" height="320"
                frameborder="no" scrolling="no"></iframe>
    </div>
    <!-- END REVOLUTION SLIDER -->
    <!-- Rev Slider End -->

    <!-- content
        ================================================== -->
    <div id="content">

        <div class="container">

            <section class="dnd_section_dd mt80">

                <div class="dnd_section_content">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="http://via.placeholder.com/260x250"/>
                        </div>
                        <div class="col-md-8">
                            <h1 class="main-title">Eventos</h1>
                            <div class="video">
                                <ul class="video-slider">
                                    <li>
                                        <a href="">
                                            <img src="http://www.rondoniaovivo.com/imagensEventos/15082017231750/rondoniaovivoIMG_9225.JPG"
                                                 width="400">
                                            <div class="caption">CORECON - Conselho regional de economia</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <img src="http://www.rondoniaovivo.com/imagensEventos/24072017091314/rondoniaovivoAAADSC_2499.JPG"
                                                 width="290">
                                            <div class="caption">I workshop Bem-me-Quero</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <img src="http://www.rondoniaovivo.com/imagensEventos/11072017163818/rondoniaovivoDSC_0003.JPG"
                                                 width="290">
                                            <div class="caption">Inauguração da loja física Estrela do Mar Beachwear
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <img src="http://www.rondoniaovivo.com/imagensEventos/17052017230755/AnielMusaFotograifa%20(13%20de%2062).jpg"
                                                 width="290">
                                            <div class="caption">Aniversário de 15 anos da Julye Silva</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- end container -->

    <!-- Blog -->
    <div class="blog">
        <div class="container">

            <h1 class="main-title">Destaques</h1>
            <div class="main-border"></div>
            <br>
            <div class="row">

                <div class="col-md-4">
                    <div class="blog-item">
                        <a href="#"><img src="http://via.placeholder.com/270x230" alt=""></a>
                        <div class="blog-inner" style="height: 200px;">
                            <a href="#"><h1>GOVERNO DE RONDÔNIA ENTREGA CASAS</h1></a>
                            <span>Agosto 06, 2017</span>
                            <p>Governo...</p>

                            <div class="blog-end">
                                <div class="post-comments">
                                    <a href="#"><i class="fa fa-comment"></i> 15</a>
                                </div>
                                <div class="post-like">
                                    <a href="#"><i class="fa fa-heart"></i> 56</a>
                                </div>
                                <a href="#" class="read-more">Leia Mais</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="blog-item">
                        <a href="#"><img src="http://via.placeholder.com/270x230" alt=""></a>
                        <div class="blog-inner" style="height: 200px;">
                            <a href="#"><h1>SINTERO ORGANIZA GREVE</h1></a>
                            <span>Setembro 01, 2017</span>
                            <p>O Sindicato dos trabalhadores da edução realiza greve nesta segunda feira...</p>

                            <div class="blog-end">
                                <div class="post-comments">
                                    <a href="#"><i class="fa fa-comment"></i> 15</a>
                                </div>
                                <div class="post-like">
                                    <a href="#"><i class="fa fa-heart"></i> 56</a>
                                </div>
                                <a href="#" class="read-more">Leia Mais</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="blog-item">
                        <a href="#"><img src="http://via.placeholder.com/270x230" alt=""></a>
                        <div class="blog-inner" style="height: 200px;">
                            <a href="#"><h1>CONCURSO PÚBLICO DA SEPOG</h1></a>
                            <span>Agosto 26, 2017</span>
                            <p>SEPOG RO abriu concursos para contratação de servidores...</p>

                            <div class="blog-end">
                                <div class="post-comments">
                                    <a href="#"><i class="fa fa-comment"></i> 15</a>
                                </div>
                                <div class="post-like">
                                    <a href="#"><i class="fa fa-heart"></i> 56</a>
                                </div>
                                <a href="#" class="read-more">Leia Mais</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
    <!-- End Blog -->

    <div class="news">
        <div class="container">
            <h1 class="main-title">Notícias</h1>
            <div class="main-border"></div>
            <br>
            <div class="row">
                <div class="col-md-8">
                    <ul>
                        <li>dsadsa</li>
                        <li>sadsadsa</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End content -->

<!-- footer
    ================================================== -->
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