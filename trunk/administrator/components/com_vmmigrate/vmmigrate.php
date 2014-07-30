<?php
/*------------------------------------------------------------------------
# vm_migrate - Virtuemart 2 Migrator
# ------------------------------------------------------------------------
# author    Jeremy Magne
# copyright Copyright (C) 2010 Daycounts.com. All Rights Reserved.
# Websites: http://www.daycounts.com
# Technical Support: http://www.daycounts.com/en/contact/
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
-------------------------------------------------------------------------*/
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_vmmigrate')) 
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

JTable::addIncludePath( JPATH_ADMINISTRATOR.'/components/com_vmmigrate/tables' );
JHTML::stylesheet( 'admin.css', 'administrator/components/com_vmmigrate/assets/css/' );


jimport('joomla.filesystem.file');
jimport('joomla.application.component.controller');                                           

//Load the helpers
JLoader::discover('VMMigrateHelper', JPATH_COMPONENT_ADMINISTRATOR . '/helpers');
JLoader::discover('VMMigrateModel', JPATH_COMPONENT_ADMINISTRATOR . '/models');


// Get an instance of the controller prefixed by VMMigrate
$controller = JControllerLegacy::getInstance('VMMigrate');

// Perform the Request task
$controller->execute(JRequest::getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
