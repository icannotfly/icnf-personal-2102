<?php get_header(); ?>












<main class="flex-shrink-0 front-page">

    <?php
    $query_first_post = new WP_query(
        array(
            'posts_per_page' => '4'
        )
    );
    if( $query_first_post->have_posts() ): ?>

    <div class="swiper-container mb-4" style="min-height: 80vh;">
        <div class="swiper-wrapper">
            <?php while( $query_first_post->have_posts() ): $query_first_post->the_post(); ?>

            <div class="swiper-slide">

                <article class="card headline-card text-white">
                    <?php the_post_thumbnail(null, array('class' => 'card-img',)); ?>
                    <div class="card-img-overlay">
                        <div class="row m-0 justify-content-center card-text-container">
                            <div class="col-10 col-md-8 align-self-center text-center">
                                <h1 class="card-title"><?php the_title(); ?></h1>
                                <p class="card-text"><?php the_excerpt(); ?></p>
                                <a class="btn btn-outline-light" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read More</a>
                            </div>
                        </div>
                    </div>
                </article>

            </div>

            <?php endwhile; ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <!-- Swiper JS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            keyboard: {
                enabled: true,
            },
            preloadImages: true,
            grabCursor: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    <?php endif; ?>







    <!-- list posts again -->
    

    <div class="container">
        <div class="row">

            <?php
            $query_list_posts = new WP_query(
                array(
                    'posts_per_page' => '8',
                    'offset' => '0'
                )
            );
            if ( $query_list_posts->have_posts() ): while ( $query_list_posts->have_posts() ): $query_list_posts->the_post(); ?>
            
            <div class="<?php if( $query_list_posts->current_post < 2 ) { echo 'col-lg-6'; } else { echo 'col-lg-4'; } ?> col-md-6 mb-4">
                <div class="card standard-card shadow">
                    <?php the_post_thumbnail(null, array('class' => 'card-img',)); ?>
                    <div class="card-body">
                        <p class="card-text" style="margin-bottom: 0.5rem;"><small class="text-muted">
                        <?php
                            $categories = get_the_category();
                            $category_names = array();
                            foreach ($categories as $category)
                            {
                                $category_names[] = $category->cat_name;
                            }
                            echo implode(', ', $category_names);
                        ?>
                        </small></p>
                        <h2 class="card-title"><?php the_title(); ?></h2>
                        <p class="card-text"><?php the_excerpt(); ?> <a href="<?php the_permalink(); ?>" class="stretched-link">Read more</a></p>
                        <p class="card-text"><small class="text-muted">Posted <?php echo esc_html( human_time_diff( get_the_time('U'), current_time('timestamp') ) ) . ' ago'; ?></small></p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>



    <footer class="container post-list-footer">
        <div class="row">
            <div class="col-12 text-center mt-3">
                <nav>
                    <a href="<?php echo get_the_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn btn-light">View All Posts</a>
                </nav>
            </div>
        </div>
    </footer>

</main>



<?php get_footer(); ?>
