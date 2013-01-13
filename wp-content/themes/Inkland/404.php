<?php

get_header(); ?>

    <!-- CONTENT -->
    <div class="content left">
        <div class="bg-content-one left">

            <!--SIDBAR-->
            <?php tk_get_left_sidebar('Left', 'Blog')?>

            <div class="content-right right">

                <div class="title-page-content-right left"><?php _e("404 error", 'inkland')?></div><!--title-page-content-right-->

                <div class="page-404-text left"><?php _e("Looks like the page you were looking for does not exist. Sorry about that.", 'inkland')?></div><!--page-404-text-->
                <div class="page-404-link left"><span><?php _e("Check the web address for typos, or go to", 'inkland')?></span><a href="<?php echo home_url()?>"><?php _e("Home page", 'inkland')?></a></div><!--page-404-link-->

            </div><!--/content-right-->

        </div><!--/bg-content-one-->
    </div><!--/content-->

<?php get_footer(); ?>