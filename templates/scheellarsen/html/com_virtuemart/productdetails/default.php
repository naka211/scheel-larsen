<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

/* Let's see if we found the product */
if (empty($this->product)) {
	echo JText::_('COM_VIRTUEMART_PRODUCT_NOT_FOUND');
	echo '<br /><br />  ' . $this->continue_link_html;
	return;
}
?>
<script language="javascript" src="templates/amager/js/jquery.validate.js"></script>
<script language="javascript">
jQuery(document).ready(function()
{
	jQuery.validator.addMethod("requireDefault", function(value, element) 
	{	
		return !(element.value == element.defaultValue);
	});
	
	jQuery("#mailForm").validate({
		rules: {
			uremail: {
				requireDefault: true,
				required: true,
				email: true
			},
			urfriendemail: {
				requireDefault: true,
				required: true,
				email: true
			}
		},
		messages: {
			uremail: "",
			urfriendemail: ""
		}
	});
	<?php if($this->product->product_delivery){?>
		jQuery('#myModal1').reveal();
	<?php }?>
});// JavaScript Document
</script>
<div class="productdetail_page clearfix">
    <div class="main_content frame clearfix">
	{module Breadcrumbs}
        <div class="product_img">
                    <div class="img_larg">
                      <a id="btnLargeImage" class="imgZoom" href="img/thumnail/img_larg.jpg"><img width="430" height="318" src="img/thumnail/img_larg.jpg" alt=""></a>
                    </div>

                    <a id="btnZoomIcon" class="imgZoom btnZoom" href="img/thumnail/img_larg.jpg"><img src="img/icon_zoom.png" alt=""></a>
                    
                    <!--<ul id="thumblist" class="thumail clearfix gallery">
                      <li><a href="#"><img src="img/thumnail/img_larg.jpg" alt=""></a></li>
                      <li><a href="#"><img src="img/thumnail/img_larg.jpg" alt=""></a></li>
                      <li><a href="#"><img src="img/thumnail/img_larg.jpg" alt=""></a></li>
                    </ul>-->                    
                    <hr>
                    <a href="#"><img src="img/icon_face.png" alt=""></a>
                    <div class="clear mb10"></div>
                    <div class="video clearfix">
                      <a class="fl imgZoom" href="https://www.youtube.com/watch?v=-1gQDlgrAQk"><img src="img/thumnail/img_small2.jpg" alt=""></a>
                    </div>
                  </div>
        
	<div class="w-tell-friend reveal-modal" id="myModal2">
	<a href="#" class="close-reveal-modal"></a>
	<form class="tell-friend" action="<?php echo JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id='.$this->product->virtuemart_product_id.'&virtuemart_category_id='.$this->product->virtuemart_category_id.'&tmpl=component') ; ?>" method="post" id="mailForm">
		<fieldset>
		<h2>Tip en ven</h2>
		<form action="" method="post">
			<div>
			<label>Din e-mail <span>*</span></label>
			<input name="uremail" type="text" value="" />
			</div>
			<div>
			<label>Din ven’s e-mail<span>*</span></label>
			<input name="urfriendemail" type="text" value="" />
			</div>
			<div>
			<label>Besked</label>
			<textarea name="msg" cols="" rows=""><?php echo JURI::current()?></textarea>
			</div>
			<div class="bnt-send3">
			<a onclick="nextSibling.click()">SEND</a><input type="submit" value="SEND" style="display: none"/>
			</div><!--.bnt-send3-->
			<div class="bnt-reset">
			<a onclick="nextSibling.click()">nulstil</a><input type="reset" value="nulstil" style="display: none"/>
			</div><!--.bnt-reset-->
			<input type="hidden" name="virtuemart_product_id" value="<?php echo $this->product->virtuemart_product_id ?>" />
			<input type="hidden" name="tmpl" value="component" />
			<input type="hidden" name="view" value="productdetails" />
			<input type="hidden" name="option" value="com_virtuemart" />
			<input type="hidden" name="virtuemart_category_id" value="<?php echo $this->product->virtuemart_category_id ?>" />
			<input type="hidden" name="task" value="mailTellafriend" />
			<?php echo JHTML::_( 'form.token' ); ?>
		</form>
		</fieldset>
	</form>
	</div>
	<div class="w-pro">
	<?php
	// Product Navigation
	if (VmConfig::get('product_navigation', 1)) {
	?>
		<div class="product-neighbours">
		<?php
		if (!empty($this->product->neighbours ['previous'][0])) {
		$prev_link = JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $this->product->neighbours ['previous'][0] ['virtuemart_product_id'] . '&virtuemart_category_id=' . $this->product->virtuemart_category_id);
		echo JHTML::_('link', $prev_link, $this->product->neighbours ['previous'][0]
			['product_name'], array('class' => 'previous-page'));
		}
		if (!empty($this->product->neighbours ['next'][0])) {
		$next_link = JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $this->product->neighbours ['next'][0] ['virtuemart_product_id'] . '&virtuemart_category_id=' . $this->product->virtuemart_category_id);
		echo JHTML::_('link', $next_link, $this->product->neighbours ['next'][0] ['product_name'], array('class' => 'next-page'));
		}
		?>
		<div class="clear"></div>
		</div>
	<?php }?>

	<?php
	// Back To Category Button
	/*if ($this->product->virtuemart_category_id) {
		$catURL =  JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id='.$this->product->virtuemart_category_id);
		$categoryName = $this->product->category_name ;
	} else {
		$catURL =  JRoute::_('index.php?option=com_virtuemart');
		$categoryName = jText::_('COM_VIRTUEMART_SHOP_HOME') ;
	}

	<div class="back-to-category">
		<a href="<?php echo $catURL ?>" class="product-details" title="<?php echo $categoryName ?>"><?php echo JText::sprintf('COM_VIRTUEMART_CATEGORY_BACK_TO',$categoryName) ?></a>
	</div>*/
