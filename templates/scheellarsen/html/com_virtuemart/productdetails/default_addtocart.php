<?php
// Check to ensure this file is included in Joomla!
defined ('_JEXEC') or die('Restricted access');
if (isset($this->product->step_order_level))
	$step=$this->product->step_order_level;
else
	$step=1;
if($step==0)
	$step=1;
$alert=JText::sprintf ('COM_VIRTUEMART_WRONG_AMOUNT_ADDED', $step);
?>
<div class="addtocart-area">
	<form method="post" class="quantity product js-recalculate" action="<?php echo JRoute::_ ('index.php'); ?>">
		<?php // Product custom_fields
		if (!empty($this->product->customfieldsCart)) {
			?>
                            <?php foreach ($this->product->customfieldsCart as $field) { ?>
                        <ul class="option clearfix">
            
                            <!--<div class="product-field product-field-type-<?php //echo $field->field_type ?>">-->
                                    <!--<span class="product-fields-title-wrapper"><span class="product-fields-title"><strong><?php //echo JText::_ ($field->custom_title) ?></strong></span>-->
                                    <?php if ($field->custom_tip) {
                                    echo JHTML::tooltip ($field->custom_tip, JText::_ ($field->custom_title), 'tooltip.png');
                            } ?>
                                    <?php echo $field->display ?>

                                    <!--<span class="product-field-desc"><?php //echo $field->custom_field_desc ?></span>-->
                            <!--</div><br/>-->
                        </ul>
                            <?php
                            }
                            ?>

<!--                        <ul class="option clearfix bb1 mb20">
                          <li>
                            <input id="c4" type="radio" name="cc2" checked>
                            <label for="c4">Share sidebordunderstel 60 cm</label>
                          </li>
                          <li>
                            <input id="c5" type="radio" name="cc2" checked>
                            <label for="c5">Bordplade 50x60 cm, Hvid matteret hærdet glas</label>
                          </li>
                        </ul>-->
			
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
<?php echo '<input type="submit" id="btnAddItem1Input" name="addtocart" class="addtocart-button" style="display:none" value="'.JText::_('COM_VIRTUEMART_CART_ADD_TO') .'" title="'.JText::_('COM_VIRTUEMART_CART_ADD_TO') .'" />' ?>
			<a href="#" id="btnAddItem" style="display:none;"></a>
                <?php echo shopFunctionsF::getAddToCartButton ($this->product->orderable); ?>
		<input type="submit" name="addtocart" id="btnAddcart" class="btnAddcart hover" value="Tilføj indkøbskurven"/>	
            <!--<a id="btnAddcart" class="btnAddcart hover" href="#">Tilføj indkøbskurven</a>-->

<script type="text/javascript">
    function check(obj) {
    // use the modulus operator '%' to see if there is a remainder
    remainder=obj.value % <?php echo $step?>;
    quantity=obj.value;
    if (remainder  != 0) {
            alert('<?php echo $alert?>!');
            obj.value = quantity-remainder;
            return false;
            }
    return true;
    }
jQuery("form.js-recalculate").submit(function(){
	jQuery.ajax( {
	type: "POST",
	url: "index.php",
	data: jQuery(this).serialize(),
	success: function( response ){
//            alert(response);
		cart_update();
//		jQuery("#btnAddItem").click();
	}
	} );
return false;
});
</script>
		<?php }
		 // Display the add to cart button END  ?>
		<input type="hidden" class="pname" value="<?php echo htmlentities($this->product->product_name, ENT_QUOTES, 'utf-8') ?>"/>
		<input type="hidden" name="option" value="com_virtuemart"/>
		<input type="hidden" name="view" value="cart"/>
		<noscript><input type="hidden" name="task" value="addAJAX"/></noscript>
		<input type="hidden" name="virtuemart_product_id[]" value="<?php echo $this->product->virtuemart_product_id ?>"/>
	</form>
</div>
