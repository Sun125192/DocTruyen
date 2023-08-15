import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

ClassicEditor
    .create(document.querySelector('#chuong_noidung'))
    .catch(error => {
        console.error(error);
    });