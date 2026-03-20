<?php
/* Better way to add multiple widgets areas */
function caspert_register_sidebar( string $name, string $id, string $description = '', string $class = '' ): void {
    register_sidebar( array(
        'name'          => $name,
        'id'            => $id,
        'description'   => $description,
        'before_widget' => '<div id="%1$s" class="widget %2$s' . ( $class ? ' ' . esc_attr( $class ) : '' ) . '">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title f-title">',
        'after_title'   => '</h4>',
    ) );
}

const PREFIX_SIDEBAR_FOOTER_COLUMN = 'sidebar-footer-column-';
const PREFIX_SIDEBAR_FOOTER_COPYRIGHT = 'footer-copyright';
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

    caspert_register_sidebar(
        esc_html__( 'Footer Copyright', 'caspert' ),
        PREFIX_SIDEBAR_FOOTER_COPYRIGHT,
        esc_html__('Dùng ở tất cả các trang', 'caspert' )
    );
}
add_action( 'widgets_init', 'caspert_multiple_widget_init' );