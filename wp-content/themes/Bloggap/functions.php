<?php
global $wpdb;

require(  get_template_directory() . '/inc/theme-settings.php');                //Building theme administration

require(  get_template_directory() . '/inc/meta-boxes.php');                    //Building meta boxes

require(  get_template_directory() . '/inc/post-types.php');                    //Building post types

require(  get_template_directory() . '/inc/custom-taxonomies.php');             //Building post types

function tk_theme_name(){
    return 'Bloggap';
}
define( 'tk_theme_name', 'Bloggap' );
update_option('tk_theme_name', tk_theme_name);

$lang = get_template_directory() . '/languages/';                               //Make this theme available for translation.
load_theme_textdomain(tk_theme_name, $lang);

add_theme_support( 'automatic-feed-links' );                                    //Add default posts and comments RSS feed links to <head>

add_theme_support( 'post-thumbnails' );                                         //This enables Post Thumbnails support for this theme.
        add_image_size( 'blog', 942, 357 , true );
        add_image_size( 'gallery', 452, 357 , true );
        add_image_size( 'gallery-single', 940, 9999 , true );


register_nav_menu( 'primary', __( 'Primary Menu', tk_theme_name ) );                //This theme uses wp_nav_menu()

//THEME NAME
$tk_theme_name = tk_theme_name;

