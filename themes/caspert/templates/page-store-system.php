<?php
/**
 * Template Name: Hệ thống của hàng
 * Template Post Type: page
 */

get_header();

get_template_part('template-parts/components/inc', 'breadcrumbs');
?>

    <section class="section sec-muaoDau">
        <div class="container">
            <div class="titlebox">
                <h2 class="titlebox__title">Hệ thống cửa hàng</h2>
            </div>
            <div class="daily-searhBox">
                <div class="row">
                    <div class="col-md-6 order-md-2">
                        <div class="daily-right">
                            <form class="daily-form">
                                <div class="select-custom">
                                    <select name="" data-placeholder="Chọn thành phố">
                                        <option value="" disabled selected hidden>Chọn thành phố</option>
                                        <option value="1">Hà Nội</option>
                                        <option value="2">Hồ Chí Minh</option>
                                        <option value="3">Hải Phòng</option>
                                        <option value="4">Hưng Yên</option>
                                    </select>
                                    <span class="icon-arrow"><i class="ex-caret-down"></i></span>
                                </div>
                                <div class="select-custom">
                                    <select name="" data-placeholder="Chọn thành phố">
                                        <option value="" disabled selected hidden>Chọn quận/huyện</option>
                                        <option value="1">Hà Nội</option>
                                        <option value="2">Hồ Chí Minh</option>
                                        <option value="3">Hải Phòng</option>
                                        <option value="4">Hưng Yên</option>
                                    </select>
                                    <span class="icon-arrow"><i class="ex-caret-down"></i></span>
                                </div>
                            </form>
                            <div class="daily-map">
                                <div class="f-map">
                                    <img src="assets/img/daily-searhBox-map.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 order-md-1">
                        <div class="daily-left">
                            <div class="daily-btn">
                                <a href="#" class="btn btn--block btn--sm">TẤT CẢ KÉT QUẢ</a>
                            </div>
                            <div class="daily-list">
                                <div class="fix-scroll" data-lenis-prevent-wheel data-lenis-prevent-touch>
                                    <ul>
                                        <li>
                                            <p class="f-title">ĐIỂM BẢO HÀNH 1</p>
                                            <p class="f-text">
                            <span>
                              <i class="ex-marker-2"></i>
                            </span>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et Lorem ipsum dolor sit amet,
                                            </p>
                                            <p class="f-text">
                            <span>
                              <i class="ex-phone-2"></i>
                            </span>
                                                <a href="tel:0987654321">0987654321</a>
                                            </p>
                                        </li>
                                        <li>
                                            <p class="f-title">ĐIỂM BẢO HÀNH 1</p>
                                            <p class="f-text">
                            <span>
                              <i class="ex-marker-2"></i>
                            </span>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et Lorem ipsum dolor sit amet,
                                            </p>
                                            <p class="f-text">
                            <span>
                              <i class="ex-phone-2"></i>
                            </span>
                                                <a href="tel:0987654321">0987654321</a>
                                            </p>
                                        </li>
                                        <li>
                                            <p class="f-title">ĐIỂM BẢO HÀNH 1</p>
                                            <p class="f-text">
                            <span>
                              <i class="ex-marker-2"></i>
                            </span>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et Lorem ipsum dolor sit amet,
                                            </p>
                                            <p class="f-text">
                            <span>
                              <i class="ex-phone-2"></i>
                            </span>
                                                <a href="tel:0987654321">0987654321</a>
                                            </p>
                                        </li>
                                        <li>
                                            <p class="f-title">ĐIỂM BẢO HÀNH 1</p>
                                            <p class="f-text">
                            <span>
                              <i class="ex-marker-2"></i>
                            </span>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et Lorem ipsum dolor sit amet,
                                            </p>
                                            <p class="f-text">
                            <span>
                              <i class="ex-phone-2"></i>
                            </span>
                                                <a href="tel:0987654321">0987654321</a>
                                            </p>
                                        </li>
                                        <li>
                                            <p class="f-title">ĐIỂM BẢO HÀNH 1</p>
                                            <p class="f-text">
                            <span>
                              <i class="ex-marker-2"></i>
                            </span>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et Lorem ipsum dolor sit amet,
                                            </p>
                                            <p class="f-text">
                            <span>
                              <i class="ex-phone-2"></i>
                            </span>
                                                <a href="tel:0987654321">0987654321</a>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();