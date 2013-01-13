<?php
/*

Template Name: Portfolio

*/
get_header();
?>
    <!-- CONTENT -->
    <div class="content left">
        <div class="bg-content-one left">

            <!--SIDBAR-->
            <?php tk_get_left_sidebar('Left', 'Portfolio Template')?>


            <div class="content-right right">

                <div class="title-page-content-right left"><?php the_title()?></div><!--title-page-content-right-->

                <div class="portfolio-content left">

                            <?php
                              global $wpdb;
                              $post_type_ids = $wpdb->get_col("SELECT ID FROM $wpdb->posts WHERE post_type = 'pt_portfolio' AND post_status = 'publish'");
                              if(!empty ($post_type_ids )){
                                $post_type_cats = wp_get_object_terms( $post_type_ids, 'category',array('fields' => 'ids') );
                                if($post_type_cats){
                                  $post_type_cats = array_unique($post_type_cats);
                                  $allcat = implode(',',$post_type_cats);
                                }
                              }
                              $include_category = null;
                            ?>

                        <div class="portfolio-filter left">

                            <ul>
                                <li style="color:#121212;font-size: 14px;font-family: 'Helvetica';font-weight: bold;"><?php _e('Filter :', 'inkland')?></li>
                                <li class="paragraphp cat_cell_active cat_cell" rev="<?php echo $allcat?>"><a href="#"><?php _e('All', 'inkland')?></a></li>
                                <?php
                                if(!empty ($post_type_ids )) {
                                    foreach ($post_type_cats as $category_list) {
                                        $cat = 	$category_list.",";
                                        $include_category = $include_category.$cat;
                                        $cat_name = get_cat_name($category_list)
                                                ?>

                                <li rev="<?php echo $category_list?>" class="cat_cell"><a href="#"><?php echo $cat_name?></a></li>

                                        <?php } } ?>
                            </ul>
                    </div><!--/bg-portfolio-categories-->
                </div><!--/page-portfolio-categories-->

            <div class="portfolio-content left">

                        <script type="text/javascript">
                            jQuery(document).ready(function(){
                                jQuery('.cat_cell_active').click();
                            });
                        </script>

                        <script type="text/javascript">
                            jQuery('.cat_cell').live('click',
                            function () {
                                var id = jQuery(this).attr('rev');
                                jQuery('.cat_cell').removeClass('cat_cell_active');
                                jQuery(this).addClass('cat_cell_active');
                                jQuery('.ajax_holder').animate({opacity:0},500,function(){
                                    jQuery('.portfolio-loader').show().animate({opacity:0},0).animate({opacity:1},500,function(){
                                        var randomnumber=Math.floor(Math.random()*100000000);
                                        var postAjaxURL = "<?php echo get_template_directory_uri() ?>/_portfolioajax.php?id="+id;

                                        jQuery('.ajax_holder').load(postAjaxURL, {rand: randomnumber},function(){
                                            jQuery('.portfolio-loader').animate({opacity:0},500).hide();

                                            jQuery('.ajax_holder').animate({
                                                opacity:1
                                            },500);
                                        });
                                    });
                                });
                                return false;
                            });
                        </script>

                                <div class="portfolio-loader"></div>

				<div class="ajax_holder"></div><!--AJAX Holder-->

                </div><!--portfolio-content-->

            </div><!--/content-right-->

        </div><!--/bg-content-one-->
    </div><!--/content-->

<?php get_footer(); ?>



