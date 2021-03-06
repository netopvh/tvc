<ul class="icons-list">
    <li>
        @if($banner->publicado)
            <form action="{{ route('admin.banners.unpublish',['id' => $banner->id]) }}"
                  method="POST">
                <input type="hidden" name="posicao" value="{{ $banner->posicao }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <button class="delete" title="Despublicar"
                        style="padding: 0 0 0 0;border: 0; background: transparent;"><i
                            class="icon-price-tag3" style="padding-top: 2px;"></i>
                </button>
            </form>
        @else
            <form action="{{ route('admin.banners.publish',['id' => $banner->id]) }}"
                  method="POST">
                <input type="hidden" name="posicao" value="{{ $banner->posicao }}">
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
        <a href="{{ route('admin.banners.edit',['id' => $banner->id]) }}">
            <i class="icon-pencil7"></i>
        </a>
    </li>
    <li>
        <form class="form-delete"
              action="{{ route('admin.banners.destroy',['id' => $banner->id]) }}"
              method="POST">
            <input type="hidden" name="id" value="{{ $banner->id }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button name="delete-modal" class="delete"
                    style="padding: 0 0 0 0;border: 0; background: transparent;"><i
                        class="icon-trash" style="padding-top: 2px;"></i>
            </button>
        </form>
    </li>
</ul>