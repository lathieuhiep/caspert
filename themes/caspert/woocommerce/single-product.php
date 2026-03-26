<?php
get_header();
get_template_part('template-parts/components/inc', 'breadcrumbs');
?>

    <section class="section sec-sanphamDetailHead">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="productViewSlide wow fadeInUp">
                        <div class="fix-wrap">
                            <div class="swiper-big swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" data-index="0">
                                        <div class="f-img zoom-item d-none d-xl-block" data-zoom-mode="right">
                                            <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/sanphamDetailHead-img-1.jpg')) ?>" alt="" class="main-img">
                                        </div>
                                        <a href="/<?php echo esc_url(get_theme_file_uri('/assets/img/sanphamDetailHead-img-1.jpg')) ?>" data-fancybox="popup-gallery" class="f-img d-xl-none" data-caption="Điều hoà Electrolux Inverter 9000BTU 1 HP &lt;small&gt;ESV09CRR-C6&lt;/small&gt;">
                                            <img src="/<?php echo esc_url(get_theme_file_uri('/assets/img/sanphamDetailHead-img-1.jpg')) ?>" width="240" height="180" alt="Video poster #1">
                                        </a>
                                    </div>
                                    <div class="swiper-slide" data-index="1">
                                        <div class="f-img video-item d-none d-xl-block">
                                            <video id="video-1" class="product-video" loop playsinline controls poster="<?php echo esc_url(get_theme_file_uri('/assets/img/sanphamDetailHead-img-1.jpg')) ?>" preload="none" src="<?php echo esc_url(get_theme_file_uri('/assets/img/video-1.mp4')) ?>">
                                            </video>
                                        </div>
                                        <a href="<?php echo esc_url(get_theme_file_uri('/assets/img/video-1.mp4')) ?>" data-fancybox="popup-gallery" class="f-img video-item d-xl-none" data-caption="Điều hoà Electrolux Inverter 9000BTU 1 HP &lt;small&gt;ESV09CRR-C6&lt;/small&gt;">
                                            <img src="/<?php echo esc_url(get_theme_file_uri('/assets/img/sanphamDetailHead-img-1.jpg')) ?>" width="240" height="180" alt="Video poster #1">
                                        </a>
                                    </div>
                                    <div class="swiper-slide" data-index="2">
                                        <div class="f-img zoom-item d-none d-xl-block" data-zoom-mode="right">
                                            <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/sanphamDetailHead-img-2.jpg')) ?>" alt="" class="main-img">
                                        </div>
                                        <a href="/<?php echo esc_url(get_theme_file_uri('/assets/img/sanphamDetailHead-img-2.jpg')) ?>" data-fancybox="popup-gallery" class="f-img d-xl-none" data-caption="Điều hoà Electrolux Inverter 9000BTU 1 HP &lt;small&gt;ESV09CRR-C6&lt;/small&gt;">
                                            <img src="/<?php echo esc_url(get_theme_file_uri('/assets/img/sanphamDetailHead-img-2.jpg')) ?>" width="240" height="180" alt="Video poster #1">
                                        </a>
                                    </div>
                                    <div class="swiper-slide" data-index="3">
                                        <div class="f-img video-item d-none d-xl-block">
                                            <video id="video-1" class="product-video" loop playsinline controls poster="<?php echo esc_url(get_theme_file_uri('/assets/img/sanphamDetailHead-img-1.jpg')) ?>" preload="none" src="<?php echo esc_url(get_theme_file_uri('/assets/img/video-2.mp4')) ?>">
                                            </video>
                                        </div>
                                        <a href="<?php echo esc_url(get_theme_file_uri('/assets/img/video-2.mp4')) ?>" data-fancybox="popup-gallery" class="f-img video-item d-xl-none" data-caption="Điều hoà Electrolux Inverter 9000BTU 1 HP &lt;small&gt;ESV09CRR-C6&lt;/small&gt;">
                                            <img src="/<?php echo esc_url(get_theme_file_uri('/assets/img/sanphamDetailHead-img-1.jpg')) ?>" width="240" height="180" alt="Video poster #1">
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-buttonCustom style-2">
                                    <div class="swiper-buttonCustom-prev"><i class="ex-arrowLong-left"></i></div>
                                    <div class="swiper-buttonCustom-next"><i class="ex-arrowLong-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-thumb swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide" data-index="0">
                                    <div class="f-thumb">
                                        <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/sanphamDetailHead-img-1.jpg')) ?>" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide" data-index="1">
                                    <div class="f-thumb f-thumb__video">
                                        <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/sanphamDetailHead-img-1.jpg')) ?>" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide" data-index="2">
                                    <div class="f-thumb">
                                        <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/homeSanphamFed-img-2.png')) ?>" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide" data-index="3">
                                    <div class="f-thumb f-thumb__video">
                                        <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/sanphamDetailHead-img-1.jpg')) ?>" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="zoom-result" class="zoom-result-window"></div>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1">
                    <div class="sanphamDetailBox">
                        <div class="product-label wow fadeInUp">
                            <span class="label-hot">Hot</span>
                        </div>
                        <div class="productBox__title wow fadeInUp">
                            <h3 class="f-tensp"><?php the_title() ?></h3>
                            <?php
                            $product = wc_get_product(get_the_ID());
                            $sku = $product ? $product->get_sku() : ''
                            ?>
                            <p class="f-masp"><?php echo esc_html($sku) ?></p>
                        </div>
                        <div class="productBox__info wow fadeInUp">
                           <?php the_content(); ?>
                        </div>
                        <p class="productBox__apdung wow fadeInUp">(*) Áp dụng theo chính sách bảo hành của hãng</p>
                        <div class="productBox__price wow fadeInUp"><?php echo $product->get_price_html(); ?></div>
                        <div class="productBox__tragop2 wow fadeInUp">
                            <span>Lãi suất 0%</span>
                            <p><strong>1.998.333 ₫/tháng</strong> trong 6 tháng</p>
                        </div>
                        <div class="productBox__quatang wow fadeInUp">
                            <span class="f-label">QUÀ TẶNG khi mua thêm 16.000.000 ₫</span>
                            <div class="f-inner">
                                <p class="f-text">
                                    <a href="#">
                                        Lò vi sóng để bàn 20L UltimateTaste 300
                                        <br>
                                        (Trị giá <strong>1.790.000 ₫</strong>)
                                    </a>
                                </p>
                                <div class="f-img">
                                    <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/homeSanphamFed-img-1.jpg')) ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="productBox__btn wow fadeInUp">
                            <a href="#" class="btn btn--block btn--sm">MUA Ở ĐÂU</a>
                        </div>
                        <ul class="productBox__infoFeatured wow fadeInUp">
                            <li>
                                <span><img src="assets/img/icon-product-1.png" alt=""></span>
                                <p><a href="#">Thu cũ đổi mới, giảm thêm 5%</a></p>
                                <div class="has-tooltip" data-target="#tooltip-sp-1" data-pos="bottom">
                                    <i class="ex-help"></i>
                                    <div id="tooltip-sp-1" style="display: none;">
                                        <div class="tooltop-sanphamHelp">
                                            <h4>Tieu de</h4>
                                            <p>Chỉ áp dụng cho khách hàng mua hàng trực tuyến trên website Electrolux.vn tại khu vực Hà Nội và TP. Hồ Chí Minh. Ưu đãi giảm trực tiếp và đầu tiên trên sản phẩm mới</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span><img src="assets/img/icon-product-2.png" alt=""></span>
                                <p>Chấp nhận thanh toán khi giao hàng</p>
                            </li>
                            <li>
                                <span><img src="assets/img/icon-product-3.png" alt=""></span>
                                <p>Phí trọn gói lắp đặt</p>
                            </li>
                            <li>
                                <span><img src="assets/img/icon-product-4.png" alt=""></span>
                                <p><a href="#">Bảo hành 2 năm</a></p>
                            </li>
                        </ul>
                        <p class="productBox__apdung wow fadeInUp">(*) Áp dụng theo chính sách bảo hành của hãng</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section sec-sanphamDetailContent">
        <div class="item-sticky">
            <div class="item-sticky__head">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-8 col-xl-7">
                            <div class="s-sanpham">
                                <div class="productBox__img">
                                    <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/homeSanphamFed-img-1.jpg')) ?>" alt="">
                                </div>
                                <div class="product-label">
                                    <span class="label-hot">Hot</span>
                                </div>
                                <div class="productBox__title">
                                    <h3 class="f-tensp"><a href="#">Lò nướng âm tủ 60cm UltimateTaste 300 dung tích 72L</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-5">
                            <div class="productBox__price">5.800.000 <span>₫</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-sticky__menu">
                <div class="container">
                    <div class="f-list">
                        <ul>
                            <li><a href="#text-id-1" class="nav-linkJs">Lợi ích</a></li>
                            <li><a href="#text-id-2" class="nav-linkJs">Thông số</a></li>
                            <li><a href="#text-id-3" class="nav-linkJs">Hỗ trợ</a></li>
                            <li><a href="#text-id-4" class="nav-linkJs">Sản phẩm liên quan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="item-contentWrap">
            <div class="container">
                <div class="item-loiich" id="text-id-1" data-trigger-link>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ctaBox wow fadeInUp">
                                <div class="ctaBox__bg">
                                    <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/sanphamDetailContent-loiich-1.jpg')) ?>" alt="">
                                </div>
                                <div class="ctaBox__inner">
                                    <h3 class="ctaBox__title"><a href="#">Thiết bị nấu nướng hoàn hảo</a></h3>
                                    <p class="catBox__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
                                    <div class="ctaBox__btn">
                                        <a href="#" class="btn-link">XEM THÊM</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ctaBox wow fadeInUp">
                                <div class="ctaBox__bg">
                                    <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/sanphamDetailContent-loiich-1.jpg')) ?>" alt="">
                                </div>
                                <div class="ctaBox__inner">
                                    <h3 class="ctaBox__title"><a href="#">Thiết bị nấu nướng hoàn hảo</a></h3>
                                    <p class="catBox__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
                                    <div class="ctaBox__btn">
                                        <a href="#" class="btn-link">XEM THÊM</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ctaBox wow fadeInUp">
                                <div class="ctaBox__bg">
                                    <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/sanphamDetailContent-loiich-1.jpg')) ?>" alt="">
                                </div>
                                <div class="ctaBox__inner">
                                    <h3 class="ctaBox__title"><a href="#">Thiết bị nấu nướng hoàn hảo</a></h3>
                                    <p class="catBox__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
                                    <div class="ctaBox__btn">
                                        <a href="#" class="btn-link">XEM THÊM</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ctaBox wow fadeInUp">
                                <div class="ctaBox__bg">
                                    <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/sanphamDetailContent-loiich-1.jpg')) ?>" alt="">
                                </div>
                                <div class="ctaBox__inner">
                                    <h3 class="ctaBox__title"><a href="#">Thiết bị nấu nướng hoàn hảo</a></h3>
                                    <p class="catBox__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
                                    <div class="ctaBox__btn">
                                        <a href="#" class="btn-link">XEM THÊM</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-tinhnangWrap" id="text-id-2" data-trigger-link>
                <div class="container">
                    <div class="item-tinhnang wow fadeInUp">
                        <h2 class="titlebox__title">Tính năng</h2>
                        <table class="f-table">
                            <tbody>
                            <tr>
                                <td>Cửa có thể tháo rời</td>
                                <td>Đèn</td>
                                <td>Tự động tắt</td>
                            </tr>
                            <tr>
                                <td>Chương trình nướng</td>
                                <td>Cửa kính </td>
                                <td>Số chương trình</td>
                            </tr>
                            <tr>
                                <td>Số lượng kệ </td>
                                <td>Hẹn giờ</td>
                                <td>Tính năng làm sạch</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="item-thongso wow fadeInUp">
                        <h2 class="titlebox__title">Thông số kỹ thuật</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="ts-box">
                                    <h3 class="ts-box__title">Thông số chính</h3>
                                    <div class="ts-box__content">
                                        <div class="ts-box__chinh">
                                            <p>Kích thước</p>
                                            <ul>
                                                <li>595 mm (R)</li>
                                                <li>569 mm (S)</li>
                                                <li>594 mm (C)</li>
                                            </ul>
                                        </div>
                                        <div class="ts-box__chinh">
                                            <p>Màu sắc</p>
                                            <ul>
                                                <li>Đen</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ts-box">
                                    <h3 class="ts-box__title">Tải Hướng Dẫn Sử dụng</h3>
                                    <div class="ts-box__content">
                                        <div class="ts-box__hdan">
                                            <ul>
                                                <li><a href="#"><i class="ex-download"></i>Hướng dẫn sử dụng sản phẩm (610,50 KB)</a></li>
                                                <li><a href="#"><i class="ex-download"></i>Hướng dẫn sử dụng sản phẩm (610,50 KB)</a></li>
                                                <li><a href="#"><i class="ex-download"></i>Hướng dẫn sử dụng sản phẩm (610,50 KB)</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="collapse">
                            <div class="collapse-title">
                                <span class="n-dong">ĐÓNG&nbsp;</span>
                                <span class="n-mo">MỞ&nbsp;</span>
                                BẢNG CHI TIẾT THÔNG SỐ
                                <i class="ex-arrow-circle-left"></i>
                            </div>
                            <div class="collapse-content">
                                <div class="collapse-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="ts-box">
                                                <h3 class="ts-box__title">Thông tin chung</h3>
                                                <div class="ts-box__content">
                                                    <div class="ts-box__chung">
                                                        <ul>
                                                            <li>
                                                                <span>Loại sản phẩm</span>
                                                                <p>Lò vi sóng không nướng</p>
                                                            </li>
                                                            <li>
                                                                <span>Loại lắp đặt</span>
                                                                <p>Đứng độc lập</p>
                                                            </li>
                                                            <li>
                                                                <span>Loại năng lượng</span>
                                                                <p>Điện</p>
                                                            </li>
                                                            <li>
                                                                <span>Tần số (Hz)</span>
                                                                <p>50</p>
                                                            </li>
                                                            <li>
                                                                <span>Nguồn điện (V)</span>
                                                                <p>220-240</p>
                                                            </li>
                                                            <li>
                                                                <span>Dung tích khoang lò (L)</span>
                                                                <p>20</p>
                                                            </li>
                                                            <li>
                                                                <span>Công suất vi sóng (W)</span>
                                                                <p>800</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ts-box">
                                                <h3 class="ts-box__title">Phụ kiện</h3>
                                                <div class="ts-box__content">
                                                    <div class="ts-box__chung">
                                                        <ul>
                                                            <li>
                                                                <span>Phụ kiện đi kèm</span>
                                                                <p>Khay kính, Đế xoay, Trục xoay</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ts-box">
                                                <h3 class="ts-box__title">Kích thước</h3>
                                                <div class="ts-box__content">
                                                    <div class="ts-box__chung">
                                                        <ul>
                                                            <li>
                                                                <span>Chiều rộng sản phẩm</span>
                                                                <p>455 mm</p>
                                                            </li>
                                                            <li>
                                                                <span>Chiều sâu sản phẩm</span>
                                                                <p>353 mm</p>
                                                            </li>
                                                            <li>
                                                                <span>Chiều cao sản phẩm</span>
                                                                <p>261 mm</p>
                                                            </li>
                                                            <li>
                                                                <span>Khối lượng tịnh (kg)</span>
                                                                <p>10.3</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ts-box">
                                                <h3 class="ts-box__title">Kích thước và trọng lượng bao bì</h3>
                                                <div class="ts-box__content">
                                                    <div class="ts-box__chung">
                                                        <ul>
                                                            <li>
                                                                <span>Chiều rộng đóng thùng</span>
                                                                <p>502 mm</p>
                                                            </li>
                                                            <li>
                                                                <span>Chiều sâu đóng thùng</span>
                                                                <p>396 mm</p>
                                                            </li>
                                                            <li>
                                                                <span>Chiều cao đóng thùng</span>
                                                                <p>286 mm</p>
                                                            </li>
                                                            <li>
                                                                <span>Trọng lượng phủ bì (Kg)</span>
                                                                <p>11.4</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-hotro" id="text-id-3" data-trigger-link>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="ctaBox2 wow fadeInUp">
                                <div class="ctaBox__bg">
                                    <img src="assets/img/sanphamDetailContent-hotro-1.jpg" alt="">
                                </div>
                                <div class="ctaBox__inner">
                                    <div class="cataBox__icon">
                                        <svg viewBox="0 0 80 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M41.2188 99.916C40.8312 100.066 40.4186 100.146 40 100.146C39.5811 100.146 39.168 100.067 38.7803 99.916L40 97.7842L41.2188 99.916ZM38.9922 92.3184L37.832 92.9824L37.3975 93.2305L37.6455 93.665L39.4229 96.7754L37.8936 99.4531L18.2354 88.2227L21.5791 82.3672L38.9922 92.3184ZM61.7637 88.2227L42.1055 99.4531L40.7178 97.0244L40.5762 96.7754L42.3545 93.665L42.6025 93.2305L42.168 92.9824L41.0068 92.3184L58.4199 82.3672L61.7637 88.2227ZM41.2383 93.6025L40 95.7686L38.7607 93.6025L40 92.8945L41.2383 93.6025ZM7.24707 58.665C7.33304 63.3549 8.61267 67.9489 10.9697 72.0107C13.3275 76.0736 16.6822 79.4646 20.7129 81.8662L17.3691 87.7236C12.3066 84.7319 8.09422 80.4892 5.13965 75.3984C2.18499 70.3075 0.59007 64.5451 0.503906 58.665H7.24707ZM79.4961 58.665C79.4099 64.5451 77.815 70.3075 74.8604 75.3984C71.9056 80.4895 67.6928 84.7319 62.6299 87.7236L59.2861 81.8662C63.3165 79.4649 66.6714 76.075 69.0293 72.0127C71.3865 67.9515 72.6653 63.3583 72.752 58.6689L76.1299 58.665H79.4961ZM79.5 23.2637V57.6602L76.1289 57.665H72.7578V23.2637H79.5ZM7.24219 23.2588V57.6602L0.5 57.6641V23.2588H7.24219ZM74.7842 15.1309C77.5119 16.4954 79.3064 19.2175 79.4844 22.2637H72.6875C72.638 22.0928 72.5625 21.9296 72.4639 21.7793C72.3649 21.6285 72.2442 21.4945 72.1064 21.3809L74.7842 15.1309ZM6.22461 17.4746L7.8877 21.3789C7.61367 21.6084 7.41341 21.9154 7.31348 22.2588H0.515625C0.603433 20.7642 1.08172 19.3124 1.9082 18.0586C2.73483 16.8046 3.8769 15.7944 5.21484 15.125L6.22461 17.4746ZM73.8721 14.7217L71.2158 20.9199L41.2725 8.08301L41.7148 7.89453L42.1738 7.69727L41.9775 7.23828L40.54 3.87988L41.7852 0.972656L73.8721 14.7217ZM39.4521 3.87988L38.0176 7.23242L37.8213 7.69238L38.2803 7.88867L38.7334 8.08301L8.79102 20.9141L7.18848 17.1836L6.13672 14.7158L38.209 0.972656L39.4521 3.87988ZM40.8604 7.1709L40.0029 7.53906L39.1338 7.16602L39.9961 5.15137L40.8604 7.1709ZM40 0.5C40.2877 0.5 40.5735 0.537113 40.8506 0.609375L40 2.60059L39.1484 0.609375C39.4258 0.536956 39.712 0.5 40 0.5Z" fill="white" stroke="white"/>
                                            <path d="M55.4839 40L34.8387 60.6452L24.5161 50.3226" stroke="white" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>

                                    </div>
                                    <h3 class="ctaBox__title">BẠN HOÀN TOÀN CÓ THỂ YÊN TÂM</h3>
                                    <div class="catBox__text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ctaBox wow fadeInUp">
                                <div class="ctaBox__bg">
                                    <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/sanphamDetailContent-loiich-1.jpg')) ?>" alt="">
                                </div>
                                <div class="ctaBox__inner">
                                    <h3 class="ctaBox__title"><a href="#">Bảo hành điều hoà</a></h3>
                                    <div class="catBox__text">
                                        <ul>
                                            <li>2 năm toàn máy </li>
                                            <li>12 năm máy nén inverter</li>
                                        </ul>
                                    </div>
                                    <div class="ctaBox__btn">
                                        <a href="#" class="btn-link">TÌM HIỂU THÊM <i class="ex-arrow-circle-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ctaBox wow fadeInUp">
                                <div class="ctaBox__bg">
                                    <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/sanphamDetailContent-loiich-1.jpg')) ?>" alt="">
                                </div>
                                <div class="ctaBox__inner">
                                    <h3 class="ctaBox__title"><a href="#">Kinh nghiệm mua <br>điều hòa</a></h3>
                                    <div class="catBox__text">
                                        <p>Tham khảo cẩm nang chọn mua điều hòa từ chuyên gia Electrolux để lựa chọn sản phẩm phù hợp với kích thước, dung tích, thói quen của gia đình.</p>
                                    </div>
                                    <div class="ctaBox__btn">
                                        <a href="#" class="btn-link">TÌM HIỂU THÊM <i class="ex-arrow-circle-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-sanphamRelate" id="text-id-4" data-trigger-link>
                <div class="container">
                    <h2 class="titlebox__title wow fadeInUp">Sản phẩm liên quan</h2>
                    <div class="sanphanRalate-slideJs">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="productBox wow fadeInUp">
                                        <div class="productBox__inner">
                                            <div class="product-label">
                                                <span class="label-hot">Hot</span>
                                            </div>
                                            <div class="productBox__img">
                                                <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/homeSanphamFed-img-1.jpg')) ?>" alt="">
                                            </div>
                                            <div class="productBox__title">
                                                <h3 class="f-tensp"><a href="sanpham-detail.html">Điều hoà Electrolux <br>Inverter 9000BTU 1 HP </a></h3>
                                            </div>
                                            <ul class="productBox__info">
                                                <li>Tăng cường làm sạch và chăm sóc nhẹ nhàng.</li>
                                                <li>Giặt sạch nhanh, đầy tải trong chỉ 45 phút.</li>
                                                <li>Chăn bông cỡ lớn* được hấp sấy chuyên dụng chỉ trong 60 phút.</li>
                                            </ul>
                                            <div class="productBox__price">5.800.000 <span>₫</span></div>
                                            <div class="productBox__btn">
                                                <a href="sanpham-detail.html" class="btn btn--block btn--sm">Mua ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="productBox wow fadeInUp">
                                        <div class="productBox__inner">
                                            <div class="product-label">
                                                <span class="label-hot">Hot</span>
                                            </div>
                                            <div class="productBox__img">
                                                <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/homeSanphamFed-img-1.jpg')) ?>" alt="">
                                            </div>
                                            <div class="productBox__title">
                                                <h3 class="f-tensp"><a href="sanpham-detail.html">Điều hoà Electrolux <br>Inverter 9000BTU 1 HP </a></h3>
                                            </div>
                                            <ul class="productBox__info">
                                                <li>Tăng cường làm sạch và chăm sóc nhẹ nhàng.</li>
                                                <li>Giặt sạch nhanh, đầy tải trong chỉ 45 phút.</li>
                                                <li>Chăn bông cỡ lớn* được hấp sấy chuyên dụng chỉ trong 60 phút.</li>
                                            </ul>
                                            <div class="productBox__price">5.800.000 <span>₫</span></div>
                                            <div class="productBox__btn">
                                                <a href="sanpham-detail.html" class="btn btn--block btn--sm">Mua ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="productBox wow fadeInUp">
                                        <div class="productBox__inner">
                                            <div class="product-label">
                                                <span class="label-hot">Hot</span>
                                            </div>
                                            <div class="productBox__img">
                                                <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/homeSanphamFed-img-1.jpg')) ?>" alt="">
                                            </div>
                                            <div class="productBox__title">
                                                <h3 class="f-tensp"><a href="sanpham-detail.html">Điều hoà Electrolux <br>Inverter 9000BTU 1 HP </a></h3>
                                            </div>
                                            <ul class="productBox__info">
                                                <li>Tăng cường làm sạch và chăm sóc nhẹ nhàng.</li>
                                                <li>Giặt sạch nhanh, đầy tải trong chỉ 45 phút.</li>
                                                <li>Chăn bông cỡ lớn* được hấp sấy chuyên dụng chỉ trong 60 phút.</li>
                                            </ul>
                                            <div class="productBox__price">5.800.000 <span>₫</span></div>
                                            <div class="productBox__btn">
                                                <a href="sanpham-detail.html" class="btn btn--block btn--sm">Mua ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="productBox wow fadeInUp">
                                        <div class="productBox__inner">
                                            <div class="product-label">
                                                <span class="label-hot">Hot</span>
                                            </div>
                                            <div class="productBox__img">
                                                <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/homeSanphamFed-img-1.jpg')) ?>" alt="">
                                            </div>
                                            <div class="productBox__title">
                                                <h3 class="f-tensp"><a href="sanpham-detail.html">Điều hoà Electrolux <br>Inverter 9000BTU 1 HP </a></h3>
                                            </div>
                                            <ul class="productBox__info">
                                                <li>Tăng cường làm sạch và chăm sóc nhẹ nhàng.</li>
                                                <li>Giặt sạch nhanh, đầy tải trong chỉ 45 phút.</li>
                                                <li>Chăn bông cỡ lớn* được hấp sấy chuyên dụng chỉ trong 60 phút.</li>
                                            </ul>
                                            <div class="productBox__price">5.800.000 <span>₫</span></div>
                                            <div class="productBox__btn">
                                                <a href="sanpham-detail.html" class="btn btn--block btn--sm">Mua ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();