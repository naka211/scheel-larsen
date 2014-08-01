<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_banners
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

//require_once JPATH_ROOT . '/components/com_banners/helpers/banner.php';
$baseurl = JURI::base();
?>


<div class="banner">
  <div class="html_carousel">
    <div id="foo3">
    	<?php foreach($list as $item):
		$imageurl = $item->params->get('imageurl');
		?>
      <div class="slide"> <img src="<?php echo $baseurl . $imageurl;?>" />
        <div>
          <h4><?php echo $item->name;?></h4>
          <p><?php echo $item->description;?></p>
        </div>
      </div>
      <!--.slide-->
      	<?php endforeach; ?>
    </div>
    <!--#foo3-->
    <div class="clear"></div>
  </div>
  <!--.html_carousel--> 
</div>