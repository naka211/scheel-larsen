<meta charset="utf-8">
    <link href="images/icon-fav.ico" rel="shortcut icon"/>
    <meta name="author" content="tho" /> 
    <title>Index</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/reset.css">  
	<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" /> 
    <link rel='stylesheet' id='camera-css' href='css/camera.css' type='text/css' media='all'>   
    <link type="text/css" rel="stylesheet" href="css/jquery.mmenu.css" /> 
    <link type="text/css" rel="stylesheet" href="css/styles-moblie.css" />     
  
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.5; user-scalable=1;" />    

  <script type='text/javascript' src="js/jquery-1.8.3.min.js"></script>  
  <!-- Add fancyBox --> 
  <script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
  <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $(".fancybox").fancybox();
      
      $('.fancybox-media')
        .attr('rel', 'media-gallery')
        .fancybox({
          openEffect : 'none',
          closeEffect : 'none',
          prevEffect : 'none',
          nextEffect : 'none',

          arrows : false,
          helpers : {
            media : {},
            buttons : {}
          }
        });

      $(".fancybox-big")
      .attr('rel-big', 'gallery')
      .fancybox({
          padding    : 0,
          margin     : 5,
          nextEffect : 'fade',
          prevEffect : 'none',
          autoCenter : false,
          afterLoad  : function () {
              $.extend(this, {
                  aspectRatio : false,
                  type    : 'html',
                  width   : '100%',
                  height  : '100%',
                  content : '<div class="fancybox-image" style="background-image:url(' + this.href + '); background-size: cover; background-position:50% 50%;background-repeat:no-repeat;height:100%;width:100%;" /></div>'
              });
          }
      });
    }); 

  </script>

    <!-- JS  MENU Top-Left jquery.mmenu.oncanvas.js-->
    <script type="text/javascript" src="js/jquery.mmenu.min.all.js"></script> 
    <script type="text/javascript">
     $(document).ready(function() {
        $("#menu-left").mmenu({ 
           offCanvas: {
              position  : "right" 
           }
        });
     });
  </script>;.
    <!-- JS  banner camera-->
    <script type='text/javascript' src='js/jquery.min.js'></script>
    <script type='text/javascript' src='js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='js/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='js/camera.js'></script>
    <script>
        jQuery(function(){            
            jQuery('#camera_wrap_1').camera({  
                thumbnails: false
            }); 
        });
    </script>  
     
    <script type='text/javascript' src='js/tho.js'> </script> 

   