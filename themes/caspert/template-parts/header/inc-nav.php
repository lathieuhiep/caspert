<?php

use ExtendSite\Admin\Options\Modules\GeneralOptions;

$logo = caspert_opt(GeneralOptions::class)::get_logo_id() ?? '';
?>
<header class="header">
    <div class="header__wrap">
        <div class="header__content">
            <div class="header__top">
                <div class="container">
                    <div class="header__location">
                        <div class="f-btn popup-open" data-popup-target="#popup-selectKhuvuc">
                            <i class="ex-marker"></i>
                            Mua ở đâu
                        </div>
                    </div>
                    <div class="btn-close-search d-xl-none"><i class="ex-close"></i></div>
                </div>
            </div>

            <div class="header__center">
                <div class="container">
                    <div class="header__group">
                        <div class="header__logo">
                            <a href="<?php echo esc_url( get_home_url( '/' ) ); ?>">
                                <?php
                                if ( ! empty( $logo ) ) :
                                    echo wp_get_attachment_image( $logo, 'medium' );
                                else :
                                    ?>
                                    <img class="logo-default"
                                         src="<?php echo esc_url( get_theme_file_uri( '/assets/images/logo.png' ) ) ?>"
                                         alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" width="64" height="64"/>

                                <?php endif; ?>
                            </a>
                        </div>

                        <div class="header__fixGrow">
                            <div class="header__list">
                                <ul>
                                    <li class="menu-has-children">
                                        <a href="dongsanpham.html" class="current link-meta" data-target="menu-clothes">Điều hòa</a>
                                    </li>
                                    <li><a href="baohanh.html">Bảo hành</a></li>
                                    <li><a href="tintuc.html">Blog</a></li>
                                    <li><a href="lienhe.html">Liên hệ</a></li>
                                </ul>
                            </div>
                            <div class="header__searchBtn">
                                <i class="ex-search"></i>
                            </div>
                            <div class="header__searchBox">
                                <div class="s-head">
                                    <form class="s-search" action="search.html">
                                        <input type="text" class="form-control" placeholder="Tìm kiếm">
                                        <span><i class="ex-search"></i></span>
                                    </form>
                                </div>
                                <div class="s-body">
                                    <h3 class="s-title">Tìm kiếm phổ biến</h3>
                                    <div class="s-keySearch">
                                        <a href="search.html">Mẹo sử dụng (7)</a>
                                        <a href="search.html">Hướng dẫn (7)</a>
                                        <a href="search.html">Lối sống (7)</a>
                                        <a href="search.html">Tin tức (7)</a>
                                    </div>

                                    <h3 class="s-title">Sản phẩm bán chạy</h3>
                                    <div class="s-product">
                                        <div class="swiper">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="productBox">
                                                        <div class="productBox__img">
                                                            <img src="assets/img/homeSanphamFed-img-1.jpg" alt="">
                                                        </div>
                                                        <div class="productBox__title">
                                                            <p class="f-masp">ESV09CRR-C6</p>
                                                            <h3 class="f-tensp"><a href="sanpham-detail.html">Điều hoà Electrolux Inverter 9000BTU 1 HP</a></h3>
                                                        </div>
                                                        <div class="productBox__price">5.800.000 <span>₫</span></div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="productBox">
                                                        <div class="productBox__img">
                                                            <img src="assets/img/homeSanphamFed-img-1.jpg" alt="">
                                                        </div>
                                                        <div class="productBox__title">
                                                            <p class="f-masp">ESV09CRR-C6</p>
                                                            <h3 class="f-tensp"><a href="sanpham-detail.html">Điều hoà Electrolux Inverter 9000BTU 1 HP</a></h3>
                                                        </div>
                                                        <div class="productBox__price">5.800.000 <span>₫</span></div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="productBox">
                                                        <div class="productBox__img">
                                                            <img src="assets/img/homeSanphamFed-img-1.jpg" alt="">
                                                        </div>
                                                        <div class="productBox__title">
                                                            <p class="f-masp">ESV09CRR-C6</p>
                                                            <h3 class="f-tensp"><a href="sanpham-detail.html">Điều hoà Electrolux Inverter 9000BTU 1 HP</a></h3>
                                                        </div>
                                                        <div class="productBox__price">5.800.000 <span>₫</span></div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="productBox">
                                                        <div class="productBox__img">
                                                            <img src="assets/img/homeSanphamFed-img-1.jpg" alt="">
                                                        </div>
                                                        <div class="productBox__title">
                                                            <p class="f-masp">ESV09CRR-C6</p>
                                                            <h3 class="f-tensp"><a href="sanpham-detail.html">Điều hoà Electrolux Inverter 9000BTU 1 HP</a></h3>
                                                        </div>
                                                        <div class="productBox__price">5.800.000 <span>₫</span></div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="productBox">
                                                        <div class="productBox__img">
                                                            <img src="assets/img/homeSanphamFed-img-1.jpg" alt="">
                                                        </div>
                                                        <div class="productBox__title">
                                                            <p class="f-masp">ESV09CRR-C6</p>
                                                            <h3 class="f-tensp"><a href="sanpham-detail.html">Điều hoà Electrolux Inverter 9000BTU 1 HP</a></h3>
                                                        </div>
                                                        <div class="productBox__price">5.800.000 <span>₫</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="header__right">
                            <div class="header__lang" data-dropdown>
                                <div class="f-btn" data-dropdownTrigger>
                                    <img src="assets/img/vn.jpg" alt="">
                                    <span>Tiếng Việt</span>
                                </div>
                                <div class="f-content" data-dropdownContent>
                                    <a href="#"><img src="assets/img/en.jpg" alt="">Tiếng Anh</a>
                                </div>
                            </div>
                            <div class="header__humberger d-xl-none">
                                <span class="t-1"></span>
                                <span class="t-2"></span>
                                <span class="t-3"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header__megamenu">
                    <div id="menu-clothes" class="mega-content">
                        <div class="container">
                            <div class="mega-item">
                                <h3 class="mega-title">Dòng sản phẩm</h3>
                                <ul class="mega-list">
                                    <li><a href="dongsanpham.html">Ultimate Comfort Series</a></li>
                                    <li><a href="dongsanpham.html">Điều hòa Inverter</a></li>
                                    <li><a href="dongsanpham.html">Điều hòa tiêu chuẩn</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="menu-electronics" class="mega-content">
                        <div class="container">
                            <div class="mega-item">
                                <h3 class="mega-title">Dòng sản phẩm</h3>
                                <ul class="mega-list">
                                    <li><a href="dongsanpham.html">Ultimate Comfort Series</a></li>
                                    <li><a href="dongsanpham.html">Điều hòa Inverter</a></li>
                                    <li><a href="dongsanpham.html">Điều hòa tiêu chuẩn</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header__fixHeight"></div>
    <div class="header__bg"></div>
</header>