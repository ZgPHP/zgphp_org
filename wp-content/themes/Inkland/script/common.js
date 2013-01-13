jQuery(document).ready(function(){


    //DEMO HIDER

       jQuery(".hider").toggle(function() {
            jQuery(".demo_wrap").animate({"left": "+=75px", "opacity" : "1"}, "slow");
            jQuery(".hider").animate({"left": "+=75px", "opacity" : "1"}, "slow");
}, function() {
            jQuery(".demo_wrap").animate({"left": "-=75px", "opacity" : "1"}, "slow");
            jQuery(".hider").animate({"left": "-=75px", "opacity" : "1"}, "slow");
});


    jQuery(jQuery('[class^="sidebar_widget_holder recent-posts-"]')).each(function(){
        jQuery(this).addClass('recent-line-hight');
    })


    //MENU
    jQuery("ul.sf-menu").superfish();
    jQuery('.sub-menu li:last-child a').attr('style', 'border:none');
    jQuery(".sub-menu li:last-child").after('<div class="sub-menu-bottom"></div>');
    jQuery(".sub-menu li:first-child").before('<div class="sub-menu-top"></div>');




        // PIRO BOX
        jQuery().piroBox({
            my_speed: 300, //animation speed
            bg_alpha: 0.5, //background opacity
            slideShow : 'true', // true == slideshow on, false == slideshow off
            slideSpeed : 3, //slideshow
            close_all : '.piro_close' // add class .piro_overlay(with comma)if you want overlay click close piroBox
        });


    //Tag Cloud style


        var tagfix = jQuery('.tagcloud a').html();
        jQuery('.tagcloud a').each(function(){
                var tagfix = jQuery(this).html();
                jQuery(this).html('').append('<div class="tags-button left"><div class="tag-left left"></div><div class="tag-center left">'+tagfix+'</div><div class="tag-right left"></div>');
        });


        // HOVER-IMAGES
       jQuery('.bg-portfolio-center').hover(function(){
           jQuery('img',this).stop().animate({opacity:0.4},500);
           jQuery('.hover-portfolio-images',this).css('display','block');
        },function(){
           jQuery('img',this).stop().animate({opacity:1},300);
           jQuery('.hover-portfolio-images',this).css('display','none');
        });


        jQuery('.footer-left ul li a').hover(function(){
           jQuery('div',this).stop().animate({top: '-16px'},300);
        },function(){
           jQuery('div',this).stop().animate({top: '0'},300);
        });


        jQuery('.nivo-directionNav a').hover(function(){
           jQuery('span',this).stop().animate({top: '-12px'},200);
        },function(){
           jQuery('span',this).stop().animate({top: '0'},200);
        });



                               jQuery('.bg-home-img-center').hover(function(){
                                   jQuery('img',this).stop().animate({opacity:0.4},500);
                                },function(){
                                   jQuery('img',this).stop().animate({opacity:1},300);
                                });

        jQuery('.portfolio-filter ul li a:last').attr('style', 'border-right: 0; padding: 0;');
        jQuery('.portfolio-content .portfolio-row:last').attr('style', 'border: 0; padding: 0;');
        jQuery('.nav ul.sf-menu li:last').attr('style', 'background: none; padding-right: 0;');
        jQuery('.link-blog-page a:last').attr('style', 'background: none; padding-right: 0; margin-right:0;');
        jQuery('.comment-start .comment-start-one:last').attr('style', 'border: none; padding-bottom: 0; margin-bottom:0;');
        jQuery('.sidebar_widget_holder .app_recent_title:last').attr('style', 'border: none; margin-bottom:0;');
        jQuery('.sidebar_widget_holder .app_recent_comments:last').attr('style', 'border: none; margin-bottom:0;');


    // hide #back-top first
    jQuery("#back-top").hide();

    // fade in #back-top
    jQuery(function () {
            jQuery(window).scroll(function () {
                    if (jQuery(this).scrollTop() > 100) {
                            jQuery('#back-top').fadeIn();
                    } else {
                            jQuery('#back-top').fadeOut();
                    }
            });

            // scroll body to 0px on click
            jQuery('#back-top a').click(function () {
                    jQuery('body,html').animate({
                            scrollTop: 0
                    }, 800);
                    return false;
            });
    });


});



