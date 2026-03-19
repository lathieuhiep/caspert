<?php
get_header();

$caspert_check_elementor = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );
$caspert_class_elementor = '';
if ( $caspert_check_elementor ) :
	$caspert_class_elementor = ' site-container-elementor';
endif;
?>
    <main class="site-container<?php echo esc_attr( $caspert_class_elementor ); ?>">
		<?php
		if ( $caspert_check_elementor ) :
			get_template_part( 'template-parts/page/content', 'page-elementor' );
		else:
			get_template_part( 'template-parts/page/content', 'page' );
		endif;
		?>
    </main>
<?php
get_footer();