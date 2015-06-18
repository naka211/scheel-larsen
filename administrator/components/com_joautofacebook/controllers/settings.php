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

// No direct access.
defined('_JEXEC') or die;
jimport('joomla.application.component.controllerform');

class JoautofacebookControllerSettings extends JControllerForm
{
	function __construct()
	{
		parent::__construct();
	}
	
	function save(){
		$params = $_POST;
		if (!empty($params)) 
		{
			SettingsHelper::set('limitcharacted', $params['limitcharacted']);
			SettingsHelper::set('shorturl', $params['shorturl']);			
		}
		$this->setRedirect('index.php?option=com_joautofacebook&view=settings');
	}
}

