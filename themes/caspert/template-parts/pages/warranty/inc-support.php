<?php
$contactUrl = caspert_get_page_url('lien-he');
$warrantyCenterUrl = caspert_get_page_url('trung-tam-bao-hanh');
?>

<section class="section sec-hotroBox">
    <div class="container">
        <h2 class="titlebox__title wow fadeInUp">Chúng tôi sẵn sàng <br class="d-md-none">hỗ trợ bạn</h2>
    </div>
    <div class="item-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="iconBox wow fadeInUp">
                        <div class="iconBox__icon"><img src="<?php echo esc_url(get_theme_file_uri('/assets/img/iconBox-1.png')) ?>" alt=""></div>
                        <h4 class="iconBox__title">Liên hệ chúng tôi</h4>
                        <p class="iconBox__text">Bộ phận chăm sóc khách hàng của chúng tôi sẵn sàng hỗ trợ qua điện thoại, tư vấn trực tuyến và gửi thư</p>
                        <div class="iconBox__btn">
                            <a href="<?php echo esc_url( $contactUrl ); ?>" class="btn-link">LIÊN HỆ VỚI CHÚNG TÔI <span><i class="ex-arrow-circle-left"></i></span></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="iconBox wow fadeInUp">
                        <div class="iconBox__icon"><img src="<?php echo esc_url(get_theme_file_uri('/assets/img/iconBox-2.png')) ?>" alt=""></div>
                        <h4 class="iconBox__title">Trung tâm bảo hành Electrolux</h4>
                        <p class="iconBox__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </p>
                        <div class="iconBox__btn">
                            <a href="muaodau.html" class="btn-link">XEM NGAY <span><i class="ex-arrow-circle-left"></i></span></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="iconBox wow fadeInUp">
                        <div class="iconBox__icon"><img src="<?php echo esc_url(get_theme_file_uri('/assets/img/iconBox-4.png')) ?>" alt=""></div>
                        <h4 class="iconBox__title">Tra cứu bảo hành</h4>
                        <p class="iconBox__text">Chỉ với vài bước đơn giản, tra cứu chính xác thời hạn bảo hành và theo dõi tiến độ xử lý sản phẩm của bạn.</p>
                        <div class="iconBox__btn">
                            <a href="<?php echo esc_url( $warrantyCenterUrl ) ?>" class="btn-link">TRA CỨU NGAY <span><i class="ex-arrow-circle-left"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>