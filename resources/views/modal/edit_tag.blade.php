{{-- タグ編集モーダル --}}
<div class="modal fade" id="editTagModal" tabindex="-1" aria-labelledby="editTagModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                {{-- タグの追加 --}}
                <form action="{{ route('tags.store') }}" method="post" autocomplete="off">

                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" id="addcTagInput" placeholder="タグを追加" name="name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
                {{-- タグの一覧 --}}
                @foreach ($tags as $tag)
                <ul>
                    <li class="d-flex align-items-center">
                        <form action="{{ route('tags.destroy', $tag) }}" method="post" >
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn" style="margin-top: 10px;"><i class="fa-solid fa-trash-can icon"></i></button>
                        </form>
                        <span>{{ $tag->name }}</span>
                    </li>
                </ul>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

</script>






