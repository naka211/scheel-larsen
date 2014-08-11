<?php
//vmdebug('$this->category',$this->category);
vmdebug ('$this->category ' . $this->category->category_name);
// Check to ensure this file is included in Joomla!
defined ('_JEXEC') or die('Restricted access');

/*$edit_link = '';
if(!class_exists('Permissions')) require(JPATH_VM_ADMINISTRATOR.DS.'helpers'.DS.'permissions.php');
if (Permissions::getInstance()->check("admin,storeadmin")) {
	$edit_link = '<a href="'.JURI::root().'index.php?option=com_virtuemart&tmpl=component&view=category&task=edit&virtuemart_category_id='.$this->category->virtuemart_category_id.'">
		'.JHTML::_('image', 'images/M_images/edit.png', JText::_('COM_VIRTUEMART_PRODUCT_FORM_EDIT_PRODUCT'), array('width' => 16, 'height' => 16, 'border' => 0)).'</a>';
}

echo $edit_link; */
$app = JFactory::getApplication();
$tmpl = JURI::base().'templates/'.$app->getTemplate()."/";
if (empty($this->keyword)){
    $clcat = 29;
    $q = 'SELECT `category_parent_id` FROM `#__virtuemart_category_categories` WHERE `category_child_id`=' . $this->category->virtuemart_category_id;
    $db = JFactory::getDbo();
    $db->setQuery($q);
    $parentCategoryID = $db->loadResult();
    $parent = 0;
    if ($parentCategoryID != '0') {
       $categoryModel = VmModel::getModel('category');
       $parentCategory = $categoryModel->getCategory($parentCategoryID);

       $parent = $parentCategory->virtuemart_category_id;
    }

	?>
<?php if($this->category->virtuemart_category_id == $clcat || $parent == $clcat) { ?>
<script type="text/javascript">
    $('head').append('<link href="<?php echo $tmpl;?>css/black_style.css" rel="stylesheet" />');
</script>
<?php } ?>
<div class="template">
    <div class="product_page">
        
        <ul class="breadcrumb">
            <li><a href="index.php">Forside</a></li>
            <li><a href="product.php">CANE-LINE</a></li>
        </ul>
        <h2 class="c505050"><?php echo $this->category->category_name?></h2>
        <div class="banner">
            <div class="html_carousel">
              <div class="shawdow-banner"></div>
              <div id="foo1">
                <?php foreach ($this->category->images as $pimage) { ?>
                <div class="slide">
                  <a href="<?php echo $pimage->file_custom_link ?>"><?php echo $pimage->displayMediaFull ('width="715" height="334"', FALSE); ?></a>
                  <div class="title"><h3><?php echo ($pimage->file_custom_text_head)? $pimage->file_custom_text_head : '';?></h3><p><?php echo $pimage->file_custom_text_content ?></p>
                  </div>
                </div>
                <?php } ?>
              </div>
              <div class="clearfix"></div>
              <div class="pagination" id="block1_pag"></div>
            </div>
        </div>
        <h4 class="c505050"><?php echo $this->category->category_description; ?></h4>
        <p></p>
<!--<div id="callout" class="banner-item">
	<div class="banner-item-img">
	<?php //echo $this->category->images[0]->displayMediaFull ('width="336" height="212"', FALSE);?>
	</div>
	<div class="banner-item-content">
		<h2><?php //echo $this->category->category_name?></h2>
		<?php //echo $this->category->category_description; ?>
	</div>
	<a href="#"><span class="close"></span></a>
</div>-->
<?php
}

/* Show child categories */

