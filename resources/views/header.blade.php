<div class="row">
    <div class="col-lg-2">
        <div class="header__logo">
            <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-light text-decoration-none">
                <span>N . TRUYỆN ONLINE</span>
            </a>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="header__nav">
            <nav class="header__menu mobile-menu">
                <ul>
                    <li class="active"><a href="./index.html">Homepage</a></li>
                    <li><a href="./categories.html">Categories <span class="arrow_carrot-down"></span></a>
                        <ul class="dropdown">
                            <li><a href="{{ route('Catetruyen-tranh.show') }}">Truyện Tranh</a></li>
                            <li><a href="{{ route('Catetieu-thuyet.show') }}">Tiểu Thuyết</a></li>
                        </ul>
                    </li>
                    <li><a href="./blog.html">Our Blog</a></li>
                    <li><a href="#">Contacts</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="header__right">
            <a href="#" class="search-switch"><span class="icon_search"></span></a>
        </div>
    </div>
</div>
<div id="mobile-menu-wrap"></div>
