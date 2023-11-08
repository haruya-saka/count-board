const editTagForm = document.forms.edtiTagForm;

const deleteTagForm = document.forms.deleteTagForm;

const deleteMessage = document.getElementById('deleteTagModalLabel');

document.getElementById('editTagModal').addEventListener('show.bs.modal', (event) => {
    let tagButton = event.relatedTarget;
    let tagId = tagButton.dataset.tagId;
    let tagName = tagButton.dataset.tagName;

    editTagForm.action = `tags/${tagId}`;
    editTagForm.value = tagName;
})
