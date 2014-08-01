<?php
// Check to ensure this file is included in Joomla!
defined ('_JEXEC') or die('Restricted access');

	//vmdebug('view productdetails layout default show prices, prices',$this->product);
	if ($this->product->prices['salesPrice']<=0 and VmConfig::get ('askprice', 1) and isset($this->product->images[0]) and !$this->product->images[0]->file_is_downloadable) {
		?>
		<a class="ask-a-question bold" href="<?php echo $this->askquestion_url ?>"><?php echo JText::_ ('COM_VIRTUEMART_PRODUCT_ASKPRICE') ?></a>
		<?php
	} else {
?>
<div class="price-main">
	<label>Tilbud :</label><span><?php echo $this->currency->priceDisplay($this->product->prices['salesPrice'],0,1.0,false,$this->currency->_priceConfig['salesPrice'][1] );?></span>
</div>

<?php if(!empty($this->product->prices['discountAmount'])){?>
<div class="price-old">
	<label>Vejl. pris :</label><span><?php echo $this->currency->priceDisplay($this->product->prices['basePrice'],0,1.0,false,$this->currency->_priceConfig['basePrice'][1] );?></span>
</div>

<div class="save">
	<label>Spar :</label><span><?php echo $this->currency->priceDisplay($this->product->prices['discountAmount'],0,1.0,false,$this->currency->_priceConfig['discountAmount'][1] );?></span>
</div>
<?php }
	}?>