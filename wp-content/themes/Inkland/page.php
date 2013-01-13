<?php get_header();
$prefix = 'tk_';
$sidebar_position = get_post_meta($post->ID, $prefix.'sidebar_position', true);
?>

    <!-- CONTENT -->
    <div class="content left">
        <div class="bg-content-one left">

            <!--SIDBAR-->
            <?php tk_get_left_sidebar('Left', 'Page Template')?>

            <div class="content-right right">

                <div class="title-page-content-right left"><?php the_title()?></div><!--title-page-content-right-->

                <div class="portfolio-content left">

                        <div class="shortcodes left">
                        <?php
                        /* Run the loop to output the page.
                                                 * If you want to overload this in a child theme then include a file
                                                 * called loop-page.php and that will be used instead.
                        */
                        //get_template_part( 'loop', 'page' );
                        wp_reset_query();
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                                the_content();
                            endwhile;
                        else:
                        endif;
                        wp_reset_query();
                        ?>
                    </div>
                </div><!--/content-one-->


        </div><!--/bg-content-one-->
    </div><!--/content-->
    </div><!--/content-->

<?php get_footer(); ?>