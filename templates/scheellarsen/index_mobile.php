<?php
// No direct access.
defined('_JEXEC') or die; 

$tmpl = JURI::base().'templates/'.$this->template."/";
$mobile = $tmpl."mobile/";
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
              <!--<input class="txtip" placeholder="Hvad søger du efter ..."> <a href="#"><img src="<?php echo $mobile;?>img/iconSearch.png"></a>-->
              
              </div>		 
              <a class="btnShopbag" href="cart.php"> <img src="<?php echo $mobile;?>img/btnShopbag.png">  <span class="nummber">3</span></a>
              <a href="#menu-left" class="bntMenuleft"><img src="<?php echo $mobile;?>img/bntMenuleft.png"></a>
          </div><!--headright-->  
        </div> 
        
        <div id="ppMap" style="display: none;">
            <div class="wrap-pp wrapMap">
                 <img class="imgMap_demo" src="<?php echo $mobile;?>img/map-mobile.jpg"> 
            </div><!--wrap-cartcredit-->  
        </div><!--ppCartcredit-->
      <!--#header-->
      
      <div id="content" class="w-content">
        <div class="eachBox banner-box clearfix">
              <div id="banner" class="clearfix">
                <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
                      <div data-src="<?php echo $mobile;?>img/slider01.jpg"> </div>
                      <div data-src="<?php echo $mobile;?>img/slider02.jpg"> </div>
                      <div data-src="<?php echo $mobile;?>img/slider03.jpg"> </div>
                  </div>
                <!-- #camera_wrap_1 --> 
            </div>
              <!--#banner--> 
          </div>
        <!--.banner-box-->
        
        <div class="eachBox news">
              <h1> Vi holder Ferielukket<br>
                fra lørdag d. 7. til mandag d. 22. september 2013</h1>
              <p>(vi kan selvfølgelig træffes på email: info@scheel-larsen.dk)<br>
                Loungemøbler, Luksus stole i polyrattan, Haveborde, Parasoller, flere hundrede Frostsikre Krukker, Lamme- og<br>
                Renskind og meget mere (5.000 kvm. udendørsudstilling)</p>
              <p>Åbent: Tirsdag-fredag, kl. 14.00-20.00 - lørdag, søn- og helligdage, kl. 10.00-16.00.<br>
                (Ferielukket fra 7. september - 22. september 2013)</p>
          </div>
        <!--discount-stt-->
        
        <div class="eachBox wrap-list-prod clearfix">
              <h2>udvalgte produkter</h2>
              <ul class="listProd clearfix">
                <li>
                      <div class="img_main"> <a href="product_detail.php"><img src="<?php echo $mobile;?>img/img01.jpg" alt=""></a> </div>
                      <h3>Diamond Loungestol Hvid Tex®</h3>
                      <p class="price_before">Førpris: 529 DKK</p>
                      <p class="price_sale">(De sparer: 50 DKK) </p>
                      <h4>479 DKK</h4>
                      <a class="btnMore btn2" href="product_detail.php">Vis detaljer</a> </li>
                <li>
                      <div class="img_main"> <a href="product_detail_out_of_stock.php"><img src="<?php echo $mobile;?>img/img02.jpg" alt=""></a> </div>
                      <h3>Diamond Loungestol Hvid Tex®</h3>
                      <p class="price_before">Førpris: 529 DKK</p>
                      <p class="price_sale">(De sparer: 50 DKK) </p>
                      <h4>479 DKK</h4>
                      <a class="btnMore btn2" href="product_detail.php">Vis detaljer</a> </li>
                <li>
                      <div class="img_main"> <a href="product_detail.php"><img src="<?php echo $mobile;?>img/img01.jpg" alt=""></a> </div>
                      <h3>Diamond Loungestol Hvid Tex®</h3>
                      <p class="price_before">Førpris: 529 DKK</p>
                      <p class="price_sale">(De sparer: 50 DKK) </p>
                      <h4>479 DKK</h4>
                      <a class="btnMore btn2" href="product_detail.php">Vis detaljer</a> </li>
                <li>
                      <div class="img_main"> <a href="product_detail_out_of_stock.php"><img src="<?php echo $mobile;?>img/img02.jpg" alt=""></a> </div>
                      <h3>Diamond Loungestol Hvid Tex®</h3>
                      <p class="price_before"> </p>
                      <p class="price_sale"> </p>
                      <h4>479 DKK</h4>
                      <a class="btnMore btn2" href="product_detail_out_of_stock.php">Vis detaljer</a> </li>
                <li>
                      <div class="img_main"> <a href="product_detail.php"><img src="<?php echo $mobile;?>img/img01.jpg" alt=""></a> </div>
                      <h3>Diamond Loungestol Hvid Tex®</h3>
                      <p class="price_before">Førpris: 529 DKK</p>
                      <p class="price_sale">(De sparer: 50 DKK) </p>
                      <h4>479 DKK</h4>
                      <a class="btnMore btn2" href="product_detail.php">Vis detaljer</a> </li>
                <li>
                      <div class="img_main"> <a href="product_detail_out_of_stock.php"><img src="<?php echo $mobile;?>img/img02.jpg" alt=""></a> </div>
                      <h3>Diamond Loungestol Hvid Tex®</h3>
                      <p class="price_before">Førpris: 529 DKK</p>
                      <p class="price_sale">(De sparer: 50 DKK) </p>
                      <h4>479 DKK</h4>
                      <a class="btnMore btn2" href="product_detail.php">Vis detaljer</a> </li>
            </ul>
          </div>
        <!--eachBox wrap-list-prod-->
        
        <div class="eachBox  box_gavekort"> <a href="gavekort.html"><img src="<?php echo $mobile;?>img/gavekort.png"></a> </div>
        
            <div class="eachBox">
                <ul class="list-bn">
                    <li><a href="cane-line.html"><img src="<?php echo $mobile;?>img/image01.jpg"></a></li>
                    <li><a href="skind.html"><img src="<?php echo $mobile;?>img/image02.jpg"></a></li>
                </ul>
            </div>
            
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
        </div><!--eachBox wrap-list-serviecs--> 
        
        
        <div id="footer"> 
            <div class="eachBox links bottom-link">        
                <div class="col col-1">
                    <div class="fakebtn"><a href="#ppMap" class="fancybox"> <span><img src="<?php echo $mobile;?>img/iconHome.png"></span>Find os her !</a></div>
                    <p>Krukker & Havemøbler ApS<br>
                    Hesselrødvej 26, Karlebo<br>
                    2980 Kokkedal<br>
                    Mobil: 41628001<br>
                    Email: info@scheel-larsen.dk<br>
                    CVR 30711912</p> 

                </div> <!--col-1--> 
                <div class="col col-2">  
                    <h3>PRODUKTER</h6>
                    <ul class="list-brand">
                        <li><a href="product.php">1000 krukker</a></li>
                        <li><a href="product.php">Parasol/pavillion etc.</a></li>
                        <li><a href="product.php">Havemøbler</a></li>
                        <li><a href="product_.php">Cane-line</a></li>  
                        <li><a href="product.php">Mosaik & smedejern</a></li>  
                        <li><a href="product.php">Accessories til haven</a></li>
                        <li><a href="product.php">Skind</a></li>
                        <li><a href="product.php">Havebeholdere</a></li>
                        <li><a href="product.php">Gavekort</a></li>
                    </ul> 
                </div>    <!--col-2--> 
                <div class="col col-3">
                    <h3>Betingelser & Vilkår</h3>
                    <ul class="list-brand">
                        <li><a href="contact.php">Kontakt os</a></li>
                        <li><a href="info.php">Info</a></li> 
                        <li><a href="terms.php">Handelsbetingelser</a></li>  
                    </ul> 
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
                    <input class="txtInput" placeholder="Indtast din e-mail">
                    <a class="btn2 btnSubscribe" href="#">Tilmeld</a>
                </div>
            </div><!--eachBox newsletter--> 
        
            <div class="eachBox bottom-footer">  
               <p>Copyright © 2013 <a href="scheel-Larsen.dk">Scheel-Larsen.dk</a>. All rights reserved <br> Design af <a href="#" target="_blank">My Web Creations </a></p>
            </div><!--eachBox bottom-footer--> 
        </div><!--End #footer-->
        

    </div>
      <!--End #content-->
      
      
        <nav id="menu-left">
            <div class="divWrapAll">
                <a href="index.php" class="divlogomn"><img src="<?php echo $mobile;?>img/logo_.png"></a>
                <div class="btnmn clearfix"><a href="#" class="btnMenu">MENU</a> <a href="#" class="btnCate">PRODUKTER</a></div>
                <ul class="ulMenu"> 
                    <li class="<?php if(isset($t) && $t == 1) echo 'menu_active'; ?>"><a href="om-os.php">OM SCHEEL-LARSEN </a> </li> 
                    <li class="<?php if(isset($t) && $t == 2) echo 'menu_active'; ?>"><a href="#ppMap" class="fancybox">FIND OS HER </a></li>  
                    <li class="<?php if(isset($t) && $t == 3) echo 'menu_active'; ?>"><a href="newsletter.php">NYHEDSBREV TILMELDING</a></li> 
                    <li class="<?php if(isset($t) && $t == 4) echo 'menu_active'; ?>"><a href="contact.php">KONTAKT</a></li>         
                </ul> 
                <ul class="ulCate">
                    <li><a href="product.php">1000 KRUKKER </a> </li> 
                    <li><a href="product.php">PARASOL/PAVILLION ETC.</a> </li>
                    <li><a href="product.php">HAVEMØBLER </a> </li>
                    <li><a href="product_.php">CANE-LINE </a> </li>
                    <li><a href="product.php">MOSAIK & SMEDEJERN </a></li>
                    <li><a href="product.php">ACCESSORIES TIL HAVEN </a> </li>
                    <li><a href="product.php">SKIND</a></li>
                    <li><a href="product.php">HAVEBEHOLDERE </a></li>
                    <li><a href="product.php">GAVEKORT</a></li>       
                </ul> 
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