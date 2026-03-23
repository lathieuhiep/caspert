<?php
if (function_exists('pll_the_languages')) :

    $languages = pll_the_languages(array(
        'raw' => true,
        'hide_if_empty' => false,
        'show_flags' => 1,
        'show_names' => 1
    ));

    if ( !empty($languages) ) :
        $current_lang = null;

        foreach ($languages as $lang) {
            if ($lang['current_lang']) {
                $current_lang = $lang;
                break;
            }
        }
        ?>
        <div class="header__lang" data-dropdown>
            <?php
            if ($current_lang) :
                $custom_flag = $custom_flags[$current_lang['slug']] ?? '';
                ?>
                <div class="f-btn" data-dropdownTrigger>
                    <?php echo $current_lang['flag']; ?>
                    <span><?php echo esc_html( $current_lang['name'] ); ?></span>
                </div>
            <?php endif; ?>

            <div class="f-content" data-dropdownContent>
                <?php foreach ($languages as $lang) : ?>
                    <a href="<?php echo esc_url($lang['url']); ?>"
                       class="<?php echo $lang['current_lang'] ? 'current' : ''; ?>">
                        <?php echo esc_html(strtoupper($lang['name'])); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php
    endif;
endif;
