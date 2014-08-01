<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
//$params		= $this->item->params;
$images = json_decode($this->item->images);
//$urls = json_decode($this->item->urls);
//$canEdit	= $this->item->params->get('access-edit');
//$user		= JFactory::getUser();

?>
<div id="profile-page">
    <h2><?php echo $this->escape($this->item->title); ?></h2>
    <?php if($images->image_intro){?>
    <a href="#"><img width="343" height="227" alt="" src="<?php echo $images->image_intro; ?>"></a>
    <?php }?>
    <?php echo $this->item->text; ?>
    <?php if($this->item->catid == 9){?>
    <div class="btn-back">
        <a href="javascript:void(0);" onclick="history.back();">Tilbage</a>
    </div><!--.bnt-back-->
    <?php }?>
</div>