function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');



        /*************************************************************/
        /************LOAD STYLES************************************/
        /*************************************************************/

        function tk_add_stylesheet() {
                wp_register_style('main_style', get_bloginfo('stylesheet_url'));
                wp_enqueue_style('main_style');
                wp_register_style('superfish', get_template_directory_uri().'/script/menu/superfish.css');
                wp_enqueue_style('superfish');
                wp_register_style('pirobox', get_template_directory_uri().'/script//fancybox/source/jquery.fancybox.css');
                wp_enqueue_style('pirobox');
                wp_register_style('scrollbutton', get_template_directory_uri().'/script/scroll-button/scroll-button.css');
                wp_enqueue_style('scrollbutton');

                if(is_archive() || is_search() || is_single() || is_page_template('_blog.php') || is_category() || is_front_page()){
                    wp_register_style('flexslider', get_template_directory_uri().'/script/flexslider/flexslider.css');
                    wp_enqueue_style('flexslider');
                }
                if(is_archive() || is_search() || is_single() || is_page_template('_blog.php') || is_category() || is_front_page()){
                    wp_register_style('jplayer', get_template_directory_uri().'/script/jplayer/skin/blue.monday/jplayer.blue.monday.css');
                    wp_enqueue_style('jplayer');
                }
                
           
                
                $browser = $_SERVER['HTTP_USER_AGENT'];

                if (strpos($browser, 'iPhone')) {
                    wp_register_style('iphone', get_template_directory_uri().'/style/iphone.css');
                    wp_enqueue_style('iphone');
                }

                if (strpos($browser, 'MSIE 8.0')) {
                    wp_register_style('ie8', get_template_directory_uri().'/style/ie8.css');
                    wp_enqueue_style('ie8');
                }

                if (strpos($browser, 'MSIE 9.0')) {
                    wp_register_style('ie9', get_template_directory_uri().'/style/ie9.css');
                    wp_enqueue_style('ie9');
                }
/*
                if (strpos($browser, 'Chrome')) {
                    wp_register_style('chrome', get_template_directory_uri().'/style/chrome.css');
                    wp_enqueue_style('chrome');
                }

                if (strpos($browser, 'Firefox')) {
                    wp_register_style('firefox', get_template_directory_uri().'/style/firefox.css');
                    wp_enqueue_style('firefox');
                }

                if (strpos($browser, 'pera')) {
                    wp_register_style('opera', get_template_directory_uri().'/style/opera.css');
                    wp_enqueue_style('opera');
                }
 */
            }
        add_action( 'wp_enqueue_scripts', 'tk_add_stylesheet' );



        /*************************************************************/
        /************LOAD SCRIPTS***********************************/
        /*************************************************************/
        
        function tk_add_scripts() {
            wp_enqueue_script('jquery');
            wp_enqueue_script('my-commons', get_template_directory_uri().'/script/common.js' );
            wp_enqueue_script('fancybox', get_template_directory_uri().'/script/fancybox/source/jquery.fancybox.js' );
            wp_enqueue_script('easing', get_template_directory_uri().'/script/easing/jquery.easing.1.3.js' );
            wp_enqueue_script('flexslider', get_template_directory_uri().'/script/flexslider/jquery.flexslider.js' );
            wp_enqueue_script('isotope', get_template_directory_uri().'/script/isotope/jquery.isotope.min.js' );
            wp_enqueue_script('spiner', get_template_directory_uri().'/script/spiner/spin.min.js' );
            wp_enqueue_script('jplayer', get_template_directory_uri().'/script/jplayer/js/jquery.jplayer.min.js' );
            wp_enqueue_script('respond', get_template_directory_uri().'/script/respond/respond.src.js' );
            wp_enqueue_script('scrollbutton', get_template_directory_uri().'/script/scroll-button/scroll-button.js' );
            
            if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
        }  
        add_action('wp_enqueue_scripts', 'tk_add_scripts');          
                        
                        

        /*************************************************************/
        /************VIDEO PLAYER***********************************/
        /*************************************************************/

        function tk_video_player($url) {

		if(!empty($url)){
		$key_str1='youtube';
		$key_str2='vimeo';

		$pos_youtube = strpos($url, $key_str1);
		$pos_vimeo = strpos($url, $key_str2);
			if (!empty($pos_youtube)) {
			$url = str_replace('watch?v=','',$url);
			$url = explode('&',$url);
			$url = $url[0];
			$url = str_replace('http://www.youtube.com/','',$url);
		?>
			<div class="holder">
                            <iframe src="http://www.youtube.com/embed/<?php echo $url;?>?rel=0" frameborder="0" allowfullscreen></iframe>
			</div>
		<?php  }
		if (!empty($pos_vimeo)) {
			$url = explode('.com/',$url);
		?>

		<div class="holder">
                                    <iframe src="http://player.vimeo.com/video/<?php echo $url[1];?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
		</div>
		<?php  }
		if (empty($pos_vimeo) && empty($pos_youtube)) {

		  echo "Video only allowes vimeo and youtube!";
		}

   }}

   
   
        /*************************************************************/
        /************GET VIDEO IMAGE********************************/
        /*************************************************************/
   
   
        function get_video_image($url, $post_ID) {

		if(!empty($url)){
		$key_str1='youtube';
		$key_str2='vimeo';

		$pos_youtube = strpos($url, $key_str1);
		$pos_vimeo = strpos($url, $key_str2);
                                if (!empty($pos_youtube)) {
			$url = str_replace('watch?v=','',$url);
			$url = explode('&',$url);
			$url = $url[0];
			$url = str_replace('http://www.youtube.com/','',$url);
		?>
                                <img src="http://img.youtube.com/vi/<?php echo $url;?>/0.jpg" title="<?php echo get_the_title($post_ID)?>" alt="<?php echo get_the_title($post_ID)?>" />
		<?php  }
		if (!empty($pos_vimeo)) {
                                    $url = explode('.com/',$url);
                                    $data = @file_get_contents("http://vimeo.com/api/v2/video/".$url[1].".json");
                        if($data){
                                    $data = @file_get_contents("http://vimeo.com/api/v2/video/".$url[1].".json");
                        }else{
                            curl_setopt($ch=curl_init(), CURLOPT_URL, "http://vimeo.com/api/v2/video/".$url[1].".json");
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            $response = curl_exec($ch);
                            curl_close($ch);
                            $data = $response;
                        }
                                    $data = json_decode($data); 
                                 
                                    ?>
                                    <img src="<?php echo $data[0]->thumbnail_large;?>" title="<?php echo get_the_title($post_ID)?>" alt="<?php echo get_the_title($post_ID)?>" />
		  <?php }
		if (empty($pos_vimeo) && empty($pos_youtube)) {

		  echo "Video only allowes vimeo and youtube!";
		}
        }}
   
   
        /*************************************************************/
        /************REGISTER POST FORMATS************************/
        /************************************************************/

            $post_formats = array( 
                                    'aside', 
                                    'gallery', 
                                    'link', 
                                    'image', 
                                    'quote', 
                                    'audio',
                                    'video');

            add_theme_support( 'post-formats', $post_formats ); 

            add_post_type_support( 'post', 'post-formats' );

            add_post_type_support( 'gallery', 'post-formats' );

   
            
            
        /*************************************************************/
        /************ENQUEUE ADMINSCRIPT**************************/
        /************************************************************/

            function enqueue_admin_script($hook) {
                    if ($hook == 'post.php' || $hook == 'post-new.php') {
                            wp_register_script('adminscript', get_template_directory_uri() . '/script/adminscript/adminscript.js', 'jquery');
                            wp_enqueue_script('adminscript');
                    }
            }
            add_action('admin_enqueue_scripts','enqueue_admin_script',10,1);


   
            
        /*************************************************************/
        /************AUDIO PLAYER***********************************/
        /************************************************************/

        function tk_jplayer($postid) {
            $audio_link = get_post_meta($postid, 'tk_audio_link', true); 
              ?>
                      <script type="text/javascript">

                              jQuery(document).ready(function(){

                                  if(jQuery().jPlayer) {
                                      jQuery("#jquery_jplayer_<?php echo $postid; ?>").jPlayer({
                                          ready: function () {
                                              jQuery(this).jPlayer("setMedia", {

                                                  mp3: "<?php echo $audio_link; ?>",
                                                  end: ""
                                              });
                                          },
                                          swfPath: "<?php echo get_template_directory_uri(); ?>/script/player",
                                          cssSelectorAncestor: "#jp_interface_<?php echo $postid; ?>",
                                          supplied: "mp3, all",
                                          swfPath: "<?php echo get_template_directory_uri()?>/script/jplayer/js"
                                      });

                                  }
                              });
                      </script>
      <?php
      }

      
        /*************************************************************/
        /************GET CUSTOM THUMB SIZE***********************/
        /************************************************************/

            /*
             * $height -> height of new image
             * $width -> width of new image
             * $src -> url of image you want to get thumb from
             */
            function tk_get_thumb($width, $height, $src)
            {
                $size = getimagesize($src);
                if($width >= $size[0] || $height >= $size[1]){
                      echo $src;
                }else {
                if(strpos($src, '.jpg')){
                    $new_src = explode('.jpg', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.jpg';
                        echo $new_src;
                }elseif(strpos($src, '.jpeg')){
                    $new_src = explode('.jpeg', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.jpeg';
                    echo $new_src;
                }elseif(strpos($src, '.gif')){
                    $new_src = explode('.gif', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.gif';
                    echo $new_src;
                }elseif(strpos($src, '.png')){
                    $new_src = explode('.png', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.png';
                    echo $new_src;
                }
            }
        }

            
            
        /*************************************************************/
        /************GET CUSTOM THUMB SIZE v2*********************/
        /************************************************************/  
            
            
    function tk_get_thumb_new($width, $height, $src)
            {
                if(strpos($src, '.jpg')){
                    $new_src = explode('.jpg', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.jpg';
                            /*
                             * THIS STILL NEEDS TO BE TESTED!!!!
                            if(@fopen($new_src, 'r')){
                                echo $new_src;
                            }else{
                                echo $src;
                            }
                            */
                        return $new_src;
                }elseif(strpos($src, '.jpeg')){
                    $new_src = explode('.jpeg', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.jpeg';
                    return $new_src;
                }elseif(strpos($src, '.gif')){
                    $new_src = explode('.gif', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.gif';
                    return $new_src;
                }elseif(strpos($src, '.png')){
                    $new_src = explode('.png', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.png';
                    return $new_src;
                }
            }           



            
        /*************************************************************/
        /************LOAD WIDGETS**********************************/
        /*************************************************************/

	require_once (TEMPLATEPATH . '/inc/widgets/widget-twitter.php');
	require_once (TEMPLATEPATH . '/inc/widgets/widget-newsletter.php');


        

        /*************************************************************/
        /************INCREASE IMAGE QUALITY***********************/
        /************************************************************/

            function jpeg_quality_callback($arg)
            {
            return (int)100;
            }

            add_filter('jpeg_quality', 'jpeg_quality_callback');



        /*************************************************************/
        /************REMOVE IMAGE SIZE*****************************/
        /************************************************************/

            add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
             add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
             // Removes attached image sizes as well
             add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );
             function remove_thumbnail_dimensions( $html ) {
             $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
             return $html;
             }

            
            
        /*************************************************************/
        /************IMAGE WITHOUT DIMENSIONS********************/
        /************************************************************/

            function tk_thumbnail($post_id, $img_size) {
                    $thumbnail = get_the_post_thumbnail($post_id, $img_size);
                    $thumbnail = preg_replace( '/(width|height)=\"\d*\"\s/', "", $thumbnail );
                    echo $thumbnail;
            }

            
        /*************************************************************/
        /************EXCERPT LENGTH*******************************/
        /************************************************************/

            function the_excerpt_length($charlength) {
                    $excerpt = get_the_excerpt();
                    $charlength++;

                    if ( strlen( $excerpt ) > $charlength ) {
                            $subex = substr( $excerpt, 0, $charlength - 5 );
                            $exwords = explode( ' ', $subex );
                            $excut = - ( strlen( $exwords[ count( $exwords ) - 1 ] ) );
                            if ( $excut < 0 ) {
                                    echo substr( $subex, 0, $excut );
                            } else {
                                    echo $subex;
                            }
                            echo '...';
                    } else {
                            echo $excerpt;
                    }
            }


            
        /*************************************************************/
        /************GET URL OF CURENT PAGE**********************/
        /************************************************************/

        function get_page_url(){

	$pageURL = 'http';
	if (isset($_SERVER["HTTPS"])) {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;

        }
        
        

        /*************************************************************/
        /************CHOSE SIDEBAR POSITION************************/
        /************************************************************/

        function tk_get_left_sidebar($sidebar_position, $sidebar_name) {

            $sidebar_option = get_theme_option(tk_theme_name.'_general_custom_sidebars');
            if($sidebar_position == 'Left'){
                if($sidebar_option !== 'yes') { ?>

                    <div id="sidebar" class="left">
                           <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Default/Home')) : ?>
                            <?php endif; ?>
                    </div>

               <?php } else { ?>

                    <div id="sidebar" class="left">
                           <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar($sidebar_name)) : ?>
                           <?php endif; ?>
                    </div>

            <?php }
            }
        }


        
        function tk_get_right_sidebar($sidebar_position, $sidebar_name) {
            $sidebar_option = get_theme_option(tk_theme_name.'_general_custom_sidebars');
            if($sidebar_position == 'Right'){?>
            <?php
                $sidebar_option = get_theme_option(tk_theme_name.'_general_custom_sidebars');

                if($sidebar_option !== 'yes') { ?>

            <div id="sidebar" class="right">
                   <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Default')) : ?>
                    <?php endif; ?>
            </div><!--/#sidebar-->

               <?php } else { ?>

            <div id="sidebar" class="right">
                   <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar($sidebar_name)) : ?>
                   <?php endif; ?>
            </div><!--/#sidebar-->
            <?php }
             }
        }



        /*************************************************************/
        /************REGISTERING SIDEBARS**************************/
        /************************************************************/

        if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Footer Widget 1',
                        'before_widget' => '<div class="footer_box_holder">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h2>',
                        'after_title'   => '</h2>' )
                        );
	}

	if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Footer Widget 2',
                        'before_widget' => '<div class="footer_box_holder">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h2>',
                        'after_title'   => '</h2>' )
                        );
	}

	if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Footer Widget 3',
                        'before_widget' => '<div class="footer_box_holder">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h2>',
                        'after_title'   => '</h2>' )
                        );
	}




        
        /*************************************************************/
        /************LOAD FUNCTION FOR COLOR CHANGE************/
        /*************************************************************/
        function tk_change_color() {
                    get_template_part('/inc/change-colors');
        }
        add_action('wp_head', 'tk_change_color', '99');

        
        
        /*************************************************************/
        /************SET DEFAULTS***********************************/
        /*************************************************************/
        if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
            update_option('Bloggap_colors_body_bg_img', get_template_directory_uri().'/style/img/bg-body.jpg');
        }


        /*************************************************************/
        /************LOAD SHORTCODES******************************/
        /*************************************************************/


        require_once (  ABSPATH.'wp-content/themes/'.tk_theme_name.'/inc/shortcodes/tinymce_loader.php');

        function enable_more_buttons($buttons) {
          $buttons[] = 'hr';
          return $buttons;
        }
        add_filter("mce_buttons", "enable_more_buttons");

        function shortcode_one_half( $atts, $content = null ) {
                extract(shortcode_atts(array(
                        'position'     	 => '',
            ), $atts));

           return '<div class="one-half '.$position.'"><p>' . do_shortcode($content) . '</p></div>';
        }

        add_shortcode('one_half', 'shortcode_one_half');

        function shortcode_one_third( $atts, $content = null ) {
                extract(shortcode_atts(array(
                        'position'     	 => '',
            ), $atts));

           return '<div class="one-third '.$position.'"><p>' . do_shortcode($content) . '</p></div>';
        }

        add_shortcode('one_third', 'shortcode_one_third');

        function shortcode_one_fourth( $atts, $content = null ) {
                extract(shortcode_atts(array(
                        'position'     	 => '',
            ), $atts));

           return '<div class="one-fourth '.$position.'"><p>' . do_shortcode($content) . '</p></div>';
        }

        add_shortcode('one_fourth', 'shortcode_one_fourth');


        function shortcode_button( $atts, $content = null ) {

                extract(shortcode_atts(array(
                        'url'     	 => '#',
                        'style'   => 'black',
            ), $atts));

           return '<div class="color-buttons color-button-'.$style.' left"><a href="'.$url.'">' . do_shortcode($content) . '</a></div>';
        }

        add_shortcode('button', 'shortcode_button');


        function shortcode_list( $atts, $content = null ) {

                extract(shortcode_atts(array(
                        'style'   => '1'
            ), $atts));

           return '<ul style="list-style:none;padding-left:0px"><li class="'.$style.'">' . do_shortcode($content) . '</li></ul>';
        }

        add_shortcode('list', 'shortcode_list');


        function shortcode_toggle( $atts, $content = null ) {

                extract(shortcode_atts(array(
                        'title'   => 'Title',
                        'value'   => ''
            ), $atts));

                if($value != ''){
                    $image_class = 'active-togle-img';
                    $box_class = 'no-active-togle';
                }else{
                    $image_class = '';
                    $box_class = '';
                }
             
           return '<div class="toggle-boxes"><ul><li><span><h6 class="'.$image_class.'"></h6>'.$title.'</span><p class="'.$box_class.'">'.do_shortcode($content).'</p></li></ul></div>';
        }

        add_shortcode('toggle', 'shortcode_toggle');




        /*************************************************************/
        /************SAVE TEMPLATE  ID AND NAME*******************/
        /*************************************************************/



 add_action ( 'publish_page', 'saveContactID' );

