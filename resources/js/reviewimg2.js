// Hàm xử lý việc hiển thị hình ảnh thu nhỏ trước khi tải lên
function previewThumbnailImage(inputElement, previewElement) {
    const reader = new FileReader();
    reader.onload = (e) => {
        previewElement.src = e.target.result;
    };
    inputElement.addEventListener("change", (e) => {
        const f = e.target.files[0];
        reader.readAsDataURL(f);
    });
}

// Call the function to preview the thumbnail image
const thumbnailInput = document.getElementById("chuong_hinhanh_tenhinh");
const thumbnailPreview = document.getElementById("preview-img");
previewThumbnailImage(thumbnailInput, thumbnailPreview);