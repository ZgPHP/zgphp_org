<?php
global $wpdb;

require(  get_template_directory() . '/inc/theme-settings.php');                //Building theme administration

require(  get_template_directory() . '/inc/meta-boxes.php');                    //Building meta boxes

require(  get_template_directory() . '/inc/post-types.php');                    //Building post types

require(  get_template_directory() . '/inc/custom-taxonomies.php');             //Building post types


$lang = get_template_directory() . '/languages/';                               //Make this theme available for translation.
load_theme_textdomain('inkland', $lang);

add_theme_support( 'automatic-feed-links' );                                    //Add default posts and comments RSS feed links to <head>

add_theme_support( 'post-thumbnails' );                                         //This enables Post Thumbnails support for this theme.
        add_image_size( 'slider', 654 , 332 , true );
        add_image_size( 'blog', 547 , 315 , true );
        add_image_size( 'portfolio', 253 , 165 , true );

register_nav_menu( 'primary', __( 'Primary Menu', 'inkland' ) );                //This theme uses wp_nav_menu()

//THEME NAME
$tk_theme_name = 'Inkland';

function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Add support for custom backgrounds
add_theme_support( 'custom-background' );



        /*************************************************************/
        /************RESIZE SLIDER IMAGE*****************************/
        /*************************************************************/

        function resize_image($input) {
            $string_length = strlen($input);
            $main_part = substr($input, 0, $string_length-4);
            $last_4 = substr($input, -4);
            $output = $main_part.'-547x315'.$last_4;
            echo $output;
        }



        /*************************************************************/
        /************INCLUDE POST TYPE IN ARCHIVE******************/
        /*************************************************************/

        function namespace_add_custom_types( $query ) {
          if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
            $query->set( 'post_type', array(
             'post', 'nav_menu_item', 'pt_portfolio'
                        ));
                  return $query;
                }
        }
        add_filter( 'pre_get_posts', 'namespace_add_custom_types' );

        /*************************************************************/
        /************LOAD WIDGETS**********************************/
        /*************************************************************/

	require_once (TEMPLATEPATH . '/inc/widgets/widget-twitter.php');
	require_once (TEMPLATEPATH . '/inc/widgets/widget-newsletter.php');


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
			<div class="holder right">
				<object width="547" height="307">
					<param name="movie" value="http://www.youtube.com/v/<?php echo $url;?>?version=3&autohide=1&showinfo=0"/>
					<param name="allowScriptAccess" value="always" />
					<embed src="http://www.youtube.com/v/<?php echo $url;?>?version=3&autohide=1&showinfo=0" type="application/x-shockwave-flash" width="547" height="307" allowscriptaccess="always" />
				</object>
			</div>
		<?php  }
		if (!empty($pos_vimeo)) {
			$url = explode('.com/',$url);
		?>

		<div class="holder right">

                    <iframe src="http://player.vimeo.com/video/<?php echo $url[1];?>" width="547" height="307" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>

		</div>
		<?php  }
		if (empty($pos_vimeo) && empty($pos_youtube)) {

		  echo "Video only allowes vimeo and youtube!";
		}

   }}



        /*************************************************************/
        /************INCREASE IMAGE QUALITY***********************/
        /************************************************************/

            function jpeg_quality_callback($arg)
            {
            return (int)100;
            }

            add_filter('jpeg_quality', 'jpeg_quality_callback');



        /*************************************************************/
        /************EXCERPT LENGTH*******************************/
        /************************************************************/

            function the_excerpt_length($charlength) {
                    $excerpt = get_the_excerpt();
                    $charlength++;

                    if ( mb_strlen( $excerpt ) > $charlength ) {
                            $subex = mb_substr( $excerpt, 0, $charlength - 5 );
                            $exwords = explode( ' ', $subex );
                            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
                            if ( $excut < 0 ) {
                                    echo mb_substr( $subex, 0, $excut );
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

            $sidebar_option = get_theme_option('Inkland_general_custom_sidebars');
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

            $sidebar_option = get_theme_option('Inkland_general_custom_sidebars');
            if($sidebar_position == 'Right'){?>
            <?php
                $sidebar_option = get_theme_option('Inkland_general_custom_sidebars');
                if($sidebar_option !== 'yes') { ?>

            <div id="sidebar" class="left" style="margin-left: 30px">
                   <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Default')) : ?>
                    <?php endif; ?>
            </div><!--/#sidebar-->

               <?php } else { ?>

            <div id="sidebar" class="left" style="margin-left: 30px">
                   <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar($sidebar_name)) : ?>
                   <?php endif; ?>
            </div><!--/#sidebar-->
            <?php }
             }
        }


        
        /*************************************************************/
        /************SAVE ID AND TITLE OF PAGE TEMPLATES*********/
        /************************************************************/

   add_action ( 'publish_page', 'saveBlogId' );

        function saveBlogId($post_ID) {
            global $wp_query;
            $template_title =  get_the_title($post_ID);
            $template_name = get_post_meta( $post_ID, '_wp_page_template', true );
            if($template_name == "_blog.php") {
                update_option('id_blog_page',$post_ID);
                update_option('title_blog_page',$template_title);
            }

            $oldtemplate = get_option('id_blog_page');
            if($post_ID == $oldtemplate) {
                if($template_name <> "_blog.php") {
                    update_option('id_blog_page','');
                }
            }
        }

   add_action ( 'publish_page', 'saveProgram' );

        function saveProgram($post_ID) {
            global $wp_query;
            $template_title =  get_the_title($post_ID);
            $template_name = get_post_meta( $post_ID, '_wp_page_template', true );
            if($template_name == "_program.php") {
                update_option('id_program_page',$post_ID);
                update_option('title_program_page',$template_title);
            }

            $oldtemplate = get_option('id_program_page');
            if($post_ID == $oldtemplate) {
                if($template_name <> "_program.php") {
                    update_option('id_program_page','');
                }
            }
        }

   add_action ( 'publish_page', 'saveSpeaker' );

        function saveSpeaker($post_ID) {
            global $wp_query;
            $template_title =  get_the_title($post_ID);
            $template_name = get_post_meta( $post_ID, '_wp_page_template', true );
            if($template_name == "_speakers.php") {
                update_option('id_speakers_page',$post_ID);
                update_option('title_speakers_page',$template_title);
            }

            $oldtemplate = get_option('id_speakers_page');
            if($post_ID == $oldtemplate) {
                if($template_name <> "_speakers.php") {
                    update_option('id_speakers_page','');
                }
            }
        }


        /*************************************************************/
        /************REGISTERING SIDEBARS**************************/
        /************************************************************/

        if(function_exists('register_sidebar')){
		register_sidebar(array(
						'name'          => 'Sidebar Default/Home',
						'before_widget' => '<div class="sidebar_widget_holder %s">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="bg-widget-title"><h3>',
						'after_title'   => '</h3></div>' )
						);
	}


        if(function_exists('register_sidebar')){
		register_sidebar(array(
						'name'          => 'Blog',
						'before_widget' => '<div class="sidebar_widget_holder %s">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="bg-widget-title"><h3>',
						'after_title'   => '</h3></div>' )
						);
	}


        if(function_exists('register_sidebar')){
		register_sidebar(array(
						'name'          => 'Page Template',
						'before_widget' => '<div class="sidebar_widget_holder %s">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="bg-widget-title"><h3>',
						'after_title'   => '</h3></div>' )
						);
	}


        if(function_exists('register_sidebar')){
		register_sidebar(array(
						'name'          => 'Portfolio Template',
						'before_widget' => '<div class="sidebar_widget_holder %s">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="bg-widget-title"><h3>',
						'after_title'   => '</h3></div>' )
						);
	}

        if(function_exists('register_sidebar')){
		register_sidebar(array(
						'name'          => 'Archive/Search',
						'before_widget' => '<div class="sidebar_widget_holder %s">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="bg-widget-title"><h3>',
						'after_title'   => '</h3></div>' )
						);
	}

        if(function_exists('register_sidebar')){
		register_sidebar(array(
						'name'          => 'Contact',
						'before_widget' => '<div class="sidebar_widget_holder %s">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="bg-widget-title"><h3>',
						'after_title'   => '</h3></div>' )
						);
	}


        
        /*************************************************************/
        /************MAINTENANCE MODE****************************/
        /*************************************************************/

$options = get_option('maintenance_mode_maintenance');


if ( $options[0] == 'on' ) { add_action('get_header', 'activate_maintenance_mode'); }

function activate_maintenance_mode() {                                          //Maintenance mode

    if ( !(current_user_can( 'administrator' ) ||  current_user_can( 'super admin' ))) {

        wp_die('<h1>Website Under Maintenance</h1><p>Hi, our Website is currently undergoing scheduled maintenance.
        Please check back very soon.<br /><strong>Sorry for the inconvenience!</strong></p>', 'Maintenance Mode');
    }
}



        /*************************************************************/
        /************LOAD SHORTCODES******************************/
        /*************************************************************/


require_once (  ABSPATH.'wp-content/themes/Inkland/inc/shortcodes/tinymce_loader.php');

function enable_more_buttons($buttons) {
  $buttons[] = 'hr';
  return $buttons;
}
add_filter("mce_buttons", "enable_more_buttons");

function shortcode_one_half( $atts, $content = null ) {
    	extract(shortcode_atts(array(
		'position'     	 => '',
    ), $atts));

   return '<div class="one-half '.$position.'">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_half', 'shortcode_one_half');

function shortcode_one_third( $atts, $content = null ) {
    	extract(shortcode_atts(array(
		'position'     	 => '',
    ), $atts));
        
   return '<div class="one-third '.$position.'">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_third', 'shortcode_one_third');

function shortcode_one_fourth( $atts, $content = null ) {
    	extract(shortcode_atts(array(
		'position'     	 => '',
    ), $atts));
        
   return '<div class="one-fourth '.$position.'">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_fourth', 'shortcode_one_fourth');


function shortcode_button( $atts, $content = null ) {

	extract(shortcode_atts(array(
		'url'     	 => '#',
		'style'   => 'black',
    ), $atts));

   return '<div class="color-buttons left"><div class="'.$style.'"><div class="'.$style.'-left left"></div><div class="'.$style.'-center left"><a href="'.$url.'">' . do_shortcode($content) . '</a></div><div class="'.$style.'-right left"></div></div></div>';
}

add_shortcode('button', 'shortcode_button');


function shortcode_list( $atts, $content = null ) {

	extract(shortcode_atts(array(
		'style'   => '1'
    ), $atts));

   return '<ul><li class="'.$style.'">' . do_shortcode($content) . '</li></ul>';
}

add_shortcode('list', 'shortcode_list');


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
	        statusHTML.push('<li><div class="bg-widget-center left"><img src="<?php echo get_template_directory_uri()?>/style/img/twitter-icon.png" alt="images" title="images"><span class="twitt"></span><span>'+status+'</span></div><p class="twitter-links">'+relative_time(twitters[i].created_at)+'</p></li>');
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
	//-->!]]>
	</script>
	<script type="text/javascript" src="http://api.twitter.com/1/statuses/user_timeline.json?screen_name=<?php echo $username; ?>&include_rts=true&callback=twitterCallback2&count=<?php echo $limit; ?>"></script>

 <?php } 
 
 include("update_notifier.php");
 
 ?>