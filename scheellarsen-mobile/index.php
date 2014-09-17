<!DOCTYPE html>
<html>
  <head>
      <?php require_once('head.php'); ?>  
  </head>
  <body>
    <div id="page">   
      <!--Begin #header-->
      <?php require_once('header.php'); ?> 
      <!--#header--> 
      
      <div id="content" class="w-content">  
          <div class="eachBox banner-box clearfix">
              <div id="banner" class="clearfix">  
                <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
                  <div data-src="img/slider01.jpg"> </div>
                  <div data-src="img/slider02.jpg"> </div>
                  <div data-src="img/slider03.jpg"> </div>             
                </div><!-- #camera_wrap_1 -->      
              </div> <!--#banner--> 
          </div><!--.banner-box-->

          <div class="eachBox news"> 
              <h1> Vi holder Ferielukket<br>fra lørdag d. 7. til mandag d. 22. september 2013</h1>
              <p>(vi kan selvfølgelig træffes på email: info@scheel-larsen.dk)<br>
Loungemøbler, Luksus stole i polyrattan, Haveborde, Parasoller, flere hundrede Frostsikre Krukker, Lamme- og<br> Renskind og meget mere (5.000 kvm. udendørsudstilling)</p>
              <p>Åbent: Tirsdag-fredag, kl. 14.00-20.00 - lørdag, søn- og helligdage, kl. 10.00-16.00.<br>(Ferielukket fra 7. september - 22. september 2013)</p>
             
          </div><!--discount-stt--> 

          <div class="eachBox wrap-list-prod clearfix">
                <h2>udvalgte produkter</h2>
                <ul class="listProd clearfix"> 
                     <li>
                        <div class="img_main">
                          <a href="product_detail.php"><img src="img/img01.jpg" alt=""></a>
                        </div> 
                        <h3>Diamond Loungestol Hvid Tex®</h3> 
                        <div class="wrap_price">
                            <p class="price_before">Førpris: 529 DKK</p>
                            <p class="price_sale">(De sparer: 50 DKK) </p>
                        </div><!--wrap_price-->
                        <h4>479 DKK</h4>
                        <a class="btnMore btn2" href="product_detail.php">Vis detaljer</a>
                    </li>
                     <li>
                        <div class="img_main">
                          <a href="product_detail_out_of_stock.php"><img src="img/img02.jpg" alt=""></a>
                        </div> 
                        <h3>Diamond Loungestol Hvid Tex®</h3> 
                         <div class="wrap_price">
                            <p class="price_before">Førpris: 529 DKK</p>
                            <p class="price_sale">(De sparer: 50 DKK) </p>
                        </div><!--wrap_price-->
                        <h4>479 DKK</h4>
                        <a class="btnMore btn2" href="product_detail.php">Vis detaljer</a>
                    </li> 

                    <li>
                        <div class="img_main">
                          <a href="product_detail.php"><img src="img/img01.jpg" alt=""></a>
                        </div> 
                        <h3>Diamond Loungestol Hvid Tex®</h3> 
                        <div class="wrap_price"> 
                        </div><!--wrap_price-->
                        <h4>479 DKK</h4>
                        <a class="btnMore btn2" href="product_detail.php">Vis detaljer</a>
                    </li>
                     <li>
                        <div class="img_main">
                          <a href="product_detail_out_of_stock.php"><img src="img/img02.jpg" alt=""></a>
                        </div> 
                        <h3>Diamond Loungestol Hvid Tex®</h3> 
                         <div class="wrap_price">
                            <p class="price_before">Førpris: 529 DKK</p>
                            <p class="price_sale">(De sparer: 50 DKK) </p>
                        </div><!--wrap_price-->
                        <h4>479 DKK</h4>
                        <a class="btnMore btn2" href="product_detail.php">Vis detaljer</a>
                    </li> 
                   
                   <li>
                        <div class="img_main">
                          <a href="product_detail.php"><img src="img/img01.jpg" alt=""></a>
                        </div> 
                        <h3>Diamond Loungestol Hvid Tex®</h3> 
                        <div class="wrap_price">
                            <p class="price_before">Førpris: 529 DKK</p>
                            <p class="price_sale">(De sparer: 50 DKK) </p>
                        </div><!--wrap_price-->
                        <h4>479 DKK</h4>
                        <a class="btnMore btn2" href="product_detail.php">Vis detaljer</a>
                    </li>
                     <li>
                        <div class="img_main">
                          <a href="product_detail_out_of_stock.php"><img src="img/img02.jpg" alt=""></a>
                        </div> 
                        <h3>Diamond Loungestol Hvid Tex®</h3> 
                         <div class="wrap_price">
                            <p class="price_before">Førpris: 529 DKK</p>
                            <p class="price_sale">(De sparer: 50 DKK) </p>
                        </div><!--wrap_price-->
                        <h4>479 DKK</h4>
                        <a class="btnMore btn2" href="product_detail.php">Vis detaljer</a>
                    </li> 
                </ul>
            </div><!--eachBox wrap-list-prod-->

            <div class="eachBox  box_gavekort"> <a href="#"><img src="img/gavekort.png"></a> </div>

            <div class="eachBox">
              <ul class="list-bn"> 
                <li><a href="#"><img src="img/image01.jpg"></a></li>
                <li><a href="#"><img src="img/image02.jpg"></a></li>
              </ul>
            </div>

            <?php require_once('list-services.php'); ?>  

           <?php require_once('footer.php'); ?>
      </div><!--End #content--> 
      <?php require_once('menu-left.php'); ?>  
    </div><!--End #Page--> 
  </body>
</html>