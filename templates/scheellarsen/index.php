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
<div id="page">
    <header class="clearfix">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container relative">
            <a class="navbar-brand" href=""><img src="<?php echo $tmpl;?>img/logo.png" alt="logo"></a>
            <div class="w_info clearfix">
            
              {module Information}
              
              <form class="navbar-form navbar-left relative" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Hvad søger du efter ...">
                </div>
                <button type="submit" class="btnSearch">Submit</button>
              </form>
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
                    {module Top Menu}
                <!--<ul class="nav navbar-nav">
                  <li class="active"><a href="index.php">Forside</a></li>
                  <li><a href="product.php">Produkter</a>
                    <div class="sub clearfix">
                      <ul>
                        <h4>• 1000 KRUKKER</h4>
                        <li><a href="#">Italienske</a></li>
                        <li><a href="#">Krukker antique</a></li>
                        <li><a href="#">Krukker romantic</a></li>
                        <li><a href="#">Krukker classic</a></li>
                        <li><a href="#">Beton & terrazzo</a></li>
                        <li><a href="#">Afrikanske potter</a></li>
                        <li><a href="#">Pynt til haven</a></li>
                      </ul>
                      <ul>
                        <h4>• PARASOL/PAVILLION ETC.</h4>
                        <li><a href="#">Parasoller</a></li>
                        <li><a href="#">Pavillioner</a></li>
                        <li><a href="#">Parasolfødder</a></li>
                        <li><a href="#">Parasol cover</a></li>
                      </ul>
                      <ul>
                        <h4>• HAVEMØBLER</h4>
                        <li><a href="#">Havemøbelsæt </a></li>
                        <li><a href="#">Bænke </a></li>
                        <li><a href="#">Stole & chaiselong's </a></li>
                        <li><a href="#">Borde </a></li>
                        <li><a href="#">Loungemøbler </a></li>
                        <li><a href="#">Solvogne & dækstole </a></li>
                        <li><a href="#">Hyndebokse </a></li>
                        <li><a href="#">Hynder </a></li>
                        <li><a href="#">Cover</a></li>
                      </ul>
                      <ul>
                        <h4>• CANE-LINE</h4>
                        <li><a href="#">Diningsæt </a></li>
                        <li><a href="#">Borde </a></li>
                        <li><a href="#">Stole </a></li>
                        <li><a href="#">Loungesæt </a></li>
                        <li><a href="#">Sunlounge </a></li>
                        <li><a href="#">Accessories </a></li>
                        <li><a href="#">Hynder </a></li>
                        <li><a href="#">Parasoller & cover</a></li>
                      </ul>
                      <ul>
                        <h4>• MOSAIK & SMEDEJERN</h4>
                        <h4>• ACCESSORIES TIL HAVEN</h4>
                        <li><a href="#">Lanterner og lys </a></li>
                        <li><a href="#">Bålfade etc</a></li>
                        <h4>• SKIND</h4>
                        <h4>• HAVEBEHOLDERE</h4>
                        <h4>• GAVEKORT</h4>
                      </ul>
                    </div>
                  </li>
                  <li><a href="about.php">om scheel-larsen</a></li>
                  <li><a href="info.php">info</a></li>
                  <li><a href="terms.php">Handelsbetingelser</a></li>
                  <li><a href="contact.php">kontakt</a></li>
                </ul>-->
              </div>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    </header>
    <section class="main mt190">
        <div class="container">
            <div class="main_left clearfix">
            
            
                <div class="category clearfix">
                    <h2><img src="<?php echo $tmpl;?>img/title_cate.png" alt=""></h2>
                    <ul class="cate">
                        <li><a href="product.php">1000 KRUKKER</a></li>
                        <li><a href="#">PARASOL/PAVILLION ETC.</a></li>
                        <li><a href="#">HAVEMØBLER</a></li>
                        <li><a href="product_.php">CANE-LINE</a></li>
                        <li><a href="#">MOSAIK & SMEDEJERN</a></li>
                        <li><a href="#">ACCESSORIES TIL HAVEN</a></li>
                        <li><a href="#">SKIND</a></li>
                        <li><a href="#">HAVEBEHOLDERE</a></li>
                        <li><a href="#">GAVEKORT</a></li>
                    </ul>
                </div>
                <div class="havebeholder clearfix">
                    <h2><img src="<?php echo $tmpl;?>img/title_haveb.png" alt=""></h2>
                    <h4>• Ved køb af 1stk.</h4>
                    <p>190 liter – 750 kr.<br>
                        240 liter – 850 kr.<br>
                        Inkl. moms og lev.</p>
                    <h4>• Ved køb af 2 stk.</h4>
                    <p>190 liter – 1300 kr.<br>
                        240 liter – 1500 kr.</p>
                    <a class="btnseemore" href="#"><span class="fl">SE MERE</span> <b class="icon_right"></b></a>
                </div>
                <div class="cane">
                    <h2><img src="<?php echo $tmpl;?>img/title_cane.png" alt=""></h2>
                    <div class="cane_img"> <a href="#"><img src="<?php echo $tmpl;?>img/img03.jpg" alt=""></a> </div>
                </div>
                <div class="nature">
                    <h2><img src="<?php echo $tmpl;?>img/title_natures.png" alt=""></h2>
                    <div class="nature_img"> <a href="#"><img src="<?php echo $tmpl;?>img/img05.jpg" alt=""></a> </div>
                </div>
                <div class="face_dev"> <img src="<?php echo $tmpl;?>img/face_dev.jpg" alt=""> </div>
                

            </div>
            <div class="main_right">
                <div class="banner">
                    <div class="html_carousel">
                        <div class="shawdow-banner"></div>
                        <div id="foo1">
                            <div class="slide"> <img src="<?php echo $tmpl;?>img/slider01.jpg" alt="" /> </div>
                            <div class="slide"> <img src="<?php echo $tmpl;?>img/slider02.jpg" alt="" /> </div>
                            <div class="slide"> <img src="<?php echo $tmpl;?>img/slider03.jpg" alt="" /> </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="news">
                    <h1> Vi holder Ferielukket<br>
                        fra lørdag d. 7. til mandag d. 22. september 2013</h1>
                    <p>(vi kan selvfølgelig træffes på email: info@scheel-larsen.dk)<br>
                        Loungemøbler, Luksus stole i polyrattan, Haveborde, Parasoller, flere hundrede Frostsikre Krukker, Lamme- og<br>
                        Renskind og meget mere (5.000 kvm. udendørsudstilling)</p>
                    <p>Åbent: Tirsdag-fredag, kl. 14.00-20.00 - lørdag, søn- og helligdage, kl. 10.00-16.00.<br>
                        (Ferielukket fra 7. september - 22. september 2013)</p>
                </div>
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
                </div>
            </div>
        </div>
    </section>
    
    
    <section class="delivery">
        <div class="container">
            <ul>
                <li>
                    <div class="icon_delivery"> <img class="mt5" src="<?php echo $tmpl;?>img/icon_struck.png" alt=""> </div>
                    <div class="fl">
                        <h4>GRATIS LEVERING PÅ SJÆLLAND</h4>
                        <p>Fri fragt ved køb over 1.000 DKK</p>
                    </div>
                </li>
                <li>
                    <div class="icon_delivery"> <img src="<?php echo $tmpl;?>img/icon_returns.png" alt=""> </div>
                    <div class="fl">
                        <h4>Fortrydelsesret</h4>
                        <p>14 dages fortrydelsesret</p>
                    </div>
                </li>
                <li>
                    <div class="icon_delivery"> <img src="<?php echo $tmpl;?>img/icon_Leveringstid.png" alt=""> </div>
                    <div class="fl">
                        <h4>Leveringstid</h4>
                        <p>Levering 1-5 hverdage</p>
                    </div>
                </li>
                <li>
                    <div class="icon_delivery"> <img src="<?php echo $tmpl;?>img/icon_Viabill.png" alt=""> </div>
                    <div class="fl">
                        <h4>Viabill Faktura</h4>
                        <p>køb nu og betal senere</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>



    <footer>
        <div id="f_map" class="reveal-modal">
            <div class="f_map clearfix"> <img src="<?php echo $tmpl;?>img/map2.jpg" alt=""> </div>
            <a id="close-reveal-modal" class="close-reveal-modal"></a> </div>
        <div class="footer_top clearfix">
            <div class="container">
                <div class="footer_top_content clearfix">
                    <div class="contact_info">
                        <h3 class="bor_bottom0"><a data-reveal-id="f_map" href="#"><img src="<?php echo $tmpl;?>img/title_find_os.png" alt=""></a></h3>
                        <p>Have- & Havemøbler ApS<br>
                            Hesselrødvej 26, Karlebo<br>
                            2980 Kokkedal<br>
                            Mobil: 41628001<br>
                            Email: <a href="mailto:info@scheel-larsen.dk">info@scheel-larsen.dk</a><br>
                            CVR 30711912</p>
                    </div>
                    <div class="cate_list">
                        <h3>Kategorier</h3>
                        <ul>
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
                        </ul>
                    </div>
                    
                    <div class="sitemap_list">
                        <h3>Betingelser & Vilkår</h3>
                        <ul>
                            <li><a href="contact.php">Kontakt</a></li>
                            <li><a href="info.php">Info</a></li>
                            <li><a href="terms.php">Handelsbetingelser</a></li>
                        </ul>
                    </div>
                    
                </div>
                <div class="newsletter clearfix">
                    <div class="w485 fl">
                        <p>TILMELD DIG VORES NYHEDSBREV OG FÅ GODE TILBUD OG NYHEDER <br>
                            VI UDSENDER NYHEDSBREV 1-2 GANGE OM MÅNEDEN!</p>
                    </div>
                    <div class="w430 fr mt5">
                        <input type="text" placeholder="Indtast din e-mail" class="fl">
                        <a class="btnSubscribe btn2 fl ml5" href="#">Tilmeld</a> </div>
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