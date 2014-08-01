<?php // no direct access
defined('_JEXEC') or die('Restricted access');
$i=1;
?>
<span id="add_menu" style="display:none;">
<ul class="main-sub">
	<div>
<?php foreach($categories as $category){
	if($i==7){
		$i==1;
		echo "<div>";
	}
?>
	<ul class="sub-menu">
		<h3><?php echo $category->category_name;?></h3>
<?php	foreach($category->childs as $child){
		  $caturl = JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id='.$child->virtuemart_category_id);
		?>
	<li><a href="<?php echo $caturl;?>"><?php echo $child->category_name;?></a></li>
<?php }?>
	</ul>
<?php
		if($i==6)
			echo '<div class="clear"></div></div>';
		$i++;
	}?>
	<div class="clear"></div></div>
</ul>
</span>