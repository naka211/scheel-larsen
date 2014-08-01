<?php
// Check to ensure this file is included in Joomla!
defined ('_JEXEC') or die('Restricted access');
?>
<div class="addtocart-area">
	<form method="post" class="quantity product js-recalculate" action="<?php echo JRoute::_ ('index.php'); ?>">
		<?php // Product custom_fields
		if (!empty($this->product->customfieldsCart)) {
			?>
			<div class="product-fields">
				<?php foreach ($this->product->customfieldsCart as $field) { ?>
				<div class="product-field product-field-type-<?php echo $field->field_type ?>">
					<span class="product-fields-title-wrapper"><span class="product-fields-title"><strong><?php echo JText::_ ($field->custom_title) ?></strong></span>
					<?php if ($field->custom_tip) {
					echo JHTML::tooltip ($field->custom_tip, JText::_ ($field->custom_title), 'tooltip.png');
				} ?></span>
					<span class="product-field-display"><?php echo $field->display ?></span>

					<span class="product-field-desc"><?php echo $field->custom_field_desc ?></span>
				</div><br/>
				<?php
			}
				?>
			</div>
			<?php
		}
		/* Product custom Childs
			 * to display a simple link use $field->virtuemart_product_id as link to child product_id
			 * custom_value is relation value to child
			 */

		if (!empty($this->product->customsChilds)) {
			?>
			<div class="product-fields">
				<?php foreach ($this->product->customsChilds as $field) { ?>
				<div class="product-field product-field-type-<?php echo $field->field->field_type ?>">
					<span class="product-fields-title"><strong><?php echo JText::_ ($field->field->custom_title) ?></strong></span>
					<span class="product-field-desc"><?php echo JText::_ ($field->field->custom_value) ?></span>
					<span class="product-field-display"><?php echo $field->display ?></span>

				</div><br/>
				<?php } ?>
			</div>
			<?php }

		if (!VmConfig::get('use_as_catalog', 0) and !empty($this->product->prices['salesPrice'])) {
		?>

		<div class="addtocart-bar">

			<?php // Display the quantity box

			$stockhandle = VmConfig::get ('stockhandle', 'none');
			if (($stockhandle == 'disableit' or $stockhandle == 'disableadd') and ($this->product->product_in_stock - $this->product->product_ordered) < 1) {
				?>
				<a href="<?php echo JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&layout=notify&virtuemart_product_id=' . $this->product->virtuemart_product_id); ?>" class="notify"><?php echo JText::_ ('COM_VIRTUEMART_CART_NOTIFY') ?></a>

				<?php } else { ?>
				<label>Antal: 
		<input type="text" class="quantity-input js-recalculate" name="quantity[]" value="<?php if (isset($this->product->min_order_level) && (int)$this->product->min_order_level > 0) {
			echo $this->product->min_order_level;
		} else {
			echo '1';
		} ?>"/>
				</label>
<?php	// Display the add to cart button?>
			<div class="bnt-add-basket">
			<a href="javascript:void(0);" onclick="document.getElementById(this.id+'Input').click()" id="btnAddItem1">Læg i indkøbskurv</a>
<?php echo '<input type="submit" id="btnAddItem1Input" name="addtocart" class="addtocart-button" style="display:none" value="'.JText::_('COM_VIRTUEMART_CART_ADD_TO') .'" title="'.JText::_('COM_VIRTUEMART_CART_ADD_TO') .'" />' ?>
			<a href="#" id="btnAddItem" style="display:none;"></a>
<script type="text/javascript">
jQuery("form.js-recalculate").submit(function(){
	jQuery.ajax( {
	type: "POST",
	url: "index.php",
	data: jQuery(this).serialize(),
	success: function( response ){
		cart_update();
		jQuery("#btnAddItem").click();
	}
	} );
return false;
});
</script>
			</div>
				<?php } ?>
		</div>
		<?php }
		 // Display the add to cart button END  ?>
		<input type="hidden" class="pname" value="<?php echo htmlentities($this->product->product_name, ENT_QUOTES, 'utf-8') ?>"/>
		<input type="hidden" name="option" value="com_virtuemart"/>
		<input type="hidden" name="view" value="cart"/>
		<noscript><input type="hidden" name="task" value="addAJAX"/></noscript>
		<input type="hidden" name="virtuemart_product_id[]" value="<?php echo $this->product->virtuemart_product_id ?>"/>
	</form>
</div>
