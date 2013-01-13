<?php
//loading wordpress functions
require( '../../../wp-load.php' );

                echo "<ul class='pagingx'>";
                $id = $_GET['id'];
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
                $args=array('cat'=>$id, 'post_type' => 'pt_portfolio',  'paged' => $paged, 'post_status' => 'publish', 'ignore_sticky_posts'=> 1,'posts_per_page'=>1000);

                //The Query
                $the_query = new WP_Query( $args );

                $item_counter = 0;
                $disable_title = get_theme_option('Inkland_general_portfolio_images');

                //The Loop
                if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
                ?>

                <?php if ($item_counter % 2 == 0){echo '<div class="portfolio-row left">';}?>

                        <div class="portfolio-one left" <?php if ($item_counter % 2 !== 0 ){echo 'style="margin-right:0"';}?>>
                            <div class="bg-portfolio-top left"></div><!--bg-portfolio-top-->
                                <div class="bg-portfolio-center left">
                                    <div class="portfolio-images left"><a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() )?>" class="pirobox" title="<?php the_title(); ?>"><?php the_post_thumbnail('portfolio'); ?></a></div><!--portfolio-images-->
                                    <div class="hover-portfolio-images left"><div class="hover-portfolio-cross left"></div></div><!--hover-portfolio-images-->
                                </div><!--bg-portfolio-center-->
                            <div class="bg-portfolio-down left"></div><!--bg-portfolio-down-->
                            <?php if($disable_title !== 'yes') {?>
                                <div class="portfolio-one-text left"><a href="<?php the_permalink()?>"><?php the_title() ?></a></div><!--portfolio-one-text-->
                            <?php }?>
                        </div><!--portfolio-one-->

                        <?php
                        $item_counter++;
                         if ($item_counter % 2 ==0){echo '</div>';}
                    endwhile;
                    // Reset Post Data
                    wp_reset_postdata();
                    echo "</ul>";
                    ?>

                <?php else: ?>
                <?php endif;
                $numpages = get_theme_option('Inkland_general_portfolio_per_page');
                $numpages = $numpages/2;
                ?>

        <?php
            $body_font = get_option('colors_body_font_color');
            $links_color = get_option('colors_links_color');
            $links_hover = get_option('colors_links_hover');
        ?>

                <script type="text/javascript">
                    //Ajax Pagination
                    jQuery("ul.pagingx").quickPager( {
                            pageSize: <?php echo $numpages?>
                    });

                    jQuery(".simplePagerNav").attr('style', 'margin:0 0 33px; clear:both');
                </script>


<?php
    $color_style = get_option('Inkland_'.'colors__stylechanger');
    switch ($color_style) {
        case 'blue-1':
            $animate_color = '#2a6ba2';
            $nav_color = '#164266';
            $sub_color = '#2E76B1';
            break;
        case 'blue-2':
            $animate_color = '#2f4359';
            $nav_color = '#18232f';
            $sub_color = '#455a71';
            break;
        case 'brown':
            $animate_color = '#766e5d';
            $nav_color = '#4f4a3f';
            $sub_color = '#777267';
            break;
        case 'gray':
            $animate_color = '#707070';
            $nav_color = '#3c3c3c';
            $sub_color = '#7b7b7b';
            break;
        case 'green':
            $animate_color = '#4f994f';
            $nav_color = '#284b28';
            $sub_color = '#584b28';
            break;
        case 'green-2':
            $animate_color = '#4f9891';
            $nav_color = '#346863';
            $sub_color = '#669f9a';
            break;
        case 'green-3':
            $animate_color = '#309895';
            $nav_color = '#1a5d5a';
            $sub_color = '#438e8b';
            break;
        case 'orange':
            $animate_color = '#eb6f2b';
            $nav_color = '#763913';
            $sub_color = '#ab663c';
            break;
        case 'purple':
            $animate_color = '#2f4359';
            $nav_color = '#26222f';
            $sub_color = '#54505f';
            break;
        case 'red':
            $animate_color = '#c54343';
            $nav_color = '#671c1c';
            $sub_color = '#903838';
            break;
    }
?>



                      <script type="text/javascript">
                        jQuery(document).ready(function(){



                                jQuery(".portfolio-one-text a").hover(function() {
                                        jQuery(this).animate({color: "<?php echo $animate_color?>"},{duration:200,queue:false}, 'easeOutSine');
                                },function() {
                                        jQuery(this).animate({color: "#121212"},{duration:300,queue:false}, 'easeOutSine');
                                });

                                jQuery('.piro_overlay,.pirobox_content').remove();
                                jQuery().piroBox({
                                    my_speed: 300,
                                    bg_alpha:0.5,
                                    radius: 4,
                                    scrollImage : false,
                                    slideShow : 'true',
                                    slideSpeed : 3,
                                    pirobox_next : 'piro_next',
                                    pirobox_prev : 'piro_prev',
                                    close_all : '.piro_close'
                                });

                               jQuery('.bg-portfolio-center').hover(function(){
                                   jQuery('img',this).stop().animate({opacity:0.4},500);
                                   jQuery('.hover-portfolio-images',this).css('display','block');
                                },function(){
                                   jQuery('img',this).stop().animate({opacity:1},300);
                                   jQuery('.hover-portfolio-images',this).css('display','none');
                                });

                        })
                        </script>