function saveContactID($post_ID) {
    global $wp_query;
    $the_title =  get_the_title($post_ID);
    $template_name = get_post_meta( $post_ID, '_wp_page_template', true );
    if($template_name == "_contact.php") {
        update_option('id_contact_page',$post_ID);
        update_option('title_contact_page',$the_title);
    }

    $oldblog = get_option('id_contact_page');
    if($post_ID == $oldblog) {
        if($template_name <> "_contact.php") {
            update_option('id_contact_page','');
        }
    }
}
        



 add_action ( 'publish_page', 'saveBlogId' );

function saveBlogId($post_ID) {
    global $wp_query;
    $the_title =  get_the_title($post_ID);
    $template_name = get_post_meta( $post_ID, '_wp_page_template', true );
    if($template_name == "_blog.php") {
        update_option('id_blog_page',$post_ID);
        update_option('title_blog_page',$the_title);
    }

    $oldblog = get_option('id_blog_page');
    if($post_ID == $oldblog) {
        if($template_name <> "_blog.php") {
            update_option('id_blog_page','');
        }
    }
}

add_action ( 'publish_page', 'saveEventstId' );
function saveeventstId($post_ID) {
    global $wp_query;
    $the_title =  get_the_title($post_ID);
    $template_name = get_post_meta( $post_ID, '_wp_page_template', true );
    if($template_name == "_events.php") {
        update_option('id_events_page',$post_ID);
        update_option('title_events_page',$the_title);
    }

    $oldblog = get_option('id_events_page');
    if($post_ID == $oldblog) {
        if($template_name <> "_events.php") {
            update_option('id_events_page','');
        }
    }
}



