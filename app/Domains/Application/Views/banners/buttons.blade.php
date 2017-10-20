<ul class="icons-list">
    <li>
        @if($banner->publicado)
            <a href="{{ route('admin.parceiros.edit',['id' => $banner->id]) }}" title="Despublicar">
                <i class="icon-price-tag3"></i>
            </a>
        @else
            <a href="{{ route('admin.parceiros.edit',['id' => $banner->id]) }}" title="Publicar">
                <i class="icon-price-tag3"></i>
            </a>
        @endif
    </li>
    <li>
        <a href="{{ route('admin.parceiros.edit',['id' => $banner->id]) }}">
            <i class="icon-pencil7"></i>
        </a>
    </li>
    <li>
        <form class="form-delete"
              action="{{ route('admin.parceiros.destroy',['id' => $banner->id]) }}"
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