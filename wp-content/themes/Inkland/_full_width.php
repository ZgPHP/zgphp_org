<?php
/*

Template Name: Full Width

*/
get_header();
$prefix = 'tk_';
$sidebar_position = get_post_meta($post->ID, $prefix.'sidebar_position', true);
?>

            <!-- CONTENT -->
            <div class="content left">
                <div class="bg-content-top left"></div><!--bg-content-top-->

                <div class="bg-content-two left">

                    <div class="title-page left"><?php the_title()?></div><!--title-page-->

                    <div class="full-width-holder left">

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

                    </div>

                </div><!--/content-one-->

            </div><!--/content-->

<?php get_footer(); ?>