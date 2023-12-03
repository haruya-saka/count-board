{{-- タグの一覧と付加モーダル --}}
<div class="modal fade" id="showTagModal{{ $memo->id }}" tabindex="-1" aria-labelledby="showTagModalLabel{{ $memo->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">タグ</h1>
            </div>
            <div class="modal-body">
                <form action="{{ route('memos.attachTags', $memo) }}" method="POST">
                    @csrf
                    @foreach ($tags as $tag )
                    <label>  
                        <div class="d-flex align-items-center mt-3 me-3">
                            @if ($memo->tags()->where('tag_id', $tag->id)->exists())
                                <input type="checkbox" name="tag_ids[]" value="{{ $tag->id }}" checked>
                            @else
                                <input type="checkbox" name="tag_ids[]" value="{{ $tag->id }}">
                            @endif                                    
                            <span class="badge bg-secondary ms-1 fw-light">{{ $tag->name }}</span>
                        </div>                                                   
                    </label> 
                    @endforeach
                    <button type="submit" class="btn btn-primary">add</button>
                </form>
            </div>
        </div>
    </div>
</div>
