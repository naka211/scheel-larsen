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
      <div id="content" class="w-content undepages checkout">  
            <div class="eachBox boxCheckout">
                <div class="clearfix"> 
                   <?php require_once('col-left-checkout.php'); ?>
                   <div class="colCK col-right-checkout clearfix"> 
                        <div class="step step2 clearfix">  
                          <h2><span>2</span>Levering</h2>   
                          <div class="eachRow"><label><input class="lbradio lb1" name="dkk-radio" checked="checked" type="radio">Leveret til døren for Fyn og Jylland: 350 DKK</label></div> 
                          <div class="eachRow"> <label><input class="lbradio lb3" name="dkk-radio" type="radio">Ved afhentning på Hesselrødvej 26, 2980 Kokkedal, sparer du 10%, som vil blive fratrukket automatisk </label></div>
                          </div><!--step2--> 
                          <div class="step step3 clearfix">   
                            <h2><span>3</span>BETALINGSMETODE</h2> 
                            <p>Du kan betale med følgende betalingskort:</p> 
                            <label><input class="lbradio" name="cart" type="radio" checked="checked"><img class="cart-icon" src="img/cart-ck.png"></label>
                            <label><input class="lbradio" name="cart" type="radio"><a class="btnCartcredit fancybox" href="#ppCartcredit"><img src="img/icon_via.png" alt=""></a></label>
                          </div><!--step3--> 
                          <div class="step  step4 clearfix">   
                               <h2><span>4</span>Ordreoversigt</h2>
                               <div class="wrapTb clearfix">  
                                    <div class="topbarcart clearfix">Varebeskrivelse</div>
                                    <div class="wrapRowPro">
                                        <div class="eachRowPro">
                                            <div class="proImg"><img src="img/img04.jpg" alt=""></div>
                                            <div class="row rowAbove">
                                                <div class="proName"><h2><a href="#">LUCIE ANTIQUE TERRACOTTA </a></h2><p> <span class="spanlb">Varenummer:</span><span class="spanvl">30283</span></p></div>                                                
                                            </div> 
                                            <div class="row rowBelow">                                                
                                                <div class="proSize"><span class="spanlb">Størrelse:</span><span class="spanvl">Højde 21 cm-Ø27 cm</span><span class="lbAntal">Antal</span> <span class="valueAntal">1</span></div>
                                                <div class="proPriceTT"><span class="spanlb">Pris i alt:</span><span class="spanvl">479 DKK </span></div> 
                                            </div>  
                                            <a class="proDel"> <img src="img/btnDel.jpg" alt="Delete"> </a>
                                        </div><!--eachRowPro-->
                                        <div class="eachRowPro">
                                            <div class="proImg"><img src="img/img04.jpg" alt=""></div>
                                            <div class="row rowAbove">
                                                <div class="proName"><h2><a href="#">LUCIE ANTIQUE TERRACOTTA </a></h2><p> <span class="spanlb">Varenummer:</span><span class="spanvl">30283</span></p></div>                                                
                                            </div> 
                                            <div class="row rowBelow">                                                
                                                <div class="proSize"><span class="spanlb">Størrelse:</span><span class="spanvl">Højde 21 cm-Ø27 cm</span><span class="lbAntal">Antal</span> <span class="valueAntal">1</span></div>
                                                <div class="proPriceTT"><span class="spanlb">Pris i alt:</span><span class="spanvl">479 DKK </span></div> 
                                            </div>  
                                            <a class="proDel"> <img src="img/btnDel.jpg" alt="Delete"> </a>
                                        </div><!--eachRowPro-->
                                        <div class="eachRowPro">
                                            <div class="proImg"><img src="img/img04.jpg" alt=""></div>
                                            <div class="row rowAbove">
                                                <div class="proName"><h2><a href="#">LUCIE ANTIQUE TERRACOTTA </a></h2><p> <span class="spanlb">Varenummer:</span><span class="spanvl">30283</span></p></div>                                                
                                            </div> 
                                            <div class="row rowBelow">                                                
                                                <div class="proSize"><span class="spanlb">Størrelse:</span><span class="spanvl">Højde 21 cm-Ø27 cm</span><span class="lbAntal">Antal</span> <span class="valueAntal">1</span></div>
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
                                              <div class="eachRow r-nor clearfix">
                                                  <span class="lbNor">FRAGT: </span> <span class="lbPrice">150 DKK</span>
                                              </div>
                                               
                                              <div class="eachRow r-total clearfix">
                                                  <span class="lbTotal">TOTAL:</span> <span class="totalPrice">1.955 DKK</span>
                                              </div>
                                          </div>                                
                                      </div> <!--wrapTotalPrice-->  
                                </div><!-- wrapTb --> 
       
                                <div class="read-terms clearfix">
                                  <label><input type="checkbox">Jeg bekræfter hermed at mine data er korrekte, samt at kurven indeholder de varer jeg ønsker. <a target="_blank" href="terms.php">Jeg accepterer Handelsbetingelser.</a></label> 
                                </div> 
                          </div><!--step4--> 
                         </div><!--col-right -->  
                    </div> <!-- clearfix --> 

                    <div class="wrap-button">
                         <a class="btn2 btnGray btnBackShop" href="cart.php"><span class="back"><<</span> Til Varekurv</a>   
                         <a class="btn2 btntoPayment" href="thanks.php">til Betaling <span class="next">>></span></a>  
                    </div><!--wrap-button -->   
                      
             </div> <!--eachBox boxCheckout--> 

            <?php require_once('list-services.php'); ?>    

           <?php require_once('footer.php'); ?>

            <div id="ppCartcredit" style="display: none;">
                <div class="wrap-pp wrap-cartcredit">
                    <h4>ViaBill betingelser</h4>
                    <p>I samarbejde med ViaBill kan vi tilbyde faktura eller delbetaling. Det betyder at du kan købe dine varer nu, og vente med at betale.</p> 
                    <p>Når du gennemfører din bestilling, skal du vælge blot vælge ” ViaBill" som betalingsmetode. Klik på ” Gå til betaling ”og du bliver ført til en sikker side som kun ViaBill har adgang til at se, her gennemføres et kredittjek. Du får svar med det samme, og derefter er bestillingen gennemført.</p> 
                    <p>Vi sender dig dine varer og en faktura som dokumentation på din ordre, sideløbende vil du modtage en opkrævning fra ViaBill, det er denne du skal indbetale efter. </p> 
                    <p>Har du spørgsmål, er du meget velkommen til at kontakte vores kundeservice på tlf. 4930 1699. </p> 
                    <p>Alle spørgsmål vedrørende betaling af en faktura, skal rettes til ViaBill på telefon 88 826 826, da det er dem der yder kreditten. </p>  
                </div><!--wrap-cartcredit-->  
            </div><!--ppCartcredit-->

      </div><!--End #content-->  
      <?php require_once('menu-left.php'); ?>  
    </div><!--End #Page--> 
  </body>
</html>