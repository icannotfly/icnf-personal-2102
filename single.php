<?php get_header(); ?>



<main class="container-fluid single">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



    <header class="row">
        <figure class="col-12 p-0">
            <div class="card text-white">
                <?php the_post_thumbnail(null, array('class' => 'card-img story-header-image',)); ?>
                <div class="card-img-overlay">
                    <div class="row m-0 justify-content-start">
                        <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 align-self-end text-left">
                            <h1 class="card-title"><?php the_title(); ?></h1>
                            <p class="card-text"><?php echo get_the_excerpt(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php if( get_the_post_thumbnail_caption() ) : ?>
            <figcaption>
                <p><?php echo get_the_post_thumbnail_caption(); ?></p>
            </figcaption>
            <?php endif ?>
        </figure>
    </header>





    <div class="row article-content">
        <div class="col-12 p-0">
            
            <div class="d-flex justify-content-between post-info">
                <div>
                    <p class="mb-0"><time datetime="<?php the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time></p>
                </div>
                <div>
                    <p class="mb-0">
                    <?php
                        $categories = get_the_category();
                        $category_names = array();
                        foreach ($categories as $category)
                        {
                            $category_names[] = '<a class="btn btn-sm btn-outline-secondary" href="' . esc_url( get_category_link($category->term_id) ) . '">' . $category->cat_name . '</a>';
                        }
                        echo implode(' ', $category_names);
                    ?>
                    </p>
                </div>
            </div>

            <?php the_content(); ?>

        </div>
    </div>





    <footer>
        <!-- prev/next -->
        <div class="prev-next-posts row">
            <div class="col-md-6 position-relative">
                <?php if(get_previous_post()): ?>
                <div class="container-fluid p-0 h-100">
                    <div class="row m-0 p-0 h-100 align-items-center">
                        <div class="col-auto p-0">
                            <i class="bi bi-chevron-compact-left"></i>
                        </div>
                        <div class="col p-0 text-left">
                            <span class="title small">Previous</span>
                            <br />
                            <span class="title"><?php previous_post_link('%link'); ?></span>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 position-relative">
                <?php if(get_next_post()): ?>
                <div class="container-fluid p-0 h-100">
                    <div class="row m-0 p-0 h-100 align-items-center">
                        <div class="col p-0">
                            <span class="title small">Next</span>
                            <br />
                            <span class="title align-middle"><?php next_post_link('%link'); ?></span>
                        </div>
                        <div class="col-auto p-0">
                            <i class="bi bi-chevron-compact-right align-middle"></i>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </footer>





    <?php endwhile; ?>
    <?php else: ?>

    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>

    <?php endif; ?>

</main>



<?php get_footer(); ?>
