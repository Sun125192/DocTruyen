const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js");
mix.js("resources/js/admin.js", "public/js")
    .js("resources/js/reviewimg.js", "public/js")
    .js("resources/js/reviewimg2.js", "public/js")
    .js("resources/js/bootstrap5.js", "public/js")
    .js("resources/js/ckeditor.js", "public/js")
    .postCss("resources/css/bootstrap5.css", "public/css")
    .postCss("resources/css/ckeditor.css", "public/css")
    .postCss("resources/css/admin.css", "public/css");
