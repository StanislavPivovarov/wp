<?php
/*
Template Name: propertys
*/
get_header(); ?>

    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
            <?php
            $args = array(
                'post_type' => 'properties',

                'meta_query' => array(
                    'relation' => 'OR',
                    array(
                        'key' => 'price',
                    ),
                ),

                'tax_query' => array(
                                    array(
                                            'taxonomy' => 'prop_categories',
                                            'field' => 'slug',
                                            'terms' => 'buy'
                                    )
                                )

            );
            $posts = get_posts( $args );


            foreach( $posts as $pst ){
                var_dump($pst);
                echo $pst->post_content .'<br>';
            }
            ?>
        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>