<ul class="icons-list">
    <li>
        @if($noticia->publicado)
            <form action="{{ route('admin.banners.unpublish',['id' => $noticia->id]) }}"
                  method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <button class="delete" title="Despublicar"
                        style="padding: 0 0 0 0;border: 0; background: transparent;"><i
                            class="icon-price-tag3" style="padding-top: 2px;"></i>
                </button>
            </form>
        @else
            <form action="{{ route('admin.banners.publish',['id' => $noticia->id]) }}"
                  method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <button class="delete" title="Publicar"
                        style="padding: 0 0 0 0;border: 0; background: transparent;"><i
                            class="icon-price-tag3" style="padding-top: 2px;"></i>
                </button>
            </form>
        @endif
    </li>
    <li>
        <a href="{{ route('admin.banners.edit',['id' => $noticia->id]) }}">
            <i class="icon-pencil7"></i>
        </a>
    </li>
    <li>
        <form class="form-delete"
              action="{{ route('admin.noticias.destroy',['id' => $noticia->id]) }}"
              method="POST">
            <input type="hidden" name="id" value="{{ $noticia->id }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button name="delete-modal" class="delete"
                    style="padding: 0 0 0 0;border: 0; background: transparent;"><i
                        class="icon-trash" style="padding-top: 2px;"></i>
            </button>
        </form>
    </li>
</ul>