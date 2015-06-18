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
defined('_JEXEC') or die();

Class JoautofacebookTableAccounts extends JTable
{
	public function __construct(&$db)
	{
		parent::__construct('#__joat_accounts', 'id', $db);
	}
	
	public function check()
	{
		$this->app_id = trim($this->app_id);
		$this->app_secret = trim($this->app_secret);
		// Check for valid name.
		if (empty($this->app_id) || empty($this->app_secret)) {
			$this->setError(JText::_('COM_JOAUTOFACEBOOK_APP_ID_SECRET_VALIDATE'));
			return false;
		}
		return true;
	}
}
?>