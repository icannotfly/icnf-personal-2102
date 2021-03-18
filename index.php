<?php get_header(); ?>



<main class="flex-shrink-0 index">

    <header class="container-fluid p-0 category-header">
        <div class="row m-0 justify-content-center">

            <div class="col-xl-6 col-lg-7 col-9 align-self-center">
                <h1><?php if( is_home() ) { echo 'All Posts'; } else { echo single_term_title(); } ?></h1>
                        
                <?php if( the_archive_description() ): ?>
                <p class="small"><?php the_archive_description(); ?></p>
                <?php endif; ?>

            </div>
        </div>
            
    </header>



    <?php if( have_posts() ): ?>
    <div class="container post-list">
        <div class="row">

        <?php while( have_posts() ) : the_post(); ?>

            <div class="col-lg-4 col-md-6 mb-4">
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

        </div>
    </div>



    <!-- pagination -->
    <footer class="container post-list-footer">
        <div class="row">
            <div class="col-12">
                <?php echo bootstrap_pagination(); ?>
            </div>
            <!-- "all posts" link was here -->
        </div>
    </footer>











    <?php else: ?>

    <!-- if no posts to load -->
    <div class="container post-list">
        <div class="row justify-content-center">
            <div class="col-auto alert alert-warning" role="alert">
                <p class="no-posts-warning m-0">
                    <i class="bi bi-exclamation-triangle text-warning align-middle"></i> <span class="align-middle">Nothing found.</span>
                </p>
            </div>
        </div>
    </div>

    <?php endif; ?>






</main>



<?php get_footer(); ?>