add_action ( 'publish_page', 'saveGalleryId' );
function saveGalleryId($post_ID) {
    global $wp_query;
    $the_title =  get_the_title($post_ID);
    $template_name = get_post_meta( $post_ID, '_wp_page_template', true );
    if($template_name == "_gallery.php") {
        update_option('id_gallery_page',$post_ID);
        update_option('title_gallery_page',$the_title);
    }

    $oldblog = get_option('id_gallery_page');
    if($post_ID == $oldblog) {
        if($template_name <> "_gallery.php") {
            update_option('id_gallery_page','');
        }
    }
}


add_action ( 'publish_page', 'saveOurTeamId' );
function saveOurTeamId($post_ID) {
    global $wp_query;
    $the_title =  get_the_title($post_ID);
    $template_name = get_post_meta( $post_ID, '_wp_page_template', true );
    if($template_name == "_team-members.php") {
        update_option('id_ourteam_page',$post_ID);
        update_option('title_ourteam_page',$the_title);
    }

    $oldblog = get_option('id_ourteam_page');
    if($post_ID == $oldblog) {
        if($template_name <> "_team-members.php") {
            update_option('id_ourteam_page','');
        }
    }
}


add_action ( 'publish_page', 'saveServicesId' );
function saveServicesId($post_ID) {
    global $wp_query;
    $the_title =  get_the_title($post_ID);
    $template_name = get_post_meta( $post_ID, '_wp_page_template', true );
    if($template_name == "_services.php") {
        update_option('id_services_page',$post_ID);
        update_option('title_services_page',$the_title);
    }

    $oldblog = get_option('id_services_page');
    if($post_ID == $oldblog) {
        if($template_name <> "_services.php") {
            update_option('id_services_page','');
        }
    }
}


