<?php
add_action('cmb2_admin_init', 'caspert_post_meta_boxes');
function caspert_post_meta_boxes(): void {
    $cmb = new_cmb2_box(array(
        'id' => 'caspert_cmb_post',
        'title' => esc_html__('Tùy chọn metabox', 'caspert'),
        'object_types' => array('post'),
        'context' => 'normal',
        'priority' => 'low',
        'show_names' => true,
    ));

    $cmb->add_field( array(
        'id'   => 'caspert_cmb_post_title',
        'name' => esc_html__( 'Tiêu đề', 'caspert' ),
        'type' => 'title',
        'desc' => esc_html__( 'Đây là mô tả tiêu đề', 'caspert' ),
    ) );
}