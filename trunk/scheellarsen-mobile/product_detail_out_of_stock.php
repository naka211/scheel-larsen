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
      
      <div id="content" class="w-content undepages productdetail_page">            
          <ul class="eachBox breadcrumb">
            <li><a href="index.php">Forside</a></li>
            <li><a href="product.php">1000 krukker</a></li>
            <li><a href="product2.php">Krukker antique</a></li>
            <li><a href="product_detail.php">Lucie Antique Terracotta</a></li>
          </ul>    
          <div class="eachBox boxProd_detail"> 
             <div class="product_img">
                  <div class="img_larg">
                    <a id="btnLargeImage" class="imgZoom" href="img/thumnail/img_larg.jpg"><img src="img/thumnail/img_larg.jpg" alt=""></a>
                  </div>
                  <a id="btnZoomIcon" class="imgZoom btnZoom fancybox" href="img/thumnail/img_larg.jpg"><img src="img/icon_zoom.png" alt=""></a>
                  
                 <!--
                 <ul id="thumblist" class="thumail clearfix gallery">
                    <li><a href="#"><img src="img/thumnail/img_larg.jpg" alt=""></a></li>
                    <li><a href="#"><img src="img/thumnail/img_larg.jpg" alt=""></a></li>
                    <li><a href="#"><img src="img/thumnail/img_larg.jpg" alt=""></a></li>
                    <li><a href="#"><img src="img/thumnail/img_larg.jpg" alt=""></a></li>
                  </ul> 
                  -->                    
                   
                  <a href="#" class="btnFb"><img src="img/icon_face.png" alt=""></a>                   
                  <div class="video clearfix"> 
                    <a class="fancybox-media" href="https://www.youtube.com/watch?v=-1gQDlgrAQk"><img class="imgDemoVideo" src="img/thumnail/img_small2.jpg" alt=""></a>
                  </div>
              </div><!--product_img-->  
              <div class="product_content">
                    <h2>Lucie Antique Terracotta</h2>
                    <p><strong>Varenummer: 30283</strong></p>
                    <div class="overview">
                      <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit. Donec odio quisque volutpat mattis eros. Nullam malesuada erat ut turpis suspendisse urna nibh viverra non semper suscipit posuere a pede donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci denean dignissim pellentesque felis.</p>
                      <p>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat praesent dapibus, neque </p>
                      <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit. Donec odio quisque volutpat mattis eros. Nullam malesuada erat ut turpis suspendisse urna nibh viverra non semper suscipit posuere a pede donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci denean dignissim pellentesque felis.</p>
                      <p>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat praesent dapibus, neque </p>
                    </div>
                    <a class="btn2 btn_sizeguide fancybox" href="#ppSizeguide">STØRRELSESGUIDE</a>
                    <!--Popup Size Guide-->
                    <div id="ppSizeguide" style="display: none;">
                        <div class="wrap-pp f_size">
                              <h2>STØRRELSESGUIDE</h2>
                              <div class="f_size_content">
                                    <div class="size_img">
                                      <img src="img/pro01.jpg" alt="">
                                    </div>
                                    <div class="size_detail">
                                        <table>
                                            <tr>
                                              <td width="40%" class="black">Diameter:</td>
                                              <td>20 cm</td>
                                            </tr>
                                            <tr>
                                              <td class="black">Bredde:</td>
                                              <td>20 cm</td>
                                            </tr>
                                            <tr>
                                              <td class="black">Længde:</td>
                                              <td>20 cm</td>
                                            </tr>
                                            <tr>
                                              <td class="black">Dybde:</td>
                                              <td>20 cm</td>
                                            </tr>
                                            <tr>
                                              <td class="black">Højde:</td>
                                              <td>20 cm</td>
                                            </tr>
                                            <tr>
                                              <td class="black">Sædehøjde:</td>
                                              <td>20 cm</td>
                                            </tr> 
                                        </table>
                                    </div><!--size_detail-->
                              </div><!--f_size_content-->
                        </div><!--wrap-pp-->  
                    </div> 
                     <!--End#ppSizeguide--> 
                    <h3><span class="price_old">Førpris: 529 DKK</span> (De sparer: 50 DKK)</h3>  
                    <div class="rownumber clearfix">
                        <div class="number">
                          <label for="">ANTAL:</label>
                          <input type="text" placeholder="1">                     
                        </div>
                        <h2 class="price">479 DKK</h2>
                        <div class="stt_pro"><img src="img/icon_del.png" alt=""></div>
                    </div>
                    <ul class="option clearfix">
                        <li>
                          <input id="c1" type="radio" name="cc" checked="">
                          <label for="c1">Lucie Antique Terracotta</label>
                        </li>
                        <li>
                          <input id="c2" type="radio" name="cc">
                          <label for="c2">Beatrice Antique Terracotta</label>
                        </li>
                        <li>
                          <input id="c3" type="radio" name="cc">
                          <label for="c3">Tomasso Antique Terracotta</label>
                        </li>
                    </ul>
                    <ul class="option clearfix bb1">
                        <li>
                          <input id="c4" type="radio" name="cc2" checked="">
                          <label for="c4">Share sidebordunderstel 60 cm</label>
                        </li>
                        <li>
                          <input id="c5" type="radio" name="cc2" checked="">
                          <label for="c5">Bordplade 50x60 cm, Hvid matteret hærdet glas</label>
                        </li>
                    </ul>
                    <a class="btn2 btnAddcart" href="cart.php" style="display: none;"><span><img src="img/icon_bag.png"></span> Tilføj indkøbskurven</a>                     
                </div><!--product_content-->               
          </div><!--eachBox wrapProd_detail--> 
          <div class="eachBox wrap-list-prod">
              <h2>ReLaterede produkter</h2>
              <ul class="listProd clearfix"> 
                  <li>
                      <div class="img_main">
                        <a href="product_detail.php"><img src="img/img01.jpg" alt=""></a>
                      </div> 
                      <h3>Diamond Loungestol Hvid Tex®</h3> 
                      <p class="price_before">Førpris: 529 DKK</p>
                      <p class="price_sale">(De sparer: 50 DKK) </p>
                      <h4>479 DKK</h4>
                      <a class="btnMore btn2" href="product_detail.php">Vis detaljer</a>
                  </li> 
                  <li>
                      <div class="img_main">
                        <a href="product_detail_out_of_stock.php"><img src="img/img02.jpg" alt=""></a>
                      </div> 
                      <h3>Diamond Loungestol Hvid Tex®</h3> 
                      <p class="price_before">Førpris: 529 DKK</p>
                      <p class="price_sale">(De sparer: 50 DKK) </p>
                      <h4>479 DKK</h4>
                      <a class="btnMore btn2" href="product_detail_out_of_stock.php">Vis detaljer</a>
                  </li>
                  <li>
                      <div class="img_main">
                        <a href="product_detail_out_of_stock.php"><img src="img/img01.jpg" alt=""></a>
                      </div> 
                      <h3>Diamond Loungestol Hvid Tex®</h3> 
                      <p class="price_before">Førpris: 529 DKK</p>
                      <p class="price_sale">(De sparer: 50 DKK) </p>
                      <h4>479 DKK</h4>
                      <a class="btnMore btn2" href="product_detail_out_of_stock.php">Vis detaljer</a>
                  </li>  
              </ul>
          </div><!--eachBox wrap-list-prod--> 

          <?php require_once('list-services.php'); ?>  

           <?php require_once('footer.php'); ?>
      </div><!--End #content--> 
      <?php require_once('menu-left.php'); ?>  
    </div><!--End #Page--> 
  </body>
</html>