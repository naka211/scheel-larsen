<?php // no direct access
defined('_JEXEC') or die('Restricted access');
$i=1;
?>
<ul>
    <?php foreach($categories as $category){
        $caturl = JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id='.$category->virtuemart_category_id);
    ?>
    <li><a href="<?php echo $caturl;?>"><?php echo $category->category_name;?></a></li>
    <?php
	}?>
</ul>