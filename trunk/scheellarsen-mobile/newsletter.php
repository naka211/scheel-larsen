<!DOCTYPE html>
<html>
  <head>
      <?php require_once('head.php'); ?>  
  </head>
  <body>
    <div id="page">   
      <!--Begin #header-->
      <?php  $t = 3;  require_once('header.php'); ?> 
      <!--#header--> 
      
      <div id="content" class="w-content undepages newsletter_page">  
 
          <ul class="eachBox breadcrumb">
            <li><a href="index.php">Forside</a></li>
            <li><a href="newsletter.php">Nyhedsbrev Tilmelding</a></li>
          </ul>         

		<div class="eachBox wrap-newsletter clearfix">
			<p class="txt-newsletter">TILMELD DIG VORES NYHEDSBREV OG FÅ GODE TILBUD OG NYHEDER. VI UDSENDER NYHEDSBREVE 1-2 GANGE OM MÅNEDEN!</p> 
			<div class="row-ip clearfix">
				<input class="txtInput" type="email" placeholder="Indtast din e-mail">
			</div>
			<a class="btn2 btnSubscribe" href="#">Tilmeld</a> 
		</div><!--eachBox wrap-newsletter--> 

          <?php require_once('list-services.php'); ?>  

           <?php require_once('footer.php'); ?>
      </div><!--End #content--> 
      <?php require_once('menu-left.php'); ?>  
    </div><!--End #Page--> 
  </body>
</html>