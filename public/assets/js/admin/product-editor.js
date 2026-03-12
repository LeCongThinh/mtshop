document.addEventListener("DOMContentLoaded", function () {
    const editorElement = document.querySelector('#description');

    if (editorElement) {
        ClassicEditor
            .create(editorElement, {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
            }).then(editor => {
                editor.model.document.on('change:data', () => {
                    editorElement.value = editor.getData();
                });
            }).catch(error => {
                console.error('CKEditor Error:', error);
            });
    }
});