<?php
// No direct access.
defined('_JEXEC') or die;
$tmpl = JURI::base().'templates/'.$this->template."/";
$session = JFactory::getSession();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <jdoc:include type="head" />
    
    <!-- Bootstrap -->
    <link href="<?php echo $tmpl;?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $tmpl;?>css/animate.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $tmpl;?>source/jquery.fancybox.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $tmpl;?>source/helpers/jquery.fancybox-buttons.css"/>
    <link href="<?php echo $tmpl;?>css/reveal.css" rel="stylesheet">
    <link href="<?php echo $tmpl;?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo $tmpl;?>css/tinyscrollbar.css" rel="stylesheet">
    
    <link href="<?php echo $tmpl;?>css/style.css" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="icon" href="<?php echo $tmpl;?>favicon.ico">
    
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo $tmpl;?>js/jquery-1.9.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $tmpl;?>js/jquery.js"></script>
    <script src="<?php echo $tmpl;?>js/bootstrap.min.js"></script>
    <script src="<?php echo $tmpl;?>js/jquery.carouFredSel-6.2.1-packed.js"></script>
    <script src="<?php echo $tmpl;?>js/jquery.reveal.js"></script>
    <script src="<?php echo $tmpl;?>source/jquery.fancybox.pack.js"></script>
    <script src="<?php echo $tmpl;?>source/helpers/jquery.fancybox-buttons.js"></script>
    <script src="<?php echo $tmpl;?>source/helpers/jquery.fancybox-media.js"></script>
    <script src="<?php echo $tmpl;?>source/helpers/jquery.fancybox-thumbs.js"></script>
    <script src="<?php echo $tmpl;?>js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo $tmpl;?>js/jquery.tinyscrollbar.js"></script>
    <script src="<?php echo $tmpl;?>js/nicker.js"></script>
