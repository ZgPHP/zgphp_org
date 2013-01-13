<?php wp_footer();
$page_template = get_page_template();
$check_full_width = strpos($page_template, '_full_width.php');
?>

        <!-- FOOTER -->
    <div class="footer left">

        <div class="bg-footer-one left" <?php if(!empty ($check_full_width)){echo 'style="background: url('.get_template_directory_uri().'/style/img/bg-content.png) repeat-y -4px top;"';}?>>

            <div class="footer-left left">


            <!--SOCIAL ICONS-->
          <?php
            $enable_rss = get_theme_option('Inkland_social_enable_rss');
            $twitter_acc = get_theme_option('Inkland_social_twitter');
            $facebook_acc = get_theme_option('Inkland_social_facebook');
            $rss_acc = get_theme_option('Inkland_social_rss_url');
            $google_acc = get_theme_option('Inkland_social_google_plus');
            $pinterest_acc = get_theme_option('Inkland_social_pinterest');
            if(empty ($enable_rss)){$enable_rss = array();}
            if( $enable_rss == true || @$enable_rss[0] == '' || $twitter_acc == '' || $facebook_acc == '' || $facebook_acc == '' || $rss_acc == '' || $google_acc == '' ){
            ?>

                <ul>
                    <li><?php _e('Follow us on :', 'inkland') ?></li>
                    <?php if(!empty($twitter_acc)){ ?><li><a href="http://twitter.com/<?php echo $twitter_acc; ?>"><div class="footer-copy-icon1 left"></div></a></li><?php } ?>
                    <?php if(!empty($facebook_acc)){ ?><li><a href="http://facebook.com/<?php echo $facebook_acc; ?>"><div class="footer-copy-icon2 left"></div></a></li><?php } ?>
                    <?php if(!empty($google_acc)){ ?><li><a href="https://plus.google.com/<?php echo $google_acc; ?>"><div class="footer-copy-icon3 left"></div></a></li><?php } ?>
                    <?php if ($enable_rss == false || $enable_rss[0] == ''){}else{ if(!empty($rss_acc )){ ?><li><a href="<?php echo $rss_acc; ?>"><div class="footer-copy-icon4 left"></div></a></li><?php } else { ?><li><a href="<?php echo get_bloginfo('rss2_url'); ?>"><div class="footer-copy-icon4 left"></div></a></li><?php } }?>
                    <?php if(!empty($pinterest_acc)){ ?><li><a href="http://pinterest.com/<?php echo $pinterest_acc; ?>"><div class="footer-copy-icon5 left"></div></a></li><?php } ?>
                </ul>

            <?php }?>


            </div><!--/footer-left-->

                   <?php
                        $copyright = get_theme_option('Inkland_general_footer_copy');
                        if(empty($copyright)) {
                        $copyright = "Copyright Information Goes Here © 2012. All Rights Reserved.";
                     }?>

            <div class="footer-right right">
                <div class="footer-copy left"><?php echo $copyright?></div><!--/footer-copy-->

                <div class="scroll-top">
                    <p id="back-top">
                        <a href="#top"><span></span></a>
                    </p>
                </div><!--/scroll-top-->
            </div><!--/footer-right-->

        </div><!--/bg-footer-one-->
    </div><!--/footer-->



</div><!--/container-->

