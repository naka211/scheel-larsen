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
<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col100">
	<div class="width-60 fltlft">
		<?php if(trim($this->item->facebook_id) != '') {?>
		<fieldset class="adminform">
			<img src="http://graph.facebook.com/<?php echo $this->item->facebook_id;?>/picture" alt=""> <?php echo $this->item->facebook_name;?>
		</fieldset>	
		<?php }?>
		<fieldset class="adminform">
			<legend>Facebook Application</legend>				
			<ul class="adminformlist">
				<li>
					<label title="" class="hasTip required" for="jform_name"><?php echo JText::_("COM_JOAUTOFACEBOOK_APP_ID")?><span class="star">&nbsp;*</span></label>
					<input type="text" size="40" class="inputbox required" value="<?php echo $this->item->app_id?>" id="app_id" name="app_id" >	
				</li>
				<li>
					<label title="" class="hasTip required" for="jform_name"><?php echo JText::_("COM_JOAUTOFACEBOOK_SECREC")?><span class="star">&nbsp;*</span></label>
					<input type="text" size="40" class="inputbox required" value="<?php echo $this->item->app_secret?>" id="app_secret" name="app_secret" >
				</li>
				<div class="clr"></div>
				<div>First create a Facebook Application in your Facebook account, set App ID and App Secret and click Save to be able editing advanced user parameters.</div>
				<div style="text-align:right"><a target="_blank" href="http://developers.facebook.com/setup/" style="text-decoration:underline;font-weight:bold;">Create Application</a></div>
				<div class="clr"></div>
			</ul>	
		</fieldset>	
		<?php if(trim($this->item->app_id) !='' && trim($this->item->app_secret) !=''){ ?>
		<fieldset class="adminform">
			<legend>Facebook user infomation</legend>
			<?php 
				if($this->item->facebook_id ==""){
			?>
				<a href="<?php echo $this->loginUrl; ?>"><img src="components/com_joautofacebook/assets/images/fb_login.gif"></a>
			<?php }?>      
			<?php
			if($this->item->facebook_id !=""){
				$facebook_id = $this->item->facebook_id;
			}else{
				$facebook_id = $this->user_profile["id"];	
			}	
			if($this->item->facebook_name !=""){
				$facebook_name = $this->item->facebook_name;
			} else {
				$facebook_name = $this->user_profile["name"];
			}
			if($this->item->accesstoken !=""){
				$accesstoken =$this->item->accesstoken;
			} else {
				$accesstoken = $_SESSION[$this->app_access];
			}
			if($accesstoken !=""){
			?>
				<ul class="adminformlist">
					<li>
						<label title="" class="hasTip required" for="jform_name"><?php echo JText::_("COM_JOAUTOFACEBOOK_FACEBOOK_ID")?></label>
						<input type="text" size="40" class="inputbox required" value="<?php echo $facebook_id?>" id="facebook_id" name="facebook_id" >	
					</li>
					<li>
						<label title="" class="hasTip required" for="jform_name"><?php echo JText::_("COM_JOAUTOFACEBOOK_FACEBOOKNAME")?></label>
						<input type="text" size="40" class="inputbox required" value="<?php echo $facebook_name?>" id="facebook_name" name="facebook_name" >
					</li>
					<li>
						<label title="" class="hasTip required" for="jform_name"><?php echo JText::_("COM_JOAUTOFACEBOOK_ACCESSTOKEN")?></label>
						<input type="text" size="40" class="inputbox required" value="<?php echo $accesstoken?>" id="accesstoken" name="accesstoken" >
					</li>
					<li>
						<label title="" class="hasTip required" for="jform_name"><?php echo JText::_("COM_JOAUTOFACEBOOK_POST_TO_PAGE")?></label>
						<?php echo $this->option_select_accesstoken?>
					</li>
				</ul>	
			<?php }?>
		</fieldset>	
		<?php }?>
		<fieldset class="adminform">
			<legend>Publishing Options</legend>
			<ul class="adminformlist">
				<li>
					<label title="" class="hasTip required" for="jform_name"><?php echo JText::_("COM_JOAUTOFACEBOOK_PUBLISHED")?></label>
					<fieldset class="radio inputbox">
						<?php echo JHTML::_('select.booleanlist', 'published', '', $this->item->published) ?>
					</fieldset>
				</li>
			</ul>	
		</fieldset>	
	</div>
	
<div class="clr"></div>
<input type="hidden" name="option" value="com_joautofacebook" />
<input type="hidden" name="id" value="<?php echo $this->item->id ?>" id="id" >
<input type="hidden" name="task" value="" />
</div>
</form>