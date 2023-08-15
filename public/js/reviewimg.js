/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/reviewimg.js ***!
  \***********************************/
var reader = new FileReader();
var fileInput = document.getElementById("truyen_hinhdaidien");
var img = document.getElementById("preview-img");
reader.onload = function (e) {
  img.src = e.target.result;
};
fileInput.addEventListener("change", function (e) {
  var f = e.target.files[0];
  reader.readAsDataURL(f);
});
/******/ })()
;