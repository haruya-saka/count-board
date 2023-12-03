{{-- メモの編集モーダル --}}
<div class="modal fade" id="editMemoModal{{ $memo->id }}" tabindex="-1" aria-labelledby="editMemoModalLabel{{ $memo->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMemoModalLabel{{ $memo->id }}">目標の編集</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
            </div>
            <form action="{{ route('memos.update', $memo) }}" method="post">
                @csrf
                @method('patch')                                                                    
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="addMemoInput" value="{{ $memo->title }}" name="title">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="content" name="content">{{ $memo->content }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="period">カウント日数を入力：</label>
                        <input type="number" class="form-control w-25" id="period" name="period" min="0" value="{{ $memo->period }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">更新</button>
                </div>   
            </form>             
        </div>
    </div>
</div>