add_action ( 'publish_page', 'saveFullwidthId' );
function saveFullwidthId($post_ID) {
    global $wp_query;
    $the_title =  get_the_title($post_ID);
    $template_name = get_post_meta( $post_ID, '_wp_page_template', true );
    if($template_name == "_full_width.php") {
        update_option('id_fullwidth_page',$post_ID);
        update_option('title_fullwidth_page',$the_title);
    }

    $oldblog = get_option('id_fullwidth_page');
    if($post_ID == $oldblog) {
        if($template_name <> "_full_width.php") {
            update_option('id_fullwidth_page','');
        }
    }
}

        /*************************************************************/
        /************TWITTER SCRIPT*********************************/
        /*************************************************************/


function twitter_script($unique_id,$username,$limit) { ?>
	<script type="text/javascript">
	<!--//--><![CDATA[//><!--

	    function twitterCallback2(twitters) {
	      var statusHTML = [];
	      for (var i=0; i<twitters.length; i++){
	        var username = twitters[i].user.screen_name;
	        var status = twitters[i].text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
	          return '<a href="'+url+'">'+url+'</a>';
	        }).replace(/\B@([_a-z0-9]+)/ig, function(reply) {
	          return  reply.charAt(0)+'<a href="http://twitter.com/'+reply.substring(1)+'">'+reply.substring(1)+'</a>';
	        });
	        statusHTML.push('<li><div class="box-twitter-center left"><span>'+status+'</span></div><span class="twitter-links">'+relative_time(twitters[i].created_at)+'</span></li>');
	      }
	      document.getElementById('twitter_update_list_<?php echo $unique_id; ?>').innerHTML = statusHTML.join('');
	    }

	    function relative_time(time_value) {
	      var values = time_value.split(" ");
	      time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
	      var parsed_date = Date.parse(time_value);
	      var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
	      var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
	      delta = delta + (relative_to.getTimezoneOffset() * 60);

	      if (delta < 60) {
	        return 'less than a minute ago';
	      } else if(delta < 120) {
	        return 'about a minute ago';
	      } else if(delta < (60*60)) {
	        return (parseInt(delta / 60)).toString() + ' minutes ago';
	      } else if(delta < (120*60)) {
	        return 'about an hour ago';
	      } else if(delta < (24*60*60)) {
	        return 'about ' + (parseInt(delta / 3600)).toString() + ' hours ago';
	      } else if(delta < (48*60*60)) {
	        return '1 day ago';
	      } else {
	        return (parseInt(delta / 86400)).toString() + ' days ago';
	      }
	    }
	//-->
	</script>
	<script type="text/javascript" src="http://api.twitter.com/1/statuses/user_timeline.json?screen_name=<?php echo $username; ?>&include_rts=true&callback=twitterCallback2&count=<?php echo $limit; ?>"></script>

 <?php } 

  function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];
  if(empty($first_img)){ //Defines a default image
    $first_img = "/images/default.jpg";
  }
  return $first_img;
}



 /*************************************************************/
/************GALLERY FANCYBOX FILTER************************/
/*************************************************************/

    add_filter('wp_get_attachment_link', 'add_lighbox_rel');

    function add_lighbox_rel($attachment_link) {
        if (strpos($attachment_link, 'a href') != false){
            $attachment_link = str_replace('a href', 'a class="fancybox" href', $attachment_link);
        }
        return $attachment_link;
    }





 /*************************************************************/
/*******FACEBOOK AND TWITTER SHARE STYLE****************/
/*************************************************************/

// Facebook Share Counter

function get_likes($url) {
    $facebookcount = json_decode(@file_get_contents('http://graph.facebook.com/' . $url));
     //print_r($facebookcount);
    if($facebookcount->shares == '') {
        return 0;
    } else {
        return @$facebookcount->shares;
    }
}


// Twitter Share Counter

function get_tweets($url) {
  $json_string = @file_get_contents('http://urls.api.twitter.com/1/urls/count.json?url=' . $url);
  $json = json_decode($json_string, true);
  return intval( $json['count'] );
}


require_once (  ABSPATH.'wp-content/themes/'.tk_theme_name.'/inc/colors.php');

 ?>