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
class JoautofacebookViewSettings extends JView {
	function display($tmp=null)	{
		$mainframe = JFactory::getApplication();
		$layout = $this->getLayout();
		$this->state		= $this->get('State');		
		JToolBarHelPer::title(JText::_('COM_JOAUTOFACEBOOK_SETTINGS'),'joautofacebook_settings.png');
		JToolBarHelper::apply('settings.apply', 'JTOOLBAR_APPLY');
		parent::display($tmp);
	}
	
}

?>