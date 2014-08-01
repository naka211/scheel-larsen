<?php
defined('_JEXEC') or die('Restricted access');
?>
<div class="product">
<ul>
<?php
foreach ($this->products as $type => $productList ) {
// Calculating Products Per Row
$products_per_row = VmConfig::get ( 'homepage_products_per_row', 3 ) ;
$cellwidth = ' width'.floor ( 100 / $products_per_row );

// Category and Columns Counter
$col = 1;
$nb = 1;

// Start the Output

foreach ( $productList as $product ) {

	$link=JRoute::_ ( 'index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id );

	if($col == 1)
		echo '<div>';

		// Show Products
	// this is an indicator wether a row needs to be opened or not
	$endrow='';
	if ($col == 4)
		$endrow=' class="no-mar"';
		?>
		<li<?php echo $endrow?>>

					<div class="img-pro">
					<?php // Product Image
					if ($product->images) {
						echo $product->images[0]->displayMediaThumb( 'border="0"', false, '' );
					}
					?>
					</div>

					<h3 style="text-align: center">
					<?php // Product Name
					echo $product->product_name?>
					</h3>

					<div class="price">
						<p class="new-price">
					<?php
					if (VmConfig::get ( 'show_prices' ) == '1') {
						echo $this->currency->priceDisplay($product->prices['salesPrice'],0,1.0,false,$this->currency->_priceConfig['salesPrice'][1] );
					} ?>
						</p>
					</div>
				<?php if(!empty($product->prices['discountAmount'])){?>
					<div class="sale-off"><img src="templates/<?php echo $template?>/img/tilbud.png" width="67" height="67" alt=""></div>
				<?php }?>
					<div class="pro-larg fadeIn">
					<a href="<?php echo $link?>">
						<div class="img-pro-larg"><?php echo $product->images[0]->displayMediaThumb( 'border="0"', false, '' )?></div>
						
						<p class="title"><?php echo $product->product_name?></p>
						<p class="num">Varenr. <?php echo $product->product_sku?></p>
<?php if($product->product_delivery) echo "<p>VAREN KAN KUN AFHENTES!</p>"?>
						<div class="price">
					<?php if(!empty($product->prices['discountAmount'])){?>
						<p class="old-price-larg"><?php echo $this->currency->priceDisplay($product->prices['basePrice'],0,1.0,false,$this->currency->_priceConfig['basePrice'][1] );?></p>

						<span class="sale">(SPAR <?php echo $this->currency->priceDisplay($product->prices['discountAmount'],0,1.0,false,$this->currency->_priceConfig['discountAmount'][1] );?>)</span>
					<?php }?>

						<p class="price-red"><?php echo $this->currency->priceDisplay($product->prices['salesPrice'],0,1.0,false,$this->currency->_priceConfig['salesPrice'][1] );?></p>

						<p class="v-detail">Vis detaljer</p>
						</div>
					</a>
						<div class="add-cart">
<?php if($product->product_in_stock - $product->product_ordered < 1){?>
						<span style="color: #F33;text-transform: uppercase;text-decoration: none;font-weight: bold;font-size: 16px;">UDSOLGT</span>
<?php }else{?>
    <?php if(!$product->product_delivery){?>
        <a rel="<?php echo $product->virtuemart_product_id?>">Læg i Kurv</a>
    <?php }?>
<?php }?>
						</div>
					<?php if(!empty($product->prices['discountAmount'])){?>
						<div class="sale-off"><img src="templates/<?php echo $template?>/img/tilbud.png" width="67" height="67" alt=""></div>
					<?php }?>
					</div>

		</li>
	<?php
	$nb ++;

	// Do we need to close the current row now?
	if ($col == $products_per_row){
		$col = 1;
		echo '<div class="clear"></div></div>';
	}else
		$col ++;
}
}?>
</ul>
</div>