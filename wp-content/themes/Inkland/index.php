<?php get_header();
$prefix = 'tk_';
$enable_slider = get_theme_option('Inkland_home_enable_slider');
$slider_cat = get_theme_option('Inkland_home_slider_category');
?>

    <!-- CONTENT -->
    <div class="content left">
        <div class="bg-content-one left">

            <!--SIDBAR-->
            <?php tk_get_left_sidebar('Left', 'Sidebar Default/Home')?>

            <div class="content-right right" style="margin: 0px 45px 80px 0">


            <?php if($enable_slider == 'yes') {?>
                <div class="slider-home right">
                    <div class="border-slider left"></div><!--/border-slider-->

                    <div id="slider-nivo" class="nivoSlider">

                        <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
                        $args=array('cat' => $slider_cat,'post_status' => 'publish', 'ignore_sticky_posts'=> 1,  'posts_per_page' => 10);

                        //The Query
                        query_posts($args);

                        //The Loop
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                        ?>
                            <?php
                            $slider_speed = get_theme_option('Inkland_home_animation_time');
                            $slider_delay = get_theme_option('Inkland_home_slider_delay');
                            if(empty ($slider_speed)){$slider_speed = 5000;}
                            if(empty ($slider_delay)){$slider_delay = 500;}
                            $img_attr = array(
                                'title'=> get_the_title(),
                                'link'=> get_permalink()
                            );

                            the_post_thumbnail('slider', $img_attr ); ?>
                        <?php  endwhile;?>
                        <?php else: ?>
                        <?php endif; ?>
                    </div>


                    <div class="border-slider left"></div><!--/border-slider-->
                </div><!--/slider-home-->
            <?php }?>

                    <script type="text/javascript">

                                // NIVO SLIDER
                            jQuery('#slider-nivo').nivoSlider({
                                effect:'random', //Specify sets like: 'fold,fade,sliceDown'
                                slices:15,
                                animSpeed:<?php echo $slider_speed?>, //Slide transition speed
                                pauseTime:<?php echo $slider_delay?>,
                                startSlide:0, //Set starting Slide (0 index)
                                directionNav:true, //Next & Prev
                                directionNavHide:false, //Only show on hover
                                controlNav:false, //1,2,3...
                                controlNavThumbs:false, //Use thumbnails for Control Nav
                                controlNavThumbsFromRel:false, //Use image rel for thumbs
                                controlNavThumbsSearch: '.jpg', //Replace this with...
                                controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
                                keyboardNav:true, //Use left & right arrows
                                pauseOnHover:true, //Stop animation while hovering
                                manualAdvance:false, //Force manual transitions
                                captionOpacity:0.8, //Universal caption opacity
                                beforeChange: function(){},
                                afterChange: function(){},
                                slideshowEnd: function(){}, //Triggers after all slides have been shown
                                lastSlide: function(){}, //Triggers when last slide is shown
                                afterLoad: function(){} //Triggers when slider has loaded
                            });

                            jQuery('.nivo-directionNav a').each(function(){
                                    jQuery(this).html('<span></span>');
                            });

                    </script>


        <?php $show_home_content= get_theme_option('Inkland_home_use_home_content');
                if($show_home_content == 'yes') {
        ?>

                <div class="shortcodes left">
                        <?php
                        /* Run the loop to output the page.
                                                 * If you want to overload this in a child theme then include a file
                                                 * called loop-page.php and that will be used instead.
                        */
                        wp_reset_query();
                        query_posts( 'page_id=' . get_theme_option('Inkland_home_home_content') );
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                                the_content();
                            endwhile;
                        else:
                        endif;
                        wp_reset_query();
                        ?>
            </div><!--/wrapper-->

        <?php }?>




                
                <div class="border-line left"></div><!--/border-line-->

                    <?php
                    wp_reset_query();
                    $home_posts_per_page = get_theme_option('Inkland_home_home_post_per_page');
                    $paged2 = (get_query_var('paged')) ? get_query_var('paged') : 0;
                    $args2=array('cat' => '-'.$slider_cat,'post_status' => 'publish', 'ignore_sticky_posts'=> 1,  'posts_per_page' => $home_posts_per_page,  'paged' => $paged2,);

                    //The Query
                    $the_query = new WP_Query($args2);

                    //The Loop
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                    $video_link = get_post_meta($post->ID, 'tk_video_link', true);
                    $image_1 = get_post_meta($post->ID, 'tk_image_upload_1', true);
                    $image_2 = get_post_meta($post->ID, 'tk_image_upload_2', true);
                    $image_3 = get_post_meta($post->ID, 'tk_image_upload_3', true);
                    $image_4 = get_post_meta($post->ID, 'tk_image_upload_4', true);
                    ?>


                <div class="home-blog-single left">
                    <div class="home-blog-title left"><a href="<?php the_permalink()?>"><?php the_title() ?></a></div><!--/home-blog-title-->


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
                            <a href="<?php the_permalink()?>" class="pera " title="<?php the_title(); ?>" rel="single">
                                <?php the_post_thumbnail('blog'); ?>
                            </a>
                        </div><!--/bg-home-img-center-->
                        <div class="bg-home-img-down left"></div><!--/bg-home-img-down-->
                    </div><!--/home-blog-images-->
                    <?php } }?>

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

                    <div class="home-blog-text left"><?php the_excerpt()?></div><!--/home-blog-text-->

                    <div class="home-blog-reading left"><a href="<?php the_permalink()?>"><?php _e("Continue Reading", 'inkland')?></a></div><!--/home-blog-reading-->
                </div><!--/home-blog-single-->


                    <?php  endwhile;
                        wp_reset_query();
                    ?>

                <?php
                $home_pagination = get_theme_option('Inkland_home_home_pagination');
                if($home_pagination == 'yes') {
                ?>
                    <div class="pagination left">
                            <?php
                            global $the_query;
                            $big = 999999999; // need an unlikely integer

                            $pageing =  paginate_links( array(
                                    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                                    'format' => '?paged=%#%',
                                    'current' => max( 1, get_query_var('paged') ),
                                    'total' => $the_query->max_num_pages,
                                    ) );
                            $search_array = array('<span','</span>', '<a', '</a>');
                            $replace_array = array(
                                    '<div class="pagination-button left"><span',
                                    '</span></div>',
                                    '<div class="pagination-button left"><div class="pagination-left left"></div><a',
                                    '</a><div class="pagination-right left"></div></div>',
                            );
                            $pageing = str_replace($search_array, $replace_array, $pageing);
                            echo $pageing;$wp_query
                            ?>
                    </div>
                <?php }?>




            </div><!--/content-right-->






        </div><!--/bg-content-one-->
    </div><!--/content-->




            
<?php get_footer(); ?>