<div class="modal fade" id="addTagModal" tabindex="-1" aria-labelledby="addTagModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="addTagModalLabel"></h1>
            </div>
            <div class="modal-body">
                <form action="{{  route('tags.store') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" id="addcTagInput" placeholder="タグ" name="name">
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
    const addTagModal = document.getElementById('addTagModal')
    const addTagInput = document.getElementById('addTagInput')

    addTagModal.addEventListener('shown.bs.modal', () => {
    addTagInput.focus()
    })
</script>





