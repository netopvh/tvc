<div class="news">
    <div class="container">
        <h1 class="main-title">Últimas Notícias</h1>
        <div class="main-border"></div>
        <br>
        <div class="row">
            <div class="col-md-8">
                @foreach($noticias as $noticia)
                    <div class="post post-variant-2">
                        <div class="unit unit-xl-horizontal text-sm-left unit-sm-horizontal unit-md-horizontal unit-lg-horizontal">
                            <div class="unit-left">
                                <div class="post-inner">
                                    <div class="reveal-inline-block">
                                        <img src="{{ asset('storage/noticias/'.$noticia->img_destaque) }}"
                                             width="150" height="115" alt="" class="post-image"></div>
                                    <div class="post-caption">
                                        <ul>
                                            <li><a href="politics.html"><span class="label label-warning">{{ $noticia->categoria->descricao }}</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="unit-body">
                                <div class="h4 text-bold"><a href="post-default.html" class="post-link">{{ $noticia->titulo }}</a></div>
                                <p>{!! str_limit($noticia->conteudo,200) !!}</p>
                                <div class="post-meta post-meta-hidden-outer">
                                    <div class="element-groups-custom">
                                        <a href="politics.html" class="post-meta-time">
                                            <time datetime="2016-06-06">{{ $noticia->created_at->diffForHumans() }}</time>
                                        </a>
                                        <a href="#" class="post-meta-comment"><i class="fa fa-comment"></i>0 Comentários</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="divider divider-dashed"></div>
            </div>
        </div>
    </div>
</div>