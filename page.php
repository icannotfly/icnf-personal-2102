<?php get_header(); ?>



<main class="container-fluid p-0 page">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



    <header class="container-fluid p-0 category-header">
        <div class="row m-0 justify-content-center">

            <div class="col-xl-6 col-lg-7 col-9 align-self-center">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
            
    </header>
    




    <div class="row m-0 article-content">
        <div class="col-12 p-0">

            <?php the_content(); ?>

        </div>
    </div>





    <?php endwhile; ?>
    <?php else: ?>

    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>

    <?php endif; ?>

</main>



<?php get_footer(); ?>
