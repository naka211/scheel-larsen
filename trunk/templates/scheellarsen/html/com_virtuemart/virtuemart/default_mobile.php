<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

JHTML::_( 'behavior.modal' );

$mobile = JURI::base()."templates/scheellarsen/mobile/";
?>
<div id="content" class="w-content">
    {module Home Banners}
    
    <div class="eachBox news">
        {article 14}{introtext}{/article}
    </div>
    <!--discount-stt-->
    
    <div class="eachBox wrap-list-prod clearfix">
          <h2>udvalgte produkter</h2>
          <ul class="listProd clearfix">
          
            <li>
                  <div class="img_main"> <a href="product_detail.php"><img src="<?php echo $mobile;?>img/img01.jpg" alt=""></a> </div>
                  <h3>Diamond Loungestol Hvid Tex®</h3>
                  <p class="price_before">Førpris: 529 DKK</p>
                  <p class="price_sale">(De sparer: 50 DKK) </p>
                  <h4>479 DKK</h4>
                  <a class="btnMore btn2" href="product_detail.php">Vis detaljer</a> </li>
            
        </ul>
      </div>
    <!--eachBox wrap-list-prod-->
    
    <div class="eachBox  box_gavekort"> <a href="gavekort.html"><img src="<?php echo $mobile;?>img/gavekort.png"></a> </div>
    
        <div class="eachBox">
            <ul class="list-bn">
                <li><a href="cane-line.html"><img src="<?php echo $mobile;?>img/image01.jpg"></a></li>
                <li><a href="skind.html"><img src="<?php echo $mobile;?>img/image02.jpg"></a></li>
            </ul>
        </div>
<?php # Vendor Store Description
/*if (!empty($this->vendor->vendor_store_desc) and VmConfig::get('show_store_desc', 1)){?>
<?php echo $this->vendor->vendor_store_desc; ?>
<?php }*/

# load categories from front_categories if exist
//if ($this->categories and VmConfig::get('show_categories', 1)) echo $this->loadTemplate('categories');

# Show template for : topten,Featured, Latest Products if selected in config BE
//if (!empty($this->products) ) echo $this->loadTemplate('products');
return;
?>
{module Home Banners}
{article 14}{introtext}{/article}
<div class="products">
    <h2><img alt="" src="templates/scheellarsen/img/title_product.png"></h2>
    <ul class="clearfix">
        <?php
foreach ($this->products as $type => $productList ) {
// Calculating Products Per Row
/*$products_per_row = VmConfig::get ( 'homepage_products_per_row', 3 ) ;
$cellwidth = ' width'.floor ( 100 / $products_per_row );*/

// Category and Columns Counter

// Start the Output

foreach ( $productList as $product ) { //print_r($product);exit;

	$link=JRoute::_ ( 'index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id );

		// Show Products
	// this is an indicator wether a row needs to be opened or not
?>
        <li>
            <div class="img_main">
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
            <?php if(!empty($product->prices['discountAmount'])){?>
            <p class="price_before">Førpris: <?php echo $this->currency->priceDisplay($product->prices['basePrice'],0,1.0,false,$this->currency->_priceConfig['basePrice'][1] );?></p>
            <p class="price_sale">(De sparer: <?php echo $this->currency->priceDisplay(abs($product->prices['discountAmount']),0,1.0,false,$this->currency->_priceConfig['discountAmount'][1] );?>) </p>
            <?php }?>
            <h4 class="price_2"><?php
					if (VmConfig::get ( 'show_prices' ) == '1') {
						echo $this->currency->priceDisplay($product->prices['salesPrice'],0,1.0,false,$this->currency->_priceConfig['salesPrice'][1] );
					} ?>
            </h4>
            
            <div class="pro-larg animated clearfix">
                <div class="img_main"> <a href="<?php echo $link;?>"><?php echo $product->images[0]->displayMediaThumb( 'border="0"', false, '' )?></a> </div>
                <h3><?php echo $product->product_name?></h3>
                <p class="no_number">Vare-nummer: <?php echo $product->product_sku?></p>
                <?php if(!empty($product->prices['discountAmount'])){?>
                <p class="price_before">Førpris: <?php echo $this->currency->priceDisplay($product->prices['basePrice'],0,1.0,false,$this->currency->_priceConfig['basePrice'][1] );?></p>
                <p class="price_sale">(De sparer: <?php echo $this->currency->priceDisplay(abs($product->prices['discountAmount']),0,1.0,false,$this->currency->_priceConfig['discountAmount'][1] );?>) </p>
                <?php }?>
                <h4><?php echo $this->currency->priceDisplay($product->prices['salesPrice'],0,1.0,false,$this->currency->_priceConfig['salesPrice'][1] );?></h4>
                <a class="btnMore btn2" href="<?php echo $link;?>">Vis detaljer</a>
            </div>            
        </li>
        <?php
    }
}?>
    </ul>
</div>
