<?php

$tabs = array(

        /*************************************************************/
        /************GENERAL OPTIONS*******************************/
        /*************************************************************/

    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'general',
        'name' => 'General Options',
        
        'fields' => array(
            
           array(
                'id' => 'header_logo',
                'name' => 'header_logo',
                'type' => 'file',
                'value' => get_template_directory_uri()."/style/img/logo.png",
                'label' => 'Header Logo',
                'desc' => 'JPEG, GIF or PNG image, 300x95px recommended, up to 500KB',
            ),

            array(
                'id' => 'favicon',
                'name' => 'favicon',
                'type' => 'file',
                'value' => get_template_directory_uri()."/style/img/favicon.ico",
                'label' => 'Favicon',
                'desc' => 'File format: ICO, dimenstions: 16x16',
                
            ),

            array(
                'id' => 'google_analytics',
                'name' => 'google_analytics',
                'type' => 'textarea',
                'value' => '',
                'label' => 'Google Analytics code',
                'desc' => '',
                'options' => array(
                    'rows' => '5',
                    'cols' => '80'
                )
            ),

            array(
                'id' => 'custom_sidebars',
                'name' => 'custom_sidebars',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'Use different sidebars on page templates.',
                ),
                'label' => 'Custom Sidebars',
                'desc' => 'Check this box if you want to use custom sidebars on page templates, if unchecked the default sidebar will be used on every page.',
            ),
         
            array(
                'id' => 'footer_copy',
                'name' => 'footer_copy',
                'type' => 'text',
                'value' => 'Copyright Information Goes Here © 2012. All Rights Reserved.',
                'label' => 'Footer Copy Text',
                'desc' => 'Text which appears in footer as copyright text',
                'options' => array(
                    'size' => '100'
                )
            ),

            array(
                'id' => 'portfolio_per_page',
                'name' => 'portfolio_per_page',
                'type' => 'text',
                'value' => '10',
                'label' => 'Portfolio per page',
                'desc' => 'Insert how many portfolio per page to show on Portfolio page template',
                'options' => array(
                    'size' => '5'
                )
            ),

            array(
                'id' => 'portfolio_images',
                'name' => 'portfolio_images',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'Use only images for portfolio (Title link wont be visible and there will be no portfolio single page.)',
                ),
                'label' => 'Only Images Portfolio',
                'desc' => 'Check this box if you want to use only images for your Portfolio Template.',
            ),

        ),
    ),
    
    
        /*************************************************************/
        /************HOME PAGE OPTIONS****************************/
        /*************************************************************/
 
    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'home',
        'name' => 'Home Page',
        
        'fields' => array(

            array(
                'id' => 'enable_slider',
                'name' => 'enable_slider',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'Enable Slider',
                ),
                'label' => 'Slider',
                'desc' => 'Enable slider on home page',
            ),

            array(
                'id' => 'slider_category',
                'name' => 'slider_category',
                'type' => 'category',
                'value' => '',
                'label' => 'Slider category',
                'desc' => '',
            ),

            array(
                'id' => 'slider_dalay',
                'name' => 'slider_delay',
                'type' => 'text',
                'value' => '5000',
                'label' => 'Slider delay',
                'desc' => 'In milliseconds.',
                'options' => array(
                    'size' => '5'
                )
            ),

            array(
                'id' => 'animation_time',
                'name' => 'animation_time',
                'type' => 'text',
                'value' => '500',
                'label' => 'Slider animation time',
                'desc' => 'In milliseconds.',
                'options' => array(
                    'size' => '5'
                )

            ),

            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),

            array(
                'id' => 'use_home_content',
                'name' => 'use_home_content',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'Use Home Content',
                ),
                'label' => '',
                'desc' => '',
            ),

            array(
                'id' => 'home_content',
                'name' => 'home_content',
                'type' => 'pages',
                'value' => '',
                'label' => 'Chose page to use on Home Content:',
                'desc' => 'only content from this page will be shown on Home Page.',

            ),

            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),

            array(
                'id' => 'home_post_per_page',
                'name' => 'home_post_per_page',
                'type' => 'text',
                'value' => '10',
                'label' => 'Home Posts per page',
                'desc' => 'Insert how many posts per page to show on Home page',
                'options' => array(
                    'size' => '5'
                )
            ),

            array(
                'id' => 'home_pagination',
                'name' => 'home_pagination',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    'Enable pagination on Home page.',
                ),
                'label' => 'Enable Pagination',
                'desc' => 'Check this box if you want to use pagination on Home page.',
            ),
            
        ),
    ),
        /*************************************************************/
        /************COLOR OPTIONS*********************************/
        /*************************************************************/
 
    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'colors',
        'name' => 'Color Sets',
        
        'fields' => array(

            array(

                    'label' => 'Stylechanger',
                    'name' => '_stylechanger',
                    'type' => 'stylechanger',
                    'description' => '',
                    'styles' => array(
                                    'blue-1' => 'blue-1',
                                    'blue-2' => 'blue-2',
                                    'brown' => 'brown',
                                    'gray' => 'gray',
                                    'green' => 'green',
                                    'green-2' => 'green-2',
                                    'green-3' => 'green-3',
                                    'orange' => 'orange',
                                    'purple' => 'purple',
                                    'red' => 'red',
                    ),

            ),

        ),
    ),
    
    
    
        /*************************************************************/
        /************SOCIAL OPTIONS*********************************/
        /*************************************************************/
    
    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'social',
        'name' => 'Social',
        'fields' => array(
            
            array(
                'id' => 'enable_rss',
                'name' => 'enable_rss',
                'type' => 'checkbox',
                'value' => array(
                    'yes'
                   
                ),
                'caption' => array(
                    'Enable RSS'
                ),
                'label' => 'RSS',
                'desc' => 'Enable RSS Feed',
                
            ),
            
            array(
                'id' => 'rss_url',
                'name' => 'rss_url',
                'type' => 'text',
                'value' => '',
                'label' => 'RSS Feed URL',
                'desc' => 'if empty, default WordPress url will be used',
                'options' => array(
                    'size' => '80'
                )
            ),
            
            array(
                'id' => 'google_plus',
                'name' => 'google_plus',
                'type' => 'text',
                'value' => '',
                'label' => 'Google Plus account',
                'desc' => 'Leave this box empty if you dont want to use Google+',
                'options' => array(
                    'size' => '80'
                )
            ),
            
            array(
                'id' => 'facebook',
                'name' => 'facebook',
                'type' => 'text',
                'value' => '',
                'label' => 'Facebook account',
                'desc' => 'Leave this box empty if you dont want to use Facebook',
                'options' => array(
                    'size' => '80'
                )
            ),
            
            array(
                'id' => 'twitter',
                'name' => 'twitter',
                'type' => 'text',
                'value' => '',
                'label' => 'Twitter account',
                'desc' => 'Leave this box empty if you dont want to use Twitter',
                'options' => array(
                    'size' => '80'
                )
            ),

            array(
                'id' => 'pinterest',
                'name' => 'pinterest',
                'type' => 'text',
                'value' => '',
                'label' => 'Pinterest account',
                'desc' => 'Leave this box empty if you dont want to use Pinterest',
                'options' => array(
                    'size' => '80'
                )
            ),
            
        ),
    ),
    
    

        /*************************************************************/
        /************CONTACT OPTIONS******************************/
        /*************************************************************/
    
    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'contact',
        'name' => 'Contact',
        'fields' => array(
            
            array(
                'id' => 'contact_subject',
                'name' => 'contact_subject',
                'type' => 'text',
                'value' => 'E-mail from Inkland Theme',
                'label' => 'Subject for your contact form',
                'desc' => 'This will be subject when you receive e-mail from your site',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'name_error_message',
                'name' => 'name_error_message',
                'type' => 'text',
                'value' => 'Please insert your name!',
                'label' => 'Name error message',
                'desc' => 'Edit error and success messages for contact form',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'email_error_message',
                'name' => 'email_error_message',
                'type' => 'text',
                'value' => 'Please insert your e-mail!',
                'label' => 'E-mail error message',
                'desc' => 'Edit error and success messages for contact form',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'message_error_message',
                'name' => 'message_error_message',
                'type' => 'text',
                'value' => 'Please insert your message!',
                'label' => 'Message text error message',
                'desc' => 'Edit error and success messages for contact form',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'message_successful',
                'name' => 'message_successful',
                'type' => 'text',
                'value' => 'Message sent!',
                'label' => 'Message on successful e-mail send',
                'desc' => 'Edit error and success messages for contact form',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'message_unsuccessful',
                'name' => 'message_unsuccessful',
                'type' => 'text',
                'value' => 'Some error occured!',
                'label' => 'Message for error on e-mail send',
                'desc' => 'Edit error and success messages for contact form',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'googlemap_x',
                'name' => 'googlemap_x',
                'type' => 'text',
                'value' => '',
                'label' => 'Google map X coordinate',
                'desc' => 'Insert google map coordinate for your adress',
                'options' => array(
                    'size' => '5'
                )
            ),
            array(
                'id' => 'googlemap_y',
                'name' => 'googlemap_y',
                'type' => 'text',
                'value' => '',
                'label' => 'Google map Y coordinate',
                'desc' => 'Insert google map coordinate for your adress',
                'options' => array(
                    'size' => '5'
                )
            ),
            array(
                'id' => 'googlemap_zoom',
                'name' => 'googlemap_zoom',
                'type' => 'text',
                'value' => '15',
                'label' => 'Google map zoom factor',
                'desc' => 'Insert google map zoom factor',
                'options' => array(
                    'size' => '5'
                )
            ),
            array(
                'id' => 'marker_title',
                'name' => 'marker_title',
                'type' => 'text',
                'value' => 'Marker',
                'label' => 'Marker Title',
                'desc' => 'Insert marker title.',
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'google_map_type',
                'name' => 'google_map_type',
                'type' => 'select',
                'value' => array(
                    'HYBRID',
                    'ROADMAP',
                    'SATELLITE',
                    'TERRAIN'
                ),
                'label' => 'Google Map type',
                'desc' => 'Select map type you want to use.',
            ),
            
            
        ),
    ),
    
 
    
    
);
?>