</head>
<body>
<div id="page" class="bg_black">
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/da_DK/sdk.js#xfbml=1&appId=176427392509007&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
    <header class="clearfix">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container relative">
            <a class="navbar-brand" href=""><img src="<?php echo $tmpl;?>img/logo.png" alt="logo"></a>
            <div class="w_info clearfix">
            
              {module Information}
              {module Search product}
              
            </div>
    
            <div class="w_cart">
              <img src="<?php echo $tmpl;?>img/cart.png" alt="">
              <div id="bg-cart"></div>
              <div class="cart_content clearfix">
                <a class="img-cart clearfix hover" href="#">
                  <img src="<?php echo $tmpl;?>img/icon_cart.png" alt="">
                  <p class="fl"><span>3 STK =</span><span>Total: 1.916 DKK</span></p>
                  <p class="icon_down"></p>
                </a>
                <div class="list-cart"> 
                  <a href="#" id="btnClose-cart" class="bntClose2"></a>
                  <div class="title clearfix">
                    <span class="w420">Varebeskrivelse</span>
                    <span class="w105 ml45">Antal</span>
                    <span class="w105">Pris pr stk.</span>
                    <span>Pris i alt</span>
                  </div>
    
                  <div id="scrollbar1">
                    <div class="scrollbar">
                      <div class="track">
                        <div class="thumb">
                          <div class="end"></div>
                        </div>
                      </div>
                    </div>
                    <div class="viewport">
                      <div class="overview">
                        <ul id="list-item" class="clearfix">
                          <li class="clearfix">
                            <div class="list-cart-img"><a href="#"><img src="<?php echo $tmpl;?>img/img04.jpg" alt=""/></a></div>
                            <div class="list-cart-content">
                              <h4>LUCIE ANTIQUE TERRACOTTA</h4>
                              <p>Vare-nummer: 30283</p>
                              <p>Størrelse: Højde 21 cm-Ø27 cm</p>
                              <p>BORDPLADE 50X60 CM, HVID MATTERET HÆRDET GLAS</p>
                            </div>
                            <div class="count">
                               <p>1</p>
                            </div>
                            <p class="price">479 DKK</p>
                            <p class="price3">479 DKK</p>
                            <a class="btnClose" href="#">close</a>
                          </li>
                           <li class="clearfix">
                            <div class="list-cart-img"><a href="#"><img src="<?php echo $tmpl;?>img/img04.jpg" alt=""/></a></div>
                            <div class="list-cart-content">
                              <h4>LUCIE ANTIQUE TERRACOTTA</h4>
                              <p>Vare-nummer: 30283</p>
                              <p>Størrelse: Højde 21 cm-Ø27 cm</p>
                              <p>BORDPLADE 50X60 CM, HVID MATTERET HÆRDET GLAS</p>
                            </div>
                            <div class="count">
                               <p>1</p>
                            </div>
                            <p class="price">479 DKK</p>
                            <p class="price3">479 DKK</p>
                            <a class="btnClose" href="#">close</a>
                          </li>
                          <li class="clearfix">
                            <div class="list-cart-img"><a href="#"><img src="<?php echo $tmpl;?>img/img04.jpg" alt=""/></a></div>
                            <div class="list-cart-content">
                              <h4>LUCIE ANTIQUE TERRACOTTA</h4>
                              <p>Vare-nummer: 30283</p>
                              <p>Størrelse: Højde 21 cm-Ø27 cm</p>
                              <p>BORDPLADE 50X60 CM, HVID MATTERET HÆRDET GLAS</p>
                            </div>
                            <div class="count">
                               <p>1</p>
                            </div>
                            <p class="price">479 DKK</p>
                            <p class="price3">479 DKK</p>
                            <a class="btnClose" href="#">close</a>
                          </li>
                          <li class="clearfix">
                            <div class="list-cart-img"><a href="#"><img src="<?php echo $tmpl;?>img/img04.jpg" alt=""/></a></div>
                            <div class="list-cart-content">
                              <h4>LUCIE ANTIQUE TERRACOTTA</h4>
                              <p>Vare-nummer: 30283</p>
                               <p>Størrelse: Højde 21 cm-Ø27 cm</p>
                              <p>BORDPLADE 50X60 CM, HVID MATTERET HÆRDET GLAS</p>
                            </div>
                            <div class="count">
                               <p>1</p>
                            </div>
                            <p class="price">479 DKK</p>
                            <p class="price3">479 DKK</p>
                            <a class="btnClose" href="#">close</a>
                          </li>
                          <li class="clearfix">
                            <div class="list-cart-img"><a href="#"><img src="<?php echo $tmpl;?>img/img04.jpg" alt=""/></a></div>
                            <div class="list-cart-content">
                              <h4>LUCIE ANTIQUE TERRACOTTA</h4>
                              <p>Vare-nummer: 30283</p>
                               <p>Størrelse: Højde 21 cm-Ø27 cm</p>
                              <p>BORDPLADE 50X60 CM, HVID MATTERET HÆRDET GLAS</p>
                            </div>
                            <div class="count">
                               <p>1</p>
                            </div>
                            <p class="price">479 DKK</p>
                            <p class="price3">479 DKK</p>
                            <a class="btnClose" href="#">close</a>
                          </li>
                          <li class="clearfix">
                            <div class="list-cart-img"><a href="#"><img src="<?php echo $tmpl;?>img/img04.jpg" alt=""/></a></div>
                            <div class="list-cart-content">
                              <h4>LUCIE ANTIQUE TERRACOTTA</h4>
                              <p>Vare-nummer: 30283</p>
                               <p>Størrelse: Højde 21 cm-Ø27 cm</p>
                              <p>BORDPLADE 50X60 CM, HVID MATTERET HÆRDET GLAS</p>
                            </div>
                            <div class="count">
                               <p>1</p>
                            </div>
                            <p class="price">479 DKK</p>
                            <p class="price3">479 DKK</p>
                            <a class="btnClose" href="#">close</a>
                          </li>
                          <li class="clearfix">
                            <div class="list-cart-img"><a href="#"><img src="<?php echo $tmpl;?>img/img04.jpg" alt=""/></a></div>
                            <div class="list-cart-content">
                              <h4>LUCIE ANTIQUE TERRACOTTA</h4>
                              <p>Vare-nummer: 30283</p>
                               <p>Størrelse: Højde 21 cm-Ø27 cm</p>
                              <p>BORDPLADE 50X60 CM, HVID MATTERET HÆRDET GLAS</p>
                            </div>
                            <div class="count">
                               <p>1</p>
                            </div>
                            <p class="price">479 DKK</p>
                            <p class="price3">479 DKK</p>
                            <a class="btnClose" href="#">close</a>
                          </li>
                          <li class="clearfix">
                            <div class="list-cart-img"><a href="#"><img src="<?php echo $tmpl;?>img/img04.jpg" alt=""/></a></div>
                            <div class="list-cart-content">
                              <h4>LUCIE ANTIQUE TERRACOTTA</h4>
                              <p>Vare-nummer: 30283</p>
                               <p>Størrelse: Højde 21 cm-Ø27 cm</p>
                              <p>BORDPLADE 50X60 CM, HVID MATTERET HÆRDET GLAS</p>
                            </div>
                            <div class="count">
                              <p>1</p>
                            </div>
                            <p class="price">479 DKK</p>
                            <p class="price3">479 DKK</p>
                            <a class="btnClose" href="#">close</a>
                          </li>
                          <li class="clearfix">
                            <div class="list-cart-img"><a href="#"><img src="<?php echo $tmpl;?>img/img04.jpg" alt=""/></a></div>
                            <div class="list-cart-content">
                              <h4>LUCIE ANTIQUE TERRACOTTA</h4>
                              <p>Vare-nummer: 30283</p>
                               <p>Størrelse: Højde 21 cm-Ø27 cm</p>
                              <p>BORDPLADE 50X60 CM, HVID MATTERET HÆRDET GLAS</p>
                            </div>
                            <div class="count">
                              <!--<input type="text" placeholder="1">
                              <a class="btnAdd" href="#"><img src="img/icon_add.jpg" alt=""></a>
                              <a class="btnSub" href="#"><img src="img/icon_sub.jpg" alt=""></a>-->
                               <p>1</p>
                            </div>
                            <p class="price">479 DKK</p>
                            <p class="price3">479 DKK</p>
                            <a class="btnClose" href="#">close</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <!-- END SCROLLBAR -->
                  <div class="total clearfix">
                    <div class="info_ fl">
                      <ul>
                        <li>Ved køb af varer over 1.000 Dkk. hos Scheel-Larsen.dk leverer og samler vi GRATIS..! på hele Sjælland.</li>
                        <li>Ved køb under 1.000 kr. pålægges et fragtgebyr på 150 DKK.</li>
                        <li>Fragt til Jylland 350 DKK.</li>
                      </ul>
                    </div>
                    <div class="w345 fr">
                      <table>
                          <tr>
                            <td>Subtotal:</td>
                            <td width="40%">1.916 DKK</td>
                          </tr>
                          <tr>
                            <td>Heraf moms: </td>
                            <td>383,20 DKK</td>
                          </tr>
                          <tr>
                            <td><h4>total:</h4></td>
                            <td><h4>1.916 DKK</h4></td>
                          </tr>
                        </table>
                    </div>
                  </div>
                  <a class="bntCheckout btn2" href="checkout.php">GÅ TIL KASSEN</a>
                  <a class="bntBasket btn2" href="cart.php">SE VAREKURV</a>
                </div>
                <!--.list-cart--> 
              </div>
            </div>
          </div>
    
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
            </div>
    
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="container">
                    {module Category Menu}
                    {module Top Menu}
              </div>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    </header>
    <section class="main mt190">
        <div class="container">
            <div class="main_left clearfix">
                {module Left Category Menu}
                {modulepos left}
                <div class="fb-like-box" data-href="https://www.facebook.com/ScheelLarsen" data-width="220" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
                

            </div>
            <div class="main_right">
                <jdoc:include type="component" />
                <!--

                <div class="products">
                    <h2><img src="<?php echo $tmpl;?>img/title_product.png" alt=""></h2>
                    <a class="btn_seeAll" href="product2.php"><span class="fl">Se alle</span> <b class="icon_right"></b></a>
                    <ul class="clearfix">
                        <li>
                            <div class="img_main"> <a href="#"><img src="<?php echo $tmpl;?>img/img01.jpg" alt=""></a> </div>
                            <h3>Diamond Loungestol Hvid Tex®</h3>
                            <p class="price_before">Førpris: 529 DKK</p>
                            <p class="price_sale">(De sparer: 50 DKK) </p>
                            <h4>479 DKK</h4>
                            <div class="pro-larg animated clearfix">
                                <div class="img_main"> <a href="product_detail.php"><img src="<?php echo $tmpl;?>img/img01.jpg" alt=""></a> </div>
                                <h3>Diamond Loungestol Hvid Tex®</h3>
                                <p class="no_number">Vare-nummer: 30283</p>
                                <p class="price_before">Førpris: 529 DKK</p>
                                <p class="price_sale">(De sparer: 50 DKK) </p>
                                <h4>479 DKK</h4>
                                <a class="btnMore btn2" href="product_detail.php">Vis detaljer</a> </div>
                        </li>
                        <li>
                            <div class="img_main"> <a href="#"><img src="<?php echo $tmpl;?>img/img02.jpg" alt=""></a> </div>
                            <h3>Diamond 2-pers. sofa Hvid Tex®</h3>
                            <p class="price_before">Førpris: 529 DKK</p>
                            <p class="price_sale">(De sparer: 50 DKK) </p>
                            <h4>479 DKK</h4>
                            <div class="pro-larg animated clearfix">
                                <div class="img_main"> <a href="product_detail.php"><img src="<?php echo $tmpl;?>img/img01.jpg" alt=""></a> </div>
                                <h3>Diamond 2-pers. sofa Hvid Tex®</h3>
                                <p class="no_number">Vare-nummer: 30283</p>
                                <p class="price_before">Førpris: 529 DKK</p>
                                <p class="price_sale">(De sparer: 50 DKK) </p>
                                <h4>479 DKK</h4>
                                <a class="btnMore btn2" href="product_detail.php">Vis detaljer</a> </div>
                        </li>
                        <li>
                            <div class="img_main"> <a href="#"><img src="<?php echo $tmpl;?>img/img01.jpg" alt=""></a> </div>
                            <h3>Diamond 3-pers. sofa Hvid Tex®</h3>
                            <p class="price_before">Førpris: 529 DKK</p>
                            <p class="price_sale">(De sparer: 50 DKK) </p>
                            <h4>479 DKK</h4>
                            <div class="pro-larg animated clearfix">
                                <div class="img_main"> <a href="product_detail.php"><img src="<?php echo $tmpl;?>img/img01.jpg" alt=""></a> </div>
                                <h3>Diamond 3-pers. sofa Hvid Tex®</h3>
                                <p class="no_number">Vare-nummer: 30283</p>
                                <p class="price_before">Førpris: 529 DKK</p>
                                <p class="price_sale">(De sparer: 50 DKK) </p>
                                <h4>479 DKK</h4>
                                <a class="btnMore btn2" href="product_detail.php">Vis detaljer</a> </div>
                        </li>
                    </ul>
                    <h2><img src="<?php echo $tmpl;?>img/title_design.png" alt=""> <span>-  Feinsmeckeri i et usnobbet enkelt design af interiør og møbler. </span></h2>
                    <ul class="clearfix">
                        <li>
                            <div class="img_main"> <a href="product2.php"><img src="<?php echo $tmpl;?>img/img01.jpg" alt=""></a> </div>
                            <h3>ROCKEFELLER BORD</h3>
                        </li>
                        <li>
                            <div class="img_main"> <a href="product2.php"><img src="<?php echo $tmpl;?>img/img02.jpg" alt=""></a> </div>
                            <h3>OSAKA RECYCLED TEAK</h3>
                        </li>
                        <li>
                            <div class="img_main"> <a href="product2.php"><img src="<?php echo $tmpl;?>img/img01.jpg" alt=""></a> </div>
                            <h3>RECYCLED TEAK</h3>
                        </li>
                    </ul>
                </div>-->
            </div>
        </div>
    </section>
    <section class="delivery">
    {module Footer Information}
    </section>
    <footer>
        <div id="f_map" class="reveal-modal">
            <div class="f_map clearfix">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2235.3331502889896!2d12.431027599999998!3d55.9262623!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4652478c58c6b30d%3A0x882207eeab2b9c27!2zSGVzc2VscsO4ZHZlaiAyNiwgMjk4MCBLb2trZWRhbCwgxJBhbiBN4bqhY2g!5e0!3m2!1svi!2s!4v1407298529040" width="940" height="450" frameborder="0" style="border:0"></iframe>
            </div>
            <a id="close-reveal-modal" class="close-reveal-modal"></a> </div>
        <div class="footer_top clearfix">
            <div class="container">
                <div class="footer_top_content clearfix">
                    <div class="contact_info">
                        <h3 class="bor_bottom0"><a data-reveal-id="f_map" href="javascript:void(0);" class="btn_Findos"></a></h3>
                        {module Footer Information 2}
                    </div>
                    <div class="cate_list">
                        <h3>Kategorier</h3>
                        {module Footer Category Menu}
                        <!--<ul>
                            <li><a href="#">Potter fra italien</a></li>
                            <li><a href="#">Lam - Og rensdyrskind</a></li>
                            <li><a href="#">Design fra nardi</a></li>
                            <li><a href="#">Kruikker antique</a></li>
                            <li><a href="#">Havemøbelsæt</a></li>
                            <li><a href="#">Solvogne/Dækstole</a></li>
                            <li><a href="#">Kruikker romatic</a></li>
                            <li><a href="#">Den lille have/Altan</a></li>
                            <li><a href="#">Parasoller-/Fødder</a></li>
                            <li><a href="#">Kruikker classic</a></li>
                            <li><a href="#">Havestole og bænke</a></li>
                            <li><a href="#">Hynder/Hyndebokse</a></li>
                            <li><a href="#">Let beton/terrazzo</a></li>
                            <li><a href="#">Loungemøbler</a></li>
                            <li><a href="#">Covers</a></li>
                            <li><a href="#">Lanterner, bålfade...</a></li>
                            <li><a href="#">Muubs havemøbler MV.</a></li>
                        </ul>-->
                    </div>
                    
                    <div class="sitemap_list">
                        <h3>Betingelser & Vilkår</h3>
                        {module Bottom Menu}
                    </div>
                    
                </div>
                <div class="newsletter clearfix">
                    <div class="w485 fl">
                        <p>TILMELD DIG VORES NYHEDSBREV OG FÅ GODE TILBUD OG NYHEDER <br>
                            VI UDSENDER NYHEDSBREV 1-2 GANGE OM MÅNEDEN!</p>
                    </div>
                    <div class="w430 fr mt5">
                        <form action="index.php" method="post">
                            <input type="text" placeholder="Indtast din e-mail" class="fl">
                            <button type="submit" class="btnSubscribe btn2 fl ml5" style="cursor:pointer; border:none;">Tilmeld</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom clearfix">
            <div class="container">
                <p class="fl">Copyright © 2014 <a href="index.php">Scheel-Larsen.dk</a> . All rights reserved</p>
                <p class="fr">Design af <a target="_blank" href="http://www.mywebcreations.dk/">My Web Creations</a></p>
            </div>
        </div>
    </footer>
    
<?php if($session->get('notify') != 1){?>
<script language="javascript">
$(document).ready(function() {
    $(".btnCookie").click(function(event) {
        jQuery.post("<?php echo JURI::base().'index.php?option=com_virtuemart&controller=virtuemart&task=set_session'?>");
    });
});
</script>
    <div id="CookieInfo" class="CookieInfo">
        <div class="cookie-content">
            <p>Cookies er nødvendige for at få hjemmesiden til at fungere, men de gemmer også information om hvordan du bruger vores hjemmeside, så vi kan forbedre den både for dig og for andre. Cookies på denne hjemmeside bruges primært til trafikmåling og optimering af sidens indhold. Du kan forsætte med at bruge vores side som altid, hvis du accepterer at vi bruger cookies. Lær mere om hvordan du håndterer cookies på dine enheder.</p>
            <a class="btnCookie" href="javascript:void(0);">Luk</a> </div>
    </div>
<?php }?>
</div>
</body>
</html>