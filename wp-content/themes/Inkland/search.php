<?php get_header();
$prefix = 'tk_';
$sidebar_position = get_post_meta(get_option('id_blog_page'), $prefix.'sidebar_position', true);
if($post){
    $cats = get_the_category($post->ID);
    $curent_url = get_page_url();
        foreach($cats as $one_cat){
            $key = strtolower($one_cat->name);
            $cat_name = strpos($curent_url, $key);
            if($cat_name !== false){
                $page_title = $one_cat->name;
            }
        }
}
?>

    <!-- CONTENT -->
    <div class="content left">
        <div class="bg-content-one left">

            <!--SIDBAR-->
            <?php tk_get_left_sidebar('Left', 'Archive/Search')?>

            <div class="content-right right">
                
		<?php if(have_posts()) :  while(have_posts()) : the_post();
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


		<?php endwhile; else : ?>

                    <h2 class="center"><?php _e("No posts found. Try a different search?", 'inkland')?></h2>

		<?php endif; ?>

            <div class="pagination left">
                <?php
                global $wp_query;

                $big = 999999999; // need an unlikely integer

                $pageing =  paginate_links( array(
                        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                        'format' => '?paged=%#%',
                        'current' => max( 1, get_query_var('paged') ),
                        'total' => $wp_query->max_num_pages
                ) );
                $search_array = array('<span','</span>', '<a', '</a>');
                $replace_array = array(
                    '<div class="pagination-button left"><span',
                    '</span></div>',
                    '<div class="pagination-button left"><div class="pagination-left left"></div><a',
                    '</a><div class="pagination-right left"></div></div>',
                    );
                $pageing = str_replace($search_array, $replace_array, $pageing);
                echo $pageing;
                ?>
            </div>

            </div><!--/content-right-->
        </div><!--/bg-content-one-->
    </div><!--/content-->

<?php get_footer(); ?>