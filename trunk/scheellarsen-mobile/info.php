<!DOCTYPE html>
<html>
  <head>
      <?php require_once('head.php'); ?>  
  </head>
  <body>
    <div id="page">   
      <!--Begin #header-->
      <?php  $t = 1; require_once('header.php'); ?> 
      <!--#header--> 
      
      <div id="content" class="w-content undepages">  
      
          <ul class="eachBox breadcrumb">
              <li><a href="index.php">Forside</a></li>
              <li><a href="info.php">Info</a></li>
          </ul>          

          <div class="eachBox info_page"> 
              <h2>Haveaffaldsbeholdere godkendt i Gentofte og Gladsaxe kommuner</h2>
                  
               <img src="img/slider03.jpg" alt="">
               <p>En nem og miljøvenlig måde at komme af med sit haveaffald på. Haveaffald er følgende: Blade, blomster, grene, græs, kvas og kviste og ukrudt uden jord.</p>
               <p>Affaldsordningen betyder, at alle parcel og rækkehuse kan komme af med deres haveaffald hver 14 dag året rundt i Gentofte kommune. Du må have 6 affaldsenheder pr. husstand. Beholdere på hjul må have str. 140 liter, 190 liter og 240 liter.</p>
               <p>Det eneste du skal gøre er, at være tilmeldt den kommunale dagrenovations- ordning og stille dine beholder ud på afhentningsdagen inden kl. 7.00. På følgende link til Gentofte kommune kan du læse alt om affaldsordningen: <a class="green" href="#">Gentofte</a></p>
               <p>I Gladsaxe kommune kan du have ubegrænset antal affaldsenheder. Der af- hentes haveaffald fra medio februar og til midten af december. Der afhentes hver 14 dag. Haveaffald er følgende: Blade, blomster, grene, græs, kvas, kviste og ukrudt uden jord.</p>
               <p>Beholdere på hjul i Gladsaxe kommune, må have litermål på 140 liter og 190 liter.</p>
               <p>Du kan læse alt om haveaffaldsordningen i Gladsaxe kommune på følgende link: <a class="green" href="#">Gladsaxe</a></p>
          </div><!--eachBox-->  

          <?php require_once('list-services.php'); ?>  

           <?php require_once('footer.php'); ?>
      </div><!--End #content--> 
      <?php require_once('menu-left.php'); ?>  
    </div><!--End #Page--> 
  </body>
</html>