<?php
    $color_style = get_option('Inkland_'.'colors__stylechanger');
    if(empty ($color_style)){$color_style = 'blue-1';}
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

    // ANIMATE-COLOR
    jQuery(".nav ul li a").hover(function() {
            jQuery(this).animate({color: "<?php echo $nav_color?>"},{duration:200,queue:false}, 'easeOutSine');
    },function() {
            jQuery(this).animate({color: "#fbfbfb"},{duration:300,queue:false}, 'easeOutSine');
            jQuery('.sub-menu a').animate({color: "<?php echo $sub_color?>!important"},{duration:300,queue:false}, 'easeOutSine');
    });

    
    jQuery(".sub-menu a").hover(function() {
            jQuery(this).animate({color: "<?php echo $nav_color?>!important"},{duration:200,queue:false}, 'easeOutSine');
    },function() {
            jQuery(this).animate({color: "<?php echo $sub_color?>!important"},{duration:300,queue:false}, 'easeOutSine');
    });


    jQuery(".sidebar_widget_holder .bg-widget-center a").hover(function() {
            jQuery(this).animate({color: "<?php echo $animate_color?>"},{duration:200,queue:false}, 'easeOutSine');
    },function() {
            jQuery(this).animate({color: "#43474c"},{duration:300,queue:false}, 'easeOutSine');
    });


    jQuery(".sidebar_widget_holder ul li a").hover(function() {
            jQuery(this).animate({color: "<?php echo $animate_color?>"},{duration:200,queue:false}, 'easeOutSine');
    },function() {
            jQuery(this).animate({color: "#43474c"},{duration:300,queue:false}, 'easeOutSine');
    });


    jQuery(".textwidget a").hover(function() {
            jQuery(this).animate({color: "<?php echo $animate_color?>"},{duration:200,queue:false}, 'easeOutSine');
    },function() {
            jQuery(this).animate({color: "#F25832"},{duration:300,queue:false}, 'easeOutSine');
    });


    jQuery(".shortcodes a").hover(function() {
            jQuery(this).animate({color: "<?php echo $animate_color?>"},{duration:200,queue:false}, 'easeOutSine');
    },function() {
            jQuery(this).animate({color: "#F25832"},{duration:300,queue:false}, 'easeOutSine');
    });


    jQuery(".home-blog-title a").hover(function() {
            jQuery(this).animate({color: "<?php echo $animate_color?>"},{duration:200,queue:false}, 'easeOutSine');
    },function() {
            jQuery(this).animate({color: "#121212"},{duration:300,queue:false}, 'easeOutSine');
    });


    jQuery(".home-blog-posted ul a").hover(function() {
            jQuery(this).animate({color: "<?php echo $animate_color?>"},{duration:200,queue:false}, 'easeOutSine');
    },function() {
            jQuery(this).animate({color: "#121212"},{duration:300,queue:false}, 'easeOutSine');
    });


    jQuery(".home-blog-reading a").hover(function() {
            jQuery(this).animate({color: "<?php echo $animate_color?>"},{duration:200,queue:false}, 'easeOutSine');
    },function() {
            jQuery(this).animate({color: "#f25832"},{duration:300,queue:false}, 'easeOutSine');
    });


    jQuery(".pagination-center").hover(function() {
            jQuery(this).animate({color: "<?php echo $animate_color?>"},{duration:200,queue:false}, 'easeOutSine');
    },function() {
            jQuery(this).animate({color: "#222222"},{duration:300,queue:false}, 'easeOutSine');
    });


    jQuery(".page-404-link a").hover(function() {
            jQuery(this).animate({color: "<?php echo $animate_color?>"},{duration:200,queue:false}, 'easeOutSine');
    },function() {
            jQuery(this).animate({color: "#ff6825"},{duration:300,queue:false}, 'easeOutSine');
    });


    jQuery(".portfolio-filter ul li a").hover(function() {
            jQuery(this).animate({color: "<?php echo $animate_color?>"},{duration:200,queue:false}, 'easeOutSine');
    },function() {
            jQuery(this).animate({color: "#43474c"},{duration:300,queue:false}, 'easeOutSine');
    });


    jQuery(".link-blog-page a").hover(function() {
            jQuery(this).animate({color: "<?php echo $animate_color?>"},{duration:200,queue:false}, 'easeOutSine');
    },function() {
            jQuery(this).animate({color: "#121212"},{duration:300,queue:false}, 'easeOutSine');
    });


    jQuery(".comment-start-title a").hover(function() {
            jQuery(this).animate({color: "<?php echo $animate_color?>"},{duration:200,queue:false}, 'easeOutSine');
    },function() {
            jQuery(this).animate({color: "#f25832"},{duration:300,queue:false}, 'easeOutSine');
    });


    jQuery(".sidebar_widget_holder tbody a").hover(function() {
            jQuery(this).animate({color: "<?php echo $animate_color?>"},{duration:200,queue:false}, 'easeOutSine');
    },function() {
            jQuery(this).animate({color: "#f25832"},{duration:300,queue:false}, 'easeOutSine');
    });


    jQuery(".sidebar_widget_holder tfoot a").hover(function() {
            jQuery(this).animate({color: "<?php echo $animate_color?>"},{duration:200,queue:false}, 'easeOutSine');
    },function() {
            jQuery(this).animate({color: "#121212"},{duration:300,queue:false}, 'easeOutSine');
    });


    jQuery(".sidebar_widget_holder .app_recent_title a").hover(function() {
            jQuery(this).animate({color: "<?php echo $animate_color?>"},{duration:200,queue:false}, 'easeOutSine');
    },function() {
            jQuery(this).animate({color: "#43474c"},{duration:300,queue:false}, 'easeOutSine');
    });


    jQuery(".sidebar_widget_holder .app_recent_comments .app_recent_user a").hover(function() {
            jQuery(this).animate({color: "<?php echo $animate_color?>"},{duration:200,queue:false}, 'easeOutSine');
    },function() {
            jQuery(this).animate({color: "#43474c"},{duration:300,queue:false}, 'easeOutSine');
    });

});

</script>



</body>
</html>