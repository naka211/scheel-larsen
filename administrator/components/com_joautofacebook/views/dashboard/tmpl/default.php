<?php
/*------------------------------------------------------------------------
# com_joautofacebook - JO Auto facebook for Joomla 1.6, 1.7, 2.5
# ------------------------------------------------------------------------
# author: http://www.joomcore.com
# copyright Copyright (C) 2011 Joomcore.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.joomcore.com
# Technical Support:  Forum - http://www.joomcore.com/Support
-------------------------------------------------------------------------*/

// No direct access
defined('_JEXEC') or die ('Restricted access');
?>
<div class="adminform">
	<div class="cpanel-left">
		<div class="cpanel">
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo JRoute::_('index.php?option=com_joautofacebook&view=postmanager')?>">
						<img alt="" src="components/com_joautofacebook/assets/images/icon-48-postmanager.png"><span><?php echo JTEXT::_('COM_JOAUTOFACEBOOK_MANAGER_ARTICLE_POSTED')?></span>
					</a>
				</div>
			</div>
		</div>
		<div class="cpanel">
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo JRoute::_('index.php?option=com_joautofacebook&view=accounts&layout=edit')?>">
						<img alt="" src="components/com_joautofacebook/assets/images/icon-48-account.png"><span><?php echo JTEXT::_('COM_JOAUTOFACEBOOK_ADD_NEW_ACCOUNT')?></span>
					</a>
				</div>
			</div>
		</div>
		<div class="cpanel">
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo JRoute::_('index.php?option=com_joautofacebook&view=accounts')?>">
						<img alt="" src="components/com_joautofacebook/assets/images/icon-48-accounts.png"><span><?php echo JTEXT::_('COM_JOAUTOFACEBOOK_ACCOUNT_MANAGER')?></span>
					</a>
				</div>	
			</div>
		</div>
		<div class="cpanel">
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo JRoute::_('index.php?option=com_joautofacebook&view=accounts')?>">
						<img alt="" src="components/com_joautofacebook/assets/images/icon-48-posts.png"><span><?php echo JTEXT::_('COM_JOAUTOFACEBOOK_POSTS_MANAGER_ON_FACEBOOK')?></span>
					</a>
				</div>
			</div>
		</div>
		<div class="cpanel">
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo JRoute::_('index.php?option=com_joautofacebook&view=settings')?>">
						<img alt="" src="components/com_joautofacebook/assets/images/icon-48-config.png"><span><?php echo JTEXT::_('COM_JOAUTOFACEBOOK_JOSETTINGS')?></span>
					</a>
				</div>
			</div>
		</div>
		<div style="clear: both;"></div>
	</div>	
</div>