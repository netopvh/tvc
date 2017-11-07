@extends('layout.frontend.app')

@section('eventos-home')
    @include('eventos.home')
@stop

@section('content-home')
    <br>
    <div class="news">
        <div class="container">
            <h1 class="main-title">Notícias</h1>
            <div class="main-border"></div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="post post-variant-2">
                        <div class="unit unit-xl-horizontal text-sm-left unit-sm-horizontal unit-md-horizontal unit-lg-horizontal">
                            <div class="unit-left">
                                <div class="post-inner">
                                    <div class="reveal-inline-block">
                                        <img src="https://livedemo00.template-help.com/wt_58731/images/index-19.jpg" width="150" height="115" alt="" class="post-image"></div>
                                    <div class="post-caption">
                                        <ul>
                                            <li><a href="politics.html"><span class="label label-warning">World</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="unit-body">
                                <div class="h4 text-bold"><a href="post-default.html" class="post-link">Happy National Chocolate Cake Day! ‘GMA’ Viewers Share Decadent Recipes</a></div>
                                <p>GMA" invited viewers to submit their chocolate cake recipes for a review, as the US celebrates the national chocolate cake day.</p>
                                <div class="post-meta post-meta-hidden-outer">
                                    <div class="post-meta-hidden">
                                        <div class="icon text-gray icon-lg material-icons-share">
                                            <ul>
                                                <li><a href="#" class="icon fa fa-facebook"></a></li>
                                                <li><a href="#" class="icon fa fa-twitter"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="element-groups-custom">
                                        <a href="categories-list.html" class="post-meta-author">Categoria: Política</a>
                                        <a href="politics.html" class="post-meta-time">
                                            <time datetime="2016-06-06">2h ago</time>
                                        </a>
                                        <a href="post-default.html#comments" class="post-meta-comment">15 Comentários</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider divider-dashed"></div>
                </div>
            </div>
        </div>
    </div>
@stop
