<?php get_header(); ?>

<main class="container my-4">
    <div class="row">
        <div class="col-md-8">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'card mb-4' ); ?>>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="card-img-top">
                                <?php the_post_thumbnail( 'medium', array( 'class' => 'img-fluid w-100' ) ); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="card-body">
                            <h2 class="card-title h4">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <div class="card-text text-secondary mb-3">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary btn-sm">Xem chi tiết</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="alert alert-info">Chưa có bài viết nào được đăng.</div>
            <?php endif; ?>
        </div>
        
        <div class="col-md-4">
            <!-- Sidebar tĩnh hoặc dùng dynamic_sidebar -->
            <div class="p-3 bg-light rounded border">
                <h5>Về trang web</h5>
                <p class="small text-muted"><?php bloginfo( 'description' ); ?></p>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>