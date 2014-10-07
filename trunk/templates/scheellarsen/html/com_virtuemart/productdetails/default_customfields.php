<?php
/**
 *
 * Show the product details page
 *
 * @package	VirtueMart
 * @subpackage
 * @author Max Milbers, Valerie Isaksen

 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2004 - 2010 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: default_customfields.php 5699 2012-03-22 08:26:48Z ondrejspilka $
 */

// Check to ensure this file is included in Joomla!
defined ( '_JEXEC' ) or die ( 'Restricted access' );
?>
<div class="old_price1" style="display:none;">
	<ul class="option clearfix">
	    <?php
	    $custom_title = null;
            $int = 0;
            
            
	    foreach ($this->product->customfieldsSorted[$this->position] as $field) {
	    	if ( $field->is_hidden ) //OSP http://forum.virtuemart.net/index.php?topic=99320.0
	    		continue;
			if ($field->display) {
				if($field->field_type == "P")
					continue;
				if($field->field_type == "S"){
	    ?>
    <!--<div class="image<?php echo $int;?>" style="display: none;"><?php echo $field->display ?></div>-->
		<li parent-id="<?php echo $field->custom_parent_id;?>"><?php echo $field->custom_value;?></li>
    <?php } ?>
	<?php
		}
		$int++;
	}
	?>
	</ul>
</div>