<nav id="menu-left">
	<div class="divWrapAll">
		<a href="index.php" class="divlogomn"><img src="img/logo_.png"></a>
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