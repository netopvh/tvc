<ul class="icons-list">
    <li>
        <a href="{{ route('admin.parceiros.edit',['id' => $parceiro->id]) }}">
            <i class="icon-pencil7"></i>
        </a>
    </li>
    <li>
        <form class="form-delete"
              action="{{ route('admin.parceiros.destroy',['id' => $parceiro->id]) }}"
              method="POST">
            <input type="hidden" name="id" value="{{ $parceiro->id }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button name="delete-modal" class="delete"
                    style="padding: 0 0 0 0;border: 0; background: transparent;"><i
                        class="icon-trash" style="padding-top: 2px;"></i>
            </button>
        </form>
    </li>
</ul>