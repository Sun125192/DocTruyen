/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/reviewimg2.js ***!
  \************************************/
// Hàm xử lý việc hiển thị hình ảnh thu nhỏ trước khi tải lên
function previewThumbnailImage(inputElement, previewElement) {
  var reader = new FileReader();
  reader.onload = function (e) {
    previewElement.src = e.target.result;
  };
  inputElement.addEventListener("change", function (e) {
    var f = e.target.files[0];
    reader.readAsDataURL(f);
  });
}

// Call the function to preview the thumbnail image
var thumbnailInput = document.getElementById("chuong_hinhanh_tenhinh");
var thumbnailPreview = document.getElementById("preview-img");
previewThumbnailImage(thumbnailInput, thumbnailPreview);
/******/ })()
;