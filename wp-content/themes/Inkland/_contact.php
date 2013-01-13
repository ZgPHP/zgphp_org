<?php
/*

Template Name: Contact

*/
get_header();
$prefix = 'tk_';
$sidebar_position = get_post_meta($post->ID, $prefix.'sidebar_position', true);
?>

    <!-- CONTENT -->
    <div class="content left">
        <div class="bg-content-one left">

            <!--SIDBAR-->
            <?php tk_get_left_sidebar('Left', 'Contact')?>

            <div class="content-right right">

                <div class="title-page-content-right left"><?php _e("Contact", 'inkland')?></div><!--title-page-content-right-->

                <div class="portfolio-content left">

               <?php
                    $x_coord = get_option('Inkland_contact_googlemap_x');
                    $y_coord = get_option('Inkland_contact_googlemap_y');
                    $zoom_factor = get_option('Inkland_contact_googlemap_zoom');
                    $map_type = get_option('Inkland_contact_google_map_type');
                    $marker_title = get_option('Inkland_contact_marker_title');
                    if(empty($x_coord)) {$x_coord = 45.256024;}
                    if(empty($y_coord)) {$y_coord = 19.853861;}
                    if(empty($zoom_factor)) {$zoom_factor = 15;}
                    if(empty($map_type)) {$map_type = 'ROADMAP';}
                ?>

                    <div class="home-blog-images left">
                        <div class="bg-home-img-top left"></div><!--/bg-home-img-top-->
                        <div class="bg-home-img-center left">
                            <div class="map-contact left">
                                <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                                <div id="map_canvas" style="width: 100%; height: 100%; min-height: 0px;" class="contact-img"></div>

                                <script type="text/javascript">

                                    var latlng = new google.maps.LatLng(<?php echo $x_coord?>, <?php echo $y_coord?>);

                                    var myOptions = {
                                        zoom: <?php echo $zoom_factor ?>,
                                        center: latlng,
                                        mapTypeControl: false,
                                        streetViewControl: false,
                                        overviewMapControl: false,
                                        mapTypeId: google.maps.MapTypeId.<?php echo $map_type?>,
                                        scrollwheel: false
                                    };

                                    var mapa = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

                                    <?php if(!empty($marker_title)) { ?>
                                      var marker = new google.maps.Marker({
                                          position: latlng,
                                          map: mapa,
                                          title:"<?php echo $marker_title?>"
                                      });
                                  <?php }?>

                                </script>
                            </div><!--/map-contact-->
                        </div><!--/bg-home-img-center-->
                        <div class="bg-home-img-down left"></div><!--/bg-home-img-down-->
                    </div><!--/home-blog-images-->

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
                </div><!--/content-one-->


   <?php
                $subject_error_msg = get_option('Inkland_contact_subject_error_message');
                $name_error_msg = get_option('Inkland_contact_name_error_message');
                $email_error_msg = get_option('Inkland_contact_email_error_message');
                $message_error_msg = get_option('Inkland_contact_message_error_message');
                $mail_success_msg = get_option('Inkland_contact_message_successful');
                $mail_error_msg = get_option('Inkland_contact_message_unsuccessful');
                ?>

                <!-- Validate script -->
                <script type="text/javascript">
                    function validate_email(field,alerttxt)
                    {
                        with (field)
                        {
                            apos=value.indexOf("@");
                            dotpos=value.lastIndexOf(".");
                            if (apos<1||dotpos-apos<2)
                            {jQuery('#contact-error').empty().append(alerttxt);return false;}
                            else {return true;}
                        }
                    }

                    function check_field(field,alerttxt,checktext){
                        with (field)
                        {
                            var checkfalse = 0;
                            if(field.value == ""){
                                jQuery('#contact-error').empty().append(alerttxt);
                                field.focus();checkfalse=1;}

                            if(field.value==checktext)
                            {
                                jQuery('#contact-error').empty().append(alerttxt);
                                field.focus();checkfalse=1;}

                            if(checkfalse==1){return false;}else{return true;}
                        }
                    }

                    function checkForm(thisform)
                    {
                        with (thisform)
                        {
                            var error = 0;

                            var message = document.getElementById('message');
                            if(check_field(message,"<?php echo $message_error_msg?>","")==false){
                                error = 1;
                            }

                            var email = document.getElementById('contactemail');
                            if (validate_email(email,"<?php echo $email_error_msg?>")==false)
                            {email.focus();error = 1;}

                            var contactname = document.getElementById('contactname');
                            if(check_field(contactname,"<?php echo $name_error_msg?>","")==false){
                                error = 1;
                            }


                            if(error == 0){                              
                                var contactname = document.getElementById('contactname').value;
                                var email = document.getElementById('contactemail').value;
                                var message = document.getElementById('message').value;

                                return true;
                            }
                            return false;
                        }
                    }
                </script>
                <!-- end of script -->

                    <div class="blog-one left">
                        <div class="blog-categories left">
                            <div class="bg-form-contact left"></div>
                        </div><!--blog-categories-->

                        <div class="blog-one-content right">

                    <div class="form-contact left">
                        <h3><?php _e("Say Hello", 'inkland')?></h3>
                                <form method="POST" id="contactform" onsubmit="return checkForm(this)" action="<?php echo get_template_directory_uri().'/sendcontact.php'?>" >
                                    <div class="bg-input left"><input type="text" onfocus="if(value==defaultValue)value=''" onblur="if(value=='')value=defaultValue" value="" name="contactname" id="contactname" tabindex="2"/><span><?php _e('Name *', 'inkland')?></span></div>
                                    <div class="bg-input left"><input type="text" onfocus="if(value==defaultValue)value=''" onblur="if(value=='')value=defaultValue" value="" name="email" id="contactemail" tabindex="3"/><span><?php _e('Mail (will not be published)', 'inkland')?></span></div>

                                    <div class="form-textarea"><textarea onfocus="if(value==defaultValue)value=''" onblur="if(value=='')value=defaultValue" name="message" id="message" tabindex="4"></textarea></div><!--/form-textarea-->

                                    <div class="white left">
                                        <div class="white-left left"></div>
                                        <input class="form-contact-submit-button" name="submit" type="submit" id="submit" tabindex="5" value="Send" onclick="return checkForm(this)" />
                                        <div class="white-right left"></div>
                                    </div><!--/white-->



                                    <input type="hidden" name="returnurl" value="<?php echo get_permalink();  ?>">
                                    <div id="contact-success"><?php if(isset($_GET['sent'])) {
                                            $what = $_GET['sent'];
                                            if($what == 'success') {
                                                echo $mail_success_msg;
                                            }
                                        }
                                        ?></div>
                                    <div id="contact-error"><?php if(isset($_GET['sent'])) {
                                            $what = $_GET['sent'];
                                            if($what == 'error') {
                                                echo $mail_error_msg;
                                            }
                                        }
                                        ?></div>

                                </form><!--close form -->
                            </div><!-- form-left -->


                        </div><!--blog-one-content-->
            </div><!--/content-right-->
        </div><!--/bg-content-one-->
    </div><!--/content-->
    </div><!--/content-->



            


<?php get_footer(); ?>




