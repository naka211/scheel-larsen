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
Jimport('joomla.application.component.controller');

class joautofacebookController extends JController
{
	protected $default_view = 'dashboard';
	public function display($cachable = false, $urlparams = false)
	{
		// Load the submenu.
		joautofacebook::addSubmenu(JRequest::getCmd('view', 'dashboard'));
		$view	= JRequest::getCmd('view', 'dashboard');
		$layout = JRequest::getCmd('layout', 'default');
		$id		= JRequest::getInt('id');
		parent::display();
		return $this;
	}
}
?>