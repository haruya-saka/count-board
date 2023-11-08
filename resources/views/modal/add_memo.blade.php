<div class="modal fade" id="addMemoModal" tabindex="-1" aria-labelledby="addMemoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="addMemoModalLabel"></h1>
            </div>
            <div class="modal-body">
                <form action="{{  route('memos.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" id="addMemoInput" placeholder="タイトル" name="title">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="content" name="content" placeholder="メモを入力・・・"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="period">カウント日数を入力：</label>
                        <input type="number" class="form-control w-25" id="period" name="period" min="0">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const addMemoModal = document.getElementById('addMemoModal')
    const addMemoInput = document.getElementById('addMemoInput')

    addMemoModal.addEventListener('shown.bs.modal', () => {
    addMemoInput.focus()
    })
</script>





