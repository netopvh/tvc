<div class="destaques">
    <div class="container">
        <h1 class="main-title">Destaques</h1>
        <div class="main-border"></div>
        <br>
        <div class="row">
            @if(counter($destaques))
                @foreach($destaques as $destaque)
                    <div class="col-md-4">
                        <div class="blog-item">
                            <a href="#"><img src="{{ asset('storage/noticias/'.$destaque->img_destaque) }}" alt=""></a>
                            <div class="blog-inner" style="height: 250px;">
                                <a href="#"><h1>{{ $destaque->titulo }}</h1></a>
                                <span>{{ $destaque->created_at->format('d/m/Y H:i:s') }}</span>
                                <p class="text-justify">{!! str_limit($destaque->short_content,180) !!}</p>

                                <div class="blog-end">
                                    <div class="post-comments">
                                        <a href="#"><i class="fa fa-comment"></i> 15</a>
                                    </div>
                                    <a href="#" class="read-more">Leia Mais</a>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <h4>Sem Destaques Cadastrados!</h4>
                </div>
            @endif
        </div>
    </div>
</div>