?>
	<?php // Product Title ?>
<div class="pro-title">
	<h2 style="margin-bottom:6px"><?php echo $this->product->product_name ?></h2>
	<div class="share-pro-onface">
		<a href="javascript:void(0);">Del Produkt på facebook</a>
	</div>
	<div class="tell">
		<a href="#" data-reveal-id="myModal2">Tip en ven</a>
	</div>
</div>

	<?php // afterDisplayTitle Event
	echo $this->product->event->afterDisplayTitle ?>

	<?php
	// Product Edit Link
	echo $this->edit_link;
	// Product Edit Link END
	?>

	<?php
	// PDF - Print - Email Icon
	if (VmConfig::get('show_emailfriend') || VmConfig::get('show_printicon') || VmConfig::get('pdf_button_enable')) {
	?>
		<div class="icons">
		<?php
		//$link = (JVM_VERSION===1) ? 'index2.php' : 'index.php';
		$link = 'index.php?tmpl=component&option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $this->product->virtuemart_product_id;
		$MailLink = 'index.php?option=com_virtuemart&view=productdetails&task=recommend&virtuemart_product_id=' . $this->product->virtuemart_product_id . '&virtuemart_category_id=' . $this->product->virtuemart_category_id . '&tmpl=component';

		if (VmConfig::get('pdf_icon', 1) == '1') {
		echo $this->linkIcon($link . '&format=pdf', 'COM_VIRTUEMART_PDF', 'pdf_button', 'pdf_button_enable', false);
		}
		echo $this->linkIcon($link . '&print=1', 'COM_VIRTUEMART_PRINT', 'printButton', 'show_printicon');
		echo $this->linkIcon($MailLink, 'COM_VIRTUEMART_EMAIL', 'emailButton', 'show_emailfriend');
		?>
		<div class="clear"></div>
		</div>
	<?php }

	if (!empty($this->product->customfieldsSorted['ontop'])) {
	$this->position = 'ontop';
	echo $this->loadTemplate('customfields');
	} // Product Custom ontop end

	// event onContentBeforeDisplay
	echo $this->product->event->beforeDisplayContent;
	?>

	<div class="pro-content">
	<div class="pro-content-left">
