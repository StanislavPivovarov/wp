<?php
/*
Template Name: propertys
*/
get_header(); ?>

    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">

            <?php query_posts( array( 'post_type' => 'propertys', 'showposts' => 10 ) );
            if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'properties', get_post_format()); ?>
            <?php endwhile; endif; wp_reset_query(); ?>


        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>