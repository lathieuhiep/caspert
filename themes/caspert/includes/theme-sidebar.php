<?php
/* Better way to add multiple widgets areas */
function caspert_register_sidebar( $name, $id, $description = '' ): void {
	register_sidebar( array(
		'name'          => $name,
		'id'            => $id,
		'description'   => $description,
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title h4">',
		'after_title'   => '</h2>',
	) );
}

const PREFIX_SIDEBAR_FOOTER_COLUMN = 'sidebar-footer-column-';
function caspert_multiple_widget_init(): void {
    // sidebar main
	caspert_register_sidebar(
        esc_html__( 'Sidebar chính', 'caspert' ),
        'sidebar-main',
        esc_html__('Dùng ở các trang bài viết', 'caspert' )
    );

    // sidebar woo
    if ( class_exists( 'Woocommerce' ) ) :
        caspert_register_sidebar(
            esc_html__( 'Sidebar shop', 'caspert' ),
            'sidebar-wc',
            esc_html__( 'Dùng ở trang danh mục sản phẩm.', 'caspert' )
        );

        caspert_register_sidebar(
            esc_html__( 'Sidebar sản phẩm', 'caspert' ),
            'sidebar-wc-product',
            esc_html__( 'Dùng cho trang chi tiết sản phẩm', 'caspert' )
        );
    endif;

	// sidebar footer
	$opt_number_columns = caspert_get_footer_sidebar_columns_count();

	for ( $i = 1; $i <= $opt_number_columns; $i ++ ) {
		caspert_register_sidebar(
            sprintf( esc_html__( 'Sidebar chân trang cột %d', 'caspert' ), $i ),
            PREFIX_SIDEBAR_FOOTER_COLUMN . $i,
			esc_html__( 'Dùng ở chân trang', 'caspert' )
        );
	}
}
add_action( 'widgets_init', 'caspert_multiple_widget_init' );