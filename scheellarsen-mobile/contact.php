<!DOCTYPE html>
<html>
  <head>
      <?php require_once('head.php'); ?>  
  </head>
  <body>
    <div id="page">   
      <!--Begin #header-->
      <?php  $t = 4; require_once('header.php'); ?> 
      <!--#header--> 
      
      <div id="content" class="w-content undepages contact">            
          <ul class="eachBox breadcrumb">
            <li><a href="index.php">Forside</a></li>
            <li><a href="#">Kontakt </a></li> 
          </ul>    
          <div class="eachBox boxContact"> 
              <h2>Kontakt</h2>  
              <div class="clearfix">
                  <div class="cont-left">
                      <h4>Scheel-Larsen.dk</h4>
                      <p>Hvis du har spørgsmål eller kommentarer, er du velkommen til at kontakte os pr. tlf. alle ugens dage mellem kl. 11.00 – 16.00, eller sende os en mail via nedenstående formular.</p>                       
                      <p>Hesselrødvej 26, Karlebo<br>
                        2980 Kokkedal<br>
                        Mobil: 41628001<br>
                        Email: <a href="mailto:info@scheel-larsen.dk">info@scheel-larsen.dk</a></p> 
                      <p><strong>Åbningstider:</strong><br>
                      Mandag-fredag, kl. 10.00-18.00<br>
                      Lørdag, søn- og helligdage, kl. 10-16</p>
                  </div>
                  <div class="cont-right ">
                      <div class="wrap-form-contact ">
                          <p> Felter markeret med * skal udfyldes </p>
                          <input class="txtInput" placeholder="Navn*">
                          <input class="txtInput" placeholder="E-mail*">
                          <input class="txtInput" placeholder="Telefon*"> 
                          <textarea class="txtArea" placeholder="Besked"></textarea> 
                          <a class="btn2 btnSend" href="#">Send</a>   <a class="btn2 btnNustil" href="#">Nustil</a>                               
                      </div>
                  </div>  
              </div> <!--clearfix-->  
              <div class="wrapMap clearfix"> <img class="imgMap_demo" src="img/map-mobile.jpg"> </div>              
          </div><!--eachBox-->  

          <?php require_once('list-services.php'); ?>  

           <?php require_once('footer.php'); ?>
      </div><!--End #content--> 
      <?php require_once('menu-left.php'); ?>  
    </div><!--End #Page--> 
  </body>
</html>