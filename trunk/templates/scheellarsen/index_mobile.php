<?php
// No direct access.
defined('_JEXEC') or die; 

$tmpl = JURI::base().'templates/'.$this->template."/";
$mobile = $tmpl."mobile/";
JHtml::_('behavior.formvalidation');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <jdoc:include type="head" />

        <link href="<?php echo $tmpl;?>images/favicon.ico" rel="shortcut icon"/>
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo $mobile;?>css/reset.css">
        <link rel="stylesheet" href="<?php echo $mobile;?>fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <link rel='stylesheet' id='camera-css' href="<?php echo $mobile;?>css/camera.css" type='text/css' media='all'>
        <link type="text/css" rel="stylesheet" href="<?php echo $mobile;?>css/jquery.mmenu.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo $mobile;?>css/styles-moblie.css" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.5; user-scalable=1;" />
        <script type='text/javascript' src="<?php echo $mobile;?>js/jquery-1.8.3.min.js"></script>
        <!-- Add fancyBox -->
        <script type="text/javascript" src="<?php echo $mobile;?>fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
        <script type="text/javascript" src="<?php echo $mobile;?>fancybox/source/helpers/jquery.fancybox-media.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
			jQuery('.item-118').hide();
			jQuery(".item-132 a").attr("href","#ppMap");
			jQuery(".item-132 a").attr("class","fancybox");
			
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
        <script type="text/javascript" src="<?php echo $mobile;?>js/jquery.mmenu.min.all.js"></script>
        <script type="text/javascript">
         $(document).ready(function() {
            $("#menu-left").mmenu({ 
               offCanvas: {
                  position  : "right" 
               }
            });
         });
        </script>
        ;.
        <!-- JS  banner camera-->
        <script type='text/javascript' src='<?php echo $mobile;?>js/jquery.min.js'></script>
        <script type='text/javascript' src='<?php echo $mobile;?>js/jquery.mobile.customized.min.js'></script>
        <script type='text/javascript' src='<?php echo $mobile;?>js/jquery.easing.1.3.js'></script>
        <script type='text/javascript' src='<?php echo $mobile;?>js/camera.js'></script>
        <script>
            jQuery(function(){            
                jQuery('#camera_wrap_1').camera({  
                    thumbnails: false
                }); 
            });
        </script>
        <script type='text/javascript' src='<?php echo $mobile;?>js/tho.js'> </script>
    </head>
    <body>
    
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=176427392509007&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
    <div id="page"> 
      <!--Begin #header-->
        <div id="header" class="mm-fixed-top">
          <a href="index.php" class="logo"><img src="<?php echo $mobile;?>img/logo.png"></a>
          <div class="headright"> 
                <div class="wrapSearch">
                {module Search product}
                </div>		 
              <a class="btnShopbag" href="cart.php"> <img src="<?php echo $mobile;?>img/btnShopbag.png">  <span class="nummber">3</span></a>
              <a href="#menu-left" class="bntMenuleft"><img src="<?php echo $mobile;?>img/bntMenuleft.png"></a>
          </div><!--headright-->  
        </div> 
        
        <div id="ppMap" style="display: none;">
            <div class="wrap-pp wrapMap">
                 <!--<img class="imgMap_demo" src="<?php echo $mobile;?>img/map-mobile.jpg"> -->
                 <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2235.3331502889896!2d12.431027599999998!3d55.9262623!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4652478c58c6b30d%3A0x882207eeab2b9c27!2zSGVzc2VscsO4ZHZlaiAyNiwgMjk4MCBLb2trZWRhbCwgxJBhbiBN4bqhY2g!5e0!3m2!1svi!2s!4v1407298529040" width="600" height="400" frameborder="0" style="border:0"></iframe>
            </div><!--wrap-cartcredit-->  
        </div><!--ppCartcredit-->
      <!--#header-->
      	<jdoc:include type="component" />
      
            
         <div class="wrap-list-serviecs clearfix">
            <ul class="list-serviecs clearfix">
                <li>
                     <a href="#">
                        <img src="<?php echo $mobile;?>img/iconService01.png">
                        <h2>GRATIS LEVERING PÅ SJÆLLAND</h2>
                        <p>Fri fragt ved køb over 1.000 DKK</p>
                     </a>
                </li>
                <li>
                     <a href="#">
                        <img src="<?php echo $mobile;?>img/iconService02.png">
                        <h2>FORTRYDELSESRET</h2>
                        <p>14 dages fortrydelsesret</p>
                     </a>
                </li>
                 <li>
                     <a href="#">
                        <img src="<?php echo $mobile;?>img/iconService03.png">
                        <h2>LEVERINGSTID  </h2>
                        <p>Levering 1-5 hverdage</p>
                     </a>
                </li>
                 <li>
                     <a href="#">
                        <img src="<?php echo $mobile;?>img/iconService04.png">
                        <h2>Viabill Faktura</h2>
                        <p>Køb nu og betal senere</p>
                     </a>
                </li> 
            </ul>
        </div>
        
        <div id="footer"> 
            <div class="eachBox links bottom-link">        
                <div class="col col-1">
                    <div class="fakebtn"><a href="#ppMap" class="fancybox"> <span><img src="<?php echo $mobile;?>img/iconHome.png"></span>Find os her !</a></div>
                    {module Footer Information 2}

                </div> <!--col-1--> 
                <div class="col col-2">  
                    <h3>PRODUKTER</h6>
                    {module Footer Category Menu}
                </div>    <!--col-2--> 
                <div class="col col-3">
                    <h3>Betingelser & Vilkår</h3>
                    {module Bottom Menu}
                    <div class="img-cart"> <img src="<?php echo $mobile;?>img/cart-mb.png"></div> 
                </div> <!--col-3--> 
            </div><!--eachBox bottom-links--> 
            
            <div class="eachBox box_facebook">
                <div class="wrap-min-banner">
                    <div class="fb-like-box" data-href="https://www.facebook.com/ScheelLarsen" data-width="100%" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="false" data-show-border="true"></div>  
                </div>
            </div>
        
            <div class="eachBox newsletter clearfix">
                <p>TILMELD DIG VORES NYHEDSBREV OG FÅ GODE TILBUD OG NYHEDER VI UDSENDER NYHEDSBREV 1-2 GANGE OM MÅNEDEN!</p> 
                <div class="form-newsletter">
                	<form action="index.php" method="post" class="form-validate">
                        <input type="text" placeholder="Indtast din e-mail" class="txtInput required validate-email" name="email">
                        <button type="submit" class="btnSubscribe btn2" style="cursor:pointer; border:none;">Tilmeld</button>
                        <input type="hidden" name="option" value="com_virtuemart" />
                        <input type="hidden" name="controller" value="virtuemart" />
                        <input type="hidden" name="task" value="subscribe" />
                    </form>
                </div>
            </div><!--eachBox newsletter--> 
        
            <div class="eachBox bottom-footer">  
               <p>Copyright © 2014 <a href="index.php">Scheel-Larsen.dk</a>.</p>
            </div><!--eachBox bottom-footer--> 
        </div><!--End #footer-->
        

    </div>
      <!--End #content-->
      
      
        <nav id="menu-left">
            <div class="divWrapAll">
                <a href="index.php" class="divlogomn"><img src="<?php echo $mobile;?>img/logo_.png"></a>
                <div class="btnmn clearfix"><a href="javascript:void(0);" class="btnMenu">MENU</a> <a href="javascript:void(0);" class="btnCate">PRODUKTER</a></div>
                {module Top Menu}
                {module Category Menu}
                <!--<ul class="ulCate">
                    <li><a href="product.php">1000 KRUKKER </a> </li> 
                    <li><a href="product.php">PARASOL/PAVILLION ETC.</a> </li>
                    <li><a href="product.php">HAVEMØBLER </a> </li>
                    <li><a href="product_.php">CANE-LINE </a> </li>
                    <li><a href="product.php">MOSAIK & SMEDEJERN </a></li>
                    <li><a href="product.php">ACCESSORIES TIL HAVEN </a> </li>
                    <li><a href="product.php">SKIND</a></li>
                    <li><a href="product.php">HAVEBEHOLDERE </a></li>
                    <li><a href="product.php">GAVEKORT</a></li>       
                </ul> -->
            </div>
            
        </nav>  
        <script type="text/javascript">
            $(document).ready(function(){	
                $('.btnMenu').addClass("btnActive");	
                $('.ulCate').hide();
                $('.ulMenu').show();
                
                $('.btnMenu').click(function(){
                    $(this).addClass("btnActive");
                    $('.btnCate').removeClass("btnActive");	    	
                    $('.ulCate').hide();
                    $('.ulMenu').show();
                });
                
                $('.btnCate').click(function(){
                    $(this).addClass("btnActive");
                    $('.btnMenu').removeClass("btnActive");    	
                    $('.ulCate').show();
                    $('.ulMenu').hide();
                });
            });
        </script>


  </div>
<!--End #Page-->
</body>
</html>