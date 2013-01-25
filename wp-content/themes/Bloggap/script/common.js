 jQuery(function(){
    var opts = {
    lines: 9, // The number of lines to draw
    length: 6, // The length of each line
    width: 2, // The line thickness
    radius: 5, // The radius of the inner circle
    corners: 0.4, // Corner roundness (0..1)
    rotate: 0, // The rotation offset
    color: '#FFF', // #rgb or #rrggbb
    speed: 1, // Rounds per second
    trail: 60, // Afterglow percentage
    shadow: true, // Whether to render a shadow
    hwaccel: false, // Whether to use hardware acceleration
    className: 'spinner', // The CSS class to assign to the spinner
    zIndex: 2e9, // The z-index (defaults to 2000000000)
    top: 'auto', // Top position relative to parent in px
    left: 'auto' // Left position relative to parent in px
  };
  var target = document.getElementById('portfolio-loader');
  var spinner = new Spinner(opts).spin(target);
})




jQuery(document).ready(function($){



    // nav
    $(".button-menu a").click(function(){
        $(".nav").slideToggle("slow");
        $(".nav").removeClass("active-nav");
    });



    //LOAD ISOTOPE
    var container = jQuery('.gallery-images-content');
    jQuery(container).imagesLoaded(function(){
        jQuery('.portfolio-loader').attr('style', 'display:none');
        jQuery(container).show().animate({opacity:1},1000);
        jQuery('.gallery-images-content').show();
        jQuery(container).isotope({
            layoutMode : 'fitRows' ,
            itemSelector: '.gallery-images-one',
            isAnimated: true,
            animationEngine : 'jquery',
            animationOptions: {
                duration: 800,
                easing: 'easeOutCubic',
                queue: false
            }
        });
    });

    jQuery('.gallery-filter ul a').click(function(){
        var selector = jQuery(this).attr('data-filter');
        jQuery(container).isotope({filter: selector});
        return false;
    });

    jQuery(container).imagesLoaded(function(){
        jQuery('#portfolio-loader').attr('style', 'display:none');
        jQuery('.gallery-images-one img').attr('style', 'display:inline-block');
    });

    jQuery(container).imagesLoaded(function(){
        jQuery('#portfolio-loader').attr('style', 'display:none');
        jQuery('.blog-images img').attr('style', 'display:inline-block');
    });




/*

    //MENU
    jQuery('ul.sf-menu').superfish({
            animation:   {opacity:'show',height:'show', delay:50}
    });
*/


                   
    jQuery('.flexslider').flexslider({
           pauseOnHover:true,
           slideshow: false,
           useCSS: false
    });



    //AUDIO
    jQuery("#jquery_jplayer_1").jPlayer({
        ready: function (event) {
                jQuery(this).jPlayer("setMedia", {
                        m4a:"http://www.jplayer.org/audio/m4a/TSP-01-Cro_magnon_man.m4a",
                        oga:"http://www.jplayer.org/audio/ogg/TSP-01-Cro_magnon_man.ogg"
                });
        },
        swfPath: "js",
        supplied: "m4a, oga",
        wmode: "window"
    });



    // HOVER-IMAGES
    jQuery('.gallery-images-one, .blog-images').hover(function(){
       jQuery('.gallery-hover',this).stop().animate({opacity:1},300);
       jQuery('.gallery-hover',this).css("display","block");
       jQuery('.gallery-hover-title',this).stop().animate({top: '20%'},300);
       jQuery('.gallery-hover-icon',this).stop().animate({bottom: '20%'},300);
    },function(){
       jQuery('.gallery-hover',this).stop().animate({opacity:0},300);
       jQuery('.gallery-hover-title',this).stop().animate({top: '-15%'},500);
       jQuery('.gallery-hover-icon',this).stop().animate({bottom: '-15%'},500);
       jQuery('.gallery-hover',this).fadeOut(300);
    });




   //PANEL SLIDER
    jQuery(".btn-slide").click(function(){
    var getclass = jQuery(this).attr('class').split(' ')[1];

    if(getclass !=='active') {
         jQuery('html, body').animate({
                    scrollTop: jQuery(".footer").offset().top
         }, 500);
    }


        jQuery("#panel").slideToggle("slow");
        jQuery(this).toggleClass("active"); return false;
    });





    // toggle box
    jQuery(".toggle-boxes ul li").click(function(){
        if (jQuery("h6",this).hasClass('active-togle-img')){
            jQuery("h6",this).removeClass('active-togle-img');
        } else if (jQuery("h6",this).hasClass('') || jQuery("h6",this).hasClass('no-active-togle-img')){
            jQuery("h6",this).addClass('active-togle-img');
        }
        jQuery("p",this).slideToggle("slow");
        jQuery("p",this).removeClass("no-active-togle");
    });






jQuery(".fancybox").fancybox({
    helpers:  {
        title:  null
    }
});

jQuery(".video").click(function() {

    jQuery.fancybox({

                    'padding' : 0,
                    'autoScale' : false,
                    'transitionIn': 'none',
                    'transitionOut' : 'none',
                    'title' : this.title,
                    'width' : 680,
                    'height' : 495,
                    'href': this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
                    'type': 'swf',
                    'swf': {
                        'wmode': 'transparent',
                        'allowfullscreen': 'true'
                        }
        });

	return false;
});

    jQuery(".vimeo").click(function() {
        jQuery.fancybox({
            'padding': 0,
            'autoScale': false,
            'transitionIn': 'none',
            'transitionOut'	: 'none',
            'title':  this.title,
            'width': 520,
            'height': 300,
            'href': this.href.replace(new RegExp("([0-9])","i"),'moogaloop.swf?clip_id=$1'),
            'type': 'swf'
        });

        return false;
    });




    jQuery('.gallery-filter a').each(function(){
        jQuery(this).click(function(){
           jQuery('.gallery-filter a').each(function(){
             jQuery(this).removeClass('active-project');
       });
            jQuery(this).addClass('active-project');
        });
    });



var windowheight = jQuery(window).height();


jQuery('.scroll').attr('style', 'max-height:'+ windowheight+'px');
jQuery('.content').attr('style', 'min-height:'+windowheight+'px;');

jQuery('.nav ul li').has('.sub-menu').addClass('has_children');

jQuery('.has_children').prepend('<div class="submenu-hover closed"></a>');



    
  var browserwidth =  jQuery(document).width();

  jQuery(window).resize(function() {
          if(browserwidth > 1013) {
              jQuery('.nav ul .closed').removeClass('closed');
          } else {
              jQuery('.nav ul .submenu-hover').addClass('closed');
          }
  });


      
        jQuery('.nav ul .closed').click(function() {
            jQuery(this).toggleClass("activedrop");
            jQuery(this).siblings('.sub-menu').slideToggle('slow', function() {
                // Animation complete.
            });
        });
    

jQuery('.current-menu-item').parents('.sub-menu').attr('style', 'display:block;');









});



