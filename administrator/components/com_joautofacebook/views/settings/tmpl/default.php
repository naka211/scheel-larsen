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

$shorturl = array(
	array('value'=>'1', 'text'=>'Link Default'),
	array('value'=>'2', 'text'=>'Is_Gd'),
	array('value'=>'3', 'text'=>'Tiny Url'),
);
?>
<form action="" method="post" name="adminForm" id="adminForm">
	<div class="col100">
		<div class="width-60 fltlft">
			<fieldset class="adminform">
				<legend>Settings</legend>				
				<ul class="adminformlist">
					<li>
						<label title="" class="hasTip required" for="jform_name"><?php echo JText::_("COM_JOAUTOFACEBOOK_LIMIT_CHARACTED_DESCRIPTION")?></label>
						<input type="text" size="20" class="inputbox required" value="<?php echo SettingsHelper::get('limitcharacted') ?>" id="limitcharacted" name="limitcharacted" >
					</li>
					<li>
						<label title="" class="hasTip required" for="jform_name"><?php echo JText::_("COM_JOAUTOFACEBOOK_SHORT_URL")?></label>
						<?php echo JHTML::_('select.genericList', $shorturl, 'shorturl', 'class="inputbox" '. '', 'value','text', SettingsHelper::get('shorturl'));?>
					</li>				
				</ul>	
			</fieldset>	
		</div>
	</div>
	<div class="clr"></div>
	<input type="hidden" name="option" value="com_joautofacebook" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
</form>	