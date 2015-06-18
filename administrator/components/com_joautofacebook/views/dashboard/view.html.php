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
JImport('joomla.application.component.view');

class JoautofacebookViewDashboard extends JView {
	function display($tmp=null)	{
		JToolBarHelPer::title(JText::_('COM_JOAUTOFACEBOOK_DASHBOARD'),'joautofacebook_dashboard.png');
		parent::display($tmp);
	}
}

?>