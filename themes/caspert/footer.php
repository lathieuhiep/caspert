    <?php
    if ( !is_404() ) :
        get_template_part('template-parts/components/inc', 'contact-us');
    endif;
    ?>

    </main><!-- close .page-content -->

    <?php
    if ( !is_404() ) :
        get_template_part('template-parts/footer/inc', 'layout');
     endif;
     ?>
</div><!-- .page-wrapper -->

<?php
if ( !is_404() ) :
    get_template_part('template-parts/popup/inc', 'select-area');
    get_template_part('template-parts/popup/inc', 'select-policy');
endif;

wp_footer();
?>

</body>
</html>
