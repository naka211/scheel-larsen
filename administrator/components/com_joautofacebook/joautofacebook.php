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
// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_joautofacebook')) {
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

jimport('joomla.application.component.controller');
require_once JPATH_COMPONENT.'/helpers/joautofacebook.php';
require_once JPATH_COMPONENT.'/helpers/settings.php';
require_once JPATH_COMPONENT.'/tables/accounts.php';
require_once JPATH_COMPONENT.'/tables/postmanager.php';
require_once JPATH_COMPONENT.'/libraries/facebook.php';

$doc = &JFactory::getDocument();
$doc->addStyleSheet('components/com_joautofacebook/assets/joautopoststyle.css');

$controller	= JController::getInstance('joautofacebook');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();
?>