if (VmConfig::get ('showCategory', 1) and empty($this->keyword)) {
	if ($this->category->haschildren) {

		// Category and Columns Counter
		$iCol = 1;

		// Calculating Categories Per Row
		$categories_per_row = VmConfig::get ('categories_per_row', 3);
?>

<div id="category"><ul>

<?php // Start the Output
		if (!empty($this->category->children)) {
			foreach ($this->category->children as $category){

				// Category Link
				$caturl = JRoute::_ ('index.php?option=com_virtuemart&view=category&virtuemart_category_id=' . $category->virtuemart_category_id);

				// Show Category

				// Show the horizontal seperator
				if ($iCol == $categories_per_row)
					$row_class=' class="n-m-r"';
				else
					$row_class="";
?>
	<li<?php echo $row_class?>>
        <a href="<?php echo $caturl ?>" title="<?php echo $category->category_name ?>">
		<div class="cate-img">
		<?php echo $category->images[0]->displayMediaThumb ('width="115"', FALSE);?>
		</div>
		<p class="cate-title">
		<?php echo $category->category_name ?>
		</p>
        </a>
	</li>
<?php
				// Do we need to close the current row now?
				if ($iCol == $categories_per_row) {
					$iCol = 1;
				} else {
					$iCol++;
				}
			}
		}
		// Do we need a final closing row tag?
		if ($iCol != 1) {
?>
	<div class="clear"></div>
<?php	}?>
</ul></div>
<?php
	}else{

/* Show products */

		if (!empty($this->products)){
?>
<div class="orderby-displaynumber">
	<div class="sorter">
		<div style="padding: 10px;border-bottom: 1px solid #CACACA">
		<?php echo $this->orderByList['orderby']; ?>
		Visning <?php echo $this->vmPagination->getLimitBox (); ?>
		<div class="pagination"><?php echo $this->vmPagination->getPagesLinks (); ?></div>
		</div>
		<form id="mf_form_filters" action="<?php echo JURI::current()?>" method="post">
		<?php echo $this->orderByList['manufacturer']; ?>
		</form>
	</div>
</div>
<div class="product"><ul>
<?php
	// Category and Columns Counter
	$iBrowseCol = 1;

	// Calculating Products Per Row
	$ppr = $this->perRow;

	// Start the Output
	foreach($this->products as $product){
		$link=JRoute::_ ( 'index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id );
		if($iBrowseCol == 1)
			echo '<div>';

		// Show the horizontal seperator
		if ($iBrowseCol == $ppr)
			$row_class=' class="no-mar"';
		else
				$row_class="";

		// Show Products
		?>
		<li<?php echo $row_class?>>
			<div class="img-pro" style="text-align:center">
<?php // Product Image
			if ($product->images) 
				echo $product->images[0]->displayMediaThumb( null, false );
?>
			</div>
			<p class="title">
				<?php echo (mb_strlen($product->product_name,"UTF-8") < 62) ? $product->product_name : mb_substr($product->product_name, 0, 61, "UTF-8")."…"?>
			</p>

				<div class="price">
					<p class="new-price">
<?php
				if (VmConfig::get ( 'show_prices' ))
					echo $this->currency->priceDisplay($product->prices['salesPrice'],0,1.0,false,$this->currency->_priceConfig['salesPrice'][1] );
?>
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
						<div class="add-cart"><?php if($product->product_in_stock - $product->product_ordered < 1){?>
						<span style="color: #F33;text-transform: uppercase;text-decoration: none;font-weight: bold;font-size: 16px;">UDSOLGT</span>
<?php }else{?>
	<?php if(!$product->product_delivery){?>
        <a rel="<?php echo $product->virtuemart_product_id?>">Læg i Kurv</a>
    <?php }?>
<?php }?></div>
					<?php if(!empty($product->prices['discountAmount'])){?>
						<div class="sale-off"><img src="templates/<?php echo $template?>/img/tilbud.png" width="67" height="67" alt=""></div>
					<?php }?>
	</a>
</div>
		</li> <!-- end of product -->
		<?php

		// Do we need to close the current row now?
		if ($iBrowseCol == $ppr){
			$iBrowseCol = 1;
			echo '<div class="clear"></div></div>';
		} else {
			$iBrowseCol++;
		}

	} // end of foreach ( $this->products as $product )
if($iBrowseCol != 1)
	echo '<div class="clear"></div></div>';
?>
</ul></div>
<div class="orderby-displaynumber">
	<div class="sorter">
		<div style="padding: 10px;border-bottom: 1px solid #CACACA">
			<?php echo $this->orderByList['orderby']; ?>
			Visning <?php echo $this->vmPagination->getLimitBox (); ?>
			<div class="pagination"><?php echo $this->vmPagination->getPagesLinks (); ?></div>
		</div>
	</div>
</div>

<a id="btnAddItem" style="display:none;"></a>
<script type="text/javascript">
	jQuery(".add-cart a").click(function(e){
	jQuery.ajax( {
	type: "POST",
	url: "index.php?quantity%5B%5D=1&option=com_virtuemart&view=cart&virtuemart_product_id%5B%5D="+jQuery(this).attr("rel")+"&task=add",
	data: jQuery(this).serialize(),
	success: function( response ){
		cart_update();
		jQuery("#btnAddItem").click();
	}
	});
	return false;
});
</script>
	<?php
		}
	}
        ?>
    </div>
</div>
<?php }
?>