<?php
echo $this->loadTemplate('images');
?>
	</div>

	<div class="pro-content-right">
		<h3>Varenr. <?php echo $this->product->product_sku?></h3>
<?php
		// TODO in Multi-Vendor not needed at the moment and just would lead to confusion
		/* $link = JRoute::_('index2.php?option=com_virtuemart&view=virtuemart&task=vendorinfo&virtuemart_vendor_id='.$this->product->virtuemart_vendor_id);
		  $text = JText::_('COM_VIRTUEMART_VENDOR_FORM_INFO_LBL');
		  echo '<span class="bold">'. JText::_('COM_VIRTUEMART_PRODUCT_DETAILS_VENDOR_LBL'). '</span>'; ?><a class="modal" href="<?php echo $link ?>"><?php echo $text ?></a><br />
		 */

		if ($this->showRating){
			$maxrating = VmConfig::get('vm_maximum_rating_scale', 5);

			if (empty($this->rating)) {
			?>
			<span class="vote"><?php echo JText::_('COM_VIRTUEMART_RATING') . ' ' . JText::_('COM_VIRTUEMART_UNRATED') ?></span>
				<?php
			} else {
				$ratingwidth = $this->rating->rating * 24; //I don't use round as percetntage with works perfect, as for me
				?>
			<span class="vote">
	<?php echo JText::_('COM_VIRTUEMART_RATING') . ' ' . round($this->rating->rating) . '/' . $maxrating; ?><br/>
				<span title=" <?php echo (JText::_("COM_VIRTUEMART_RATING_TITLE") . round($this->rating->rating) . '/' . $maxrating) ?>" class="ratingbox" style="display:inline-block;">
				<span class="stars-orange" style="width:<?php echo $ratingwidth.'px'; ?>">
				</span>
				</span>
			</span>
			<?php
			}
		}
		if (is_array($this->productDisplayShipments)){
			foreach ($this->productDisplayShipments as $productDisplayShipment) {
			echo $productDisplayShipment . '<br />';
			}
		}
		if (is_array($this->productDisplayPayments)){
			foreach ($this->productDisplayPayments as $productDisplayPayment) {
			echo $productDisplayPayment . '<br />';
			}
		}

	// Product Description
	if (!empty($this->product->product_desc)) {
		echo $this->product->product_desc;
	}

    if($this->product->price_of_number && $this->product->price_quantity_start){
        echo '<br /><br />Ved køb af '.$this->product->price_quantity_start.' eller flere er prisen '.str_replace('.', ',', number_format($this->product->price_of_number,2)).' kr. pr. stk.';
    }
	// Availability Image
	$stockhandle = VmConfig::get('stockhandle', 'none');
	if (($this->product->product_in_stock - $this->product->product_ordered) < 1){?>
		<div class="bnt-outofstock" style="margin-top: 17px">
<?php echo (file_exists(JPATH_BASE . DS . VmConfig::get('assets_general_path') . 'images/availability/' . VmConfig::get('rised_availability'))) ? JHTML::image(JURI::root() . VmConfig::get('assets_general_path') . 'images/availability/' . VmConfig::get('rised_availability', '7d.gif'), VmConfig::get('rised_availability', '7d.gif'), array('class' => 'availability')) : VmConfig::get('rised_availability'); ?>
		</div>
		<?php
		}else{?>
		<div class="bnt-ready-ship"></div>
		<?php
		}

	// Product Price?>
<div class="w-price">
	<div class="w-price-left">
<?php
			// the test is done in show_prices
		//if ($this->show_prices and (empty($this->product->images[0]) or $this->product->images[0]->file_is_downloadable == 0)) {
			echo $this->loadTemplate('showprices');
		//}

$model		= VmModel::getModel("shipmentmethod");
$shipment	= $model->getShipments();
$shipment = $shipment[1];
?>
	</div>
	<div class="w-price-right">
		<div class="bnt-see-price">
			<a href="#" class="tooltip">
			<span>Du får gratis forsendelse, hvis din samlede bestilling er på mere end 500 DKK.<br />
Hvis din bestilling er under 500 DKK, vil fragten være 39 DKK uden omdeling og 49 DKK med omdeling.<br />
BEKMÆRK! Varer leveres kun i Danmark med undtagelse af Grønland og Færøerne
</span></a>
		</div><!--.bnt-see-price-->
	</div>
</div>
<?php
		// Add To Cart Button
// 			if (!empty($this->product->prices) and !empty($this->product->images[0]) and $this->product->images[0]->file_is_downloadable==0 ) {
//		if (!VmConfig::get('use_as_catalog', 0) and !empty($this->product->prices['salesPrice'])) {
		if((($this->product->product_in_stock - $this->product->product_ordered) > 0) && (!$this->product->product_delivery))
			echo $this->loadTemplate('addtocart');
//		}

// Ask a question about this product
if (VmConfig::get('ask_question', 1) == 1){
	?>
			<div class="ask-a-question">
				<a class="ask-a-question" href="<?php echo $this->askquestion_url ?>" ><?php echo JText::_('COM_VIRTUEMART_PRODUCT_ENQUIRY_LBL') ?></a>
				<!--<a class="ask-a-question modal" rel="{handler: 'iframe', size: {x: 700, y: 550}}" href="<?php echo $this->askquestion_url ?>"><?php echo JText::_('COM_VIRTUEMART_PRODUCT_ENQUIRY_LBL') ?></a>-->
			</div>
		<?php }

		// Manufacturer of the Product
		if (VmConfig::get('show_manufacturers', 1) && !empty($this->product->virtuemart_manufacturer_id)) {
			//echo $this->loadTemplate('manufacturer');
		}
		?>
	</div>
	</div>
	<?php
	if (!empty($this->product->customfieldsSorted['normal'])){
	$this->position = 'normal';
	echo $this->loadTemplate('customfields');
	}
	// Product Packaging
	$product_packaging = '';
	if ($this->product->product_box) {
	?>
		<div class="product-box">
		<?php
			echo JText::_('COM_VIRTUEMART_PRODUCT_UNITS_IN_BOX') .$this->product->product_box;
		?>
		</div>
	<?php } // Product Packaging END
	?>
<?php
	// onContentAfterDisplay event
	echo $this->product->event->afterDisplayContent; ?>
	</div>
	<?php
	// Product Files
	// foreach ($this->product->images as $fkey => $file) {
	// Todo add downloadable files again
	// if( $file->filesize > 0.5) $filesize_display = ' ('. number_format($file->filesize, 2,',','.')." MB)";
	// else $filesize_display = ' ('. number_format($file->filesize*1024, 2,',','.')." KB)";

	/* Show pdf in a new Window, other file types will be offered as download */
	// $target = stristr($file->file_mimetype, "pdf") ? "_blank" : "_self";
	// $link = JRoute::_('index.php?view=productdetails&task=getfile&virtuemart_media_id='.$file->virtuemart_media_id.'&virtuemart_product_id='.$this->product->virtuemart_product_id);
	// echo JHTMl::_('link', $link, $file->file_title.$filesize_display, array('target' => $target));
	// }
	if (!empty($this->product->customfieldsRelatedProducts)) {
	echo $this->loadTemplate('relatedproducts');
	} // Product customfieldsRelatedProducts END

	if (!empty($this->product->customfieldsSorted['onbot'])) {
		$this->position='onbot';
		echo $this->loadTemplate('customfields');
	} // Product Custom ontop end
	?>
    </div>
</div>
<?php if($this->product->product_delivery){
	$db = JFactory::getDBO();
	$db->setQuery("SELECT introtext FROM #__content WHERE id = 16");	
	$text = $db->loadResult();
?>
<div class="w-frm-login reveal-modal" id="myModal1">
	<a class="close-reveal-modal" href="javascript:void(0);"></a>	
	<div class="frm-login"><div class="logo2" style="text-align:left;border-bottom: none"><?php echo $text;?></div></div>
</div>
<?php }?>