<?php get_header();
$prefix = 'tk_';
$sidebar_position = get_post_meta(get_option('id_blog_page'), $prefix.'sidebar_position', true);
$blog_title = get_option('title_blog_page');
$author = get_userdata( $post->post_author );
$video_link = get_post_meta($post->ID, 'tk_video_link', true);
$post_type = get_post_type();
$image_1 = get_post_meta($post->ID, 'tk_image_upload_1', true);
$image_2 = get_post_meta($post->ID, 'tk_image_upload_2', true);
$image_3 = get_post_meta($post->ID, 'tk_image_upload_3', true);
$image_4 = get_post_meta($post->ID, 'tk_image_upload_4', true);
?>


    <!-- CONTENT -->
    <div class="content left">
        <div class="bg-content-one left">

            <!--SIDBAR-->
            <?php tk_get_left_sidebar('Left', 'Blog')?>

            <div class="content-right right">

                <div class="title-page-content-right left">
                    <?php if($post_type == 'pt_portfolio'){ _e('Portfolio', 'inkland');}else{ echo $blog_title;}?>
                    <div class="link-blog-page right">
                        <?php previous_post_link('%link', 'Prev'); ?>
                        <?php next_post_link('%link', 'Next'); ?>
                    </div><!--link-blog-page-->
                </div><!--title-page-content-right-->

                <div class="portfolio-content left">


                    <div class="blog-single-page left">
                        <div class="home-blog-title left"><?php the_title() ?></div><!--/home-blog-title-->

                    <?php if($post_type !== 'pt_portfolio'){?>

                        <div class="home-blog-category left">
                            <div class="home-blog-comment left"><span><?php comments_number( '0', '1', '%' ); ?></span></div><!--/home-blog-comment-->
                            <div class="home-blog-posted left">
                                <ul>
                                    <li><?php _e("Posted: ", 'inkland')?></li>
                                    <li><?php echo get_the_date()?></li>
                                </ul>
                            </div><!--/home-blog-posted-->
                            <div class="home-blog-posted left">
                                <ul>
                                    <li><?php _e("Categories:", 'inkland')?></li>
                                        <?php echo get_the_category_list( ', ', $post->ID ); ?>
                                </ul>
                            </div><!--/home-blog-posted-->
                        </div><!--/home-blog-category-->

                    <?php }?>


                        <?php if($video_link){?>

                        <div class="home-blog-images left">
                            <div class="bg-home-img-top left"></div><!--/bg-home-img-top-->
                            <div class="bg-home-img-center left">
                                <div class="home-blog-video left"><?php tk_video_player($video_link)?></div><!--blog-one-video-->
                            </div><!--/bg-home-img-center-->
                            <div class="bg-home-img-down left"></div><!--/bg-home-img-down-->
                        </div><!--/home-blog-images-->
                        
                    <?php } elseif(has_post_thumbnail()){
                                if(!empty ($image_1) || !empty ($image_2) || !empty ($image_3) || !empty ($image_4)){?>

                        <div class="home-blog-images left">
                            <div class="bg-home-img-top left"></div><!--/bg-home-img-top-->
                            <div class="bg-home-img-center left">
                                <ul id="slider-<?php echo $post->ID?>">
                                    <li><?php the_post_thumbnail('blog'); ?></li>
                                    <?php if(!empty ($image_1)){?><li><img src="<?php resize_image($image_1);?>" alt="" /></li><?php }?>
                                    <?php if(!empty ($image_2)){?><li><img src="<?php resize_image($image_2);?>" alt="" /></li><?php }?>
                                    <?php if(!empty ($image_3)){?><li><img src="<?php resize_image($image_3);?>" alt="" /></li><?php }?>
                                    <?php if(!empty ($image_4)){?><li><img src="<?php resize_image($image_4);?>" alt="" /></li><?php }?>

                                </ul><!-- #slider -->
                            </div><!--/bg-home-img-center-->
                            <div class="bg-home-img-down left"></div><!--/bg-home-img-down-->
                        </div><!--/home-blog-images-->

                        <script type="text/javascript">

                            jQuery(document).ready(function(){

    // SLIDER
     jQuery('#slider-<?php echo $post->ID?>').anythingSlider({
                resizeContents      : false,
                expand              : false,
                startStopped        : false,
                buildArrows         : false,
                buildStartStop      : false,
                delay                  : 5000,
                animationTime     : 200,
                autoPlay            : true,
            onSlideComplete : function(slider){
            },
                onSlideBegin : function(slider) {
                }
                ,onSlideComplete : function(slider) {
                }
        });

                            })

                        </script>


                    <?php }else{ ?>
                    <div class="home-blog-images left">
                        <div class="bg-home-img-top left"></div><!--/bg-home-img-top-->
                        <div class="bg-home-img-center left">
                            <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() )?>" class="pirobox " title="<?php the_title(); ?>" rel="single">
                                <?php the_post_thumbnail('blog'); ?>
                            </a>
                        </div><!--/bg-home-img-center-->
                        <div class="bg-home-img-down left"></div><!--/bg-home-img-down-->
                    </div><!--/home-blog-images-->
                    <?php } }?>

                        <div class="blog-post-text left">
                               <div class="shortcodes left">
                                <?php
                                    wp_reset_query();
                                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                                            the_content();
                                        endwhile;
                                    else:
                                    endif;
                                    wp_reset_query();
                                    ?>
                                </div><!--/post-single-text-->
                        </div><!--/blog-post-text-->

                    <?php if($post_type !== 'pt_portfolio'){?>

                        <div class="share-buttons">

                            <div class="fb-like" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
                                                <a href="https://twitter.com/share" class="twitter-share-button" data-via="twitterapi" data-lang="en">Tweet</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


                            <g:plusone size="medium" annotation="inline" width="120"></g:plusone>

                            
                            <script type="text/javascript">
                              (function() {
                                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                                po.src = 'https://apis.google.com/js/plusone.js';
                                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                              })();
                            </script>
                            <a href="http://pinterest.com/pin/create/button/" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>

                        </div>

                    <?php }?>

                        
                    <!--BLOG-POST -->
                    <div class="comment-start left">

                        <?php if ( comments_open() ) : ?>

                            <?php comments_template(); // Get wp-comments.php template ?>

                        <?php endif; ?>

                    </div><!--/blog-page-content-->
                    </div><!--/blog-single-page-->

                </div><!--portfolio-content-->

            </div><!--/content-right-->


        </div><!--/bg-content-one-->
    </div><!--/content-->


<?php get_footer(); ?>