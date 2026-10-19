<?php
/**
 * Trang thông thường (các trang khác ngoài 4 trang chính)
 */
get_header();
while ( have_posts() ) :
    the_post();
    get_template_part( 'template-parts/page-hero', null, array( 'title' => get_the_title() ) );
    ?>
    <main id="main" class="tnt-section">
        <div class="container tnt-prose">
            <?php the_content(); ?>
        </div>
    </main>
    <?php
endwhile;
get_footer();
