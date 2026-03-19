<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-area__title">
            <?php
            $caspert_comments_number = get_comments_number();

            if ( $caspert_comments_number == 1 ) :
                /* translators: %s: post title */
                printf(_x('Một câu trả lời cho &ldquo;%s&rdquo;', 'comments title', 'caspert'), get_the_title());
            else :
                printf(
                /* translators: 1: number of comments, 2: post title */
                    _nx(
                        '%1$s trả lời cho &ldquo;%2$s&rdquo;',
                        '%1$s trả lời cho &ldquo;%2$s&rdquo;',
                        $caspert_comments_number,
                        'comments title',
                        'caspert'
                    ),
                    number_format_i18n($caspert_comments_number),
                    get_the_title()
                );
            endif;
            ?>
        </h2>

        <?php caspert_comment_nav(); ?>

        <ul class="comments-area__list">
            <?php
            wp_list_comments(array(
                'type' => 'comment',
                'short_ping' => true,
                'avatar_size' => 60,
                'callback' => 'caspert_comments'
            ));
            ?>
        </ul>
    <?php
        caspert_comment_nav();
    endif;

    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
    ?>
        <p class="no-comments">
            <?php esc_html_e('Bình luận đã đóng.', 'caspert'); ?>
        </p>
    <?php
    endif;

    $caspert_commenter = wp_get_current_commenter();
    $caspert_req = get_option('require_name_email');
    $caspert_comments_args = ($caspert_req ? " aria-required='true'" : '');

    $caspert_comments_args = array(
        'title_reply' => '<span>' . esc_html__('Để lại bình luận', 'caspert') . '</span>',
        'fields' => apply_filters('comment_form_default_fields',
            array(
                'comment_notes_before' => '<div class="comment-fields-row order-1"><div class="row">',
                'author' => '<div class="col-12 col-sm-6 col-md-6"><div class="form-comment-item"><input id="author" placeholder="' . esc_html__('Họ và tên', 'caspert') . '" class="form-control" name="author" type="text" value="' . esc_attr($caspert_commenter['comment_author']) . '" size="30" ' . $caspert_comments_args . ' /></div></div>',
                'email' => '<div class="col-12 col-sm-6 col-md-6"><div class="form-comment-item"><input id="email" placeholder="' . esc_html__('Email', 'caspert') . '" class="form-control" name="email" type="text" value="' . esc_attr($caspert_commenter['comment_author_email']) . '" size="30" ' . $caspert_comments_args . ' /></div></div>',
                'comment_notes_after' => '</div></div>',
            )
        ),
        'comment_field' => '<div class="form-comment-item form-comment-field order-3"><textarea rows="7" id="comment" placeholder="' . esc_html__('Bình luận', 'caspert') . '" name="comment" class="form-control"></textarea></div>',
    );

    comment_form($caspert_comments_args);
    ?>
</div>
