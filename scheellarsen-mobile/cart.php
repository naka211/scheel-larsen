<!DOCTYPE html>
<html>
  <head>
      <?php require_once('head.php'); ?>  
  </head>
  <body>
    <div id="page">   
      <!--Begin #header-->
      <?php  require_once('header.php'); ?> 
      <!--#header--> 
      <div id="content" class="w-content undepages cart">  
            <div class="eachBox boxCart">                             
                <h2>DIN INDKØBSKURV</h2>
                <div class="wrapTb clearfix">  
                    <div class="topbarcart clearfix">Varebeskrivelse</div>
                    <div class="wrapRowPro">
                        <div class="eachRowPro">
                            <div class="proImg"><img src="img/img04.jpg" alt=""></div>
                            <div class="row rowAbove">
                                <div class="proName"><h2><a href="#">LUCIE ANTIQUE TERRACOTTA </a></h2><p> <span class="spanlb">Varenummer:</span><span class="spanvl">30283</span></p></div>
                                <div class="wrapedit"><span>Antal</span> <input class="inputNumber" value="1"> <a class="update" href="#">Opdatere</a> </div> 
                            </div> 
                            <div class="row rowBelow">
                                
                                <div class="proSize"><span class="spanlb">Størrelse:</span><span class="spanvl">Højde 21 cm-Ø27 cm</span></div>  
                                <div class="proPriceTT"><span class="spanlb">Pris i alt:</span><span class="spanvl">479 DKK </span></div> 
                            </div>  
                            <a class="proDel"> <img src="img/btnDel.jpg" alt="Delete"> </a>
                        </div><!--eachRowPro-->
                        <div class="eachRowPro">
                            <div class="proImg"><img src="img/img04.jpg" alt=""></div>
                            <div class="row rowAbove">
                                <div class="proName"><h2><a href="#">LUCIE ANTIQUE TERRACOTTA </a></h2><p> <span class="spanlb">Varenummer:</span><span class="spanvl">30283</span></p></div>
                                <div class="wrapedit"><span>Antal</span> <input class="inputNumber" value="1"> <a class="update" href="#">Opdatere</a> </div> 
                            </div> 
                            <div class="row rowBelow">
                                
                                <div class="proSize"><span class="spanlb">Størrelse:</span><span class="spanvl">Højde 21 cm-Ø27 cm</span></div>  
                                <div class="proPriceTT"><span class="spanlb">Pris i alt:</span><span class="spanvl">479 DKK </span></div> 
                            </div>  
                            <a class="proDel"> <img src="img/btnDel.jpg" alt="Delete"> </a>
                        </div><!--eachRowPro-->
                        <div class="eachRowPro">
                            <div class="proImg"><img src="img/img04.jpg" alt=""></div>
                            <div class="row rowAbove">
                                <div class="proName"><h2><a href="#">LUCIE ANTIQUE TERRACOTTA </a></h2><p> <span class="spanlb">Varenummer:</span><span class="spanvl">30283</span></p></div>
                                <div class="wrapedit"><span>Antal</span> <input class="inputNumber" value="1"> <a class="update" href="#">Opdatere</a> </div> 
                            </div> 
                            <div class="row rowBelow">
                                
                                <div class="proSize"><span class="spanlb">Størrelse:</span><span class="spanvl">Højde 21 cm-Ø27 cm</span></div>  
                                <div class="proPriceTT"><span class="spanlb">Pris i alt:</span><span class="spanvl">479 DKK </span></div> 
                            </div>  
                            <a class="proDel"> <img src="img/btnDel.jpg" alt="Delete"> </a>
                        </div><!--eachRowPro-->
                    </div> <!--wrapRowPro-->
                    <div class="wrapTotalPrice clearfix"> 
                          <div class="box boxright">
                              <div class="eachRow r-nor clearfix">
                                  <span class="lbNor">SUBTOTAL:  </span> <span class="lbPrice">1.916 DKK</span>
                              </div>
                              <div class="eachRow r-nor clearfix">
                                  <span class="lbNor">HERAF MOMS: </span> <span class="lbPrice">383,20 DKK</span>
                              </div>
                               
                              <div class="eachRow r-total clearfix">
                                  <span class="lbTotal">TOTAL:</span> <span class="totalPrice">1.916 DKK</span>
                              </div>
                          </div>                                
                      </div> <!--wrapTotalPrice--> 
                      <div class="wrap-button">
                           <a class="btn2 btnGray btnBackShop" href="index.php"><span class="back"><<</span> Shop videre</a>   
                           <a class="btn2 btntoPayment" href="checkout.php">Gå til kassen <span class="next">>></span></a>  
                      </div><!--wrap-button -->
                </div><!--  wrapTb--> 
                 
             </div> <!--eachBox boxCart--> 

            <?php require_once('list-services.php'); ?>    

           <?php require_once('footer.php'); ?>
      </div><!--End #content-->  
      <?php require_once('menu-left.php'); ?>  
    </div><!--End #Page--> 
  </body>
</html>