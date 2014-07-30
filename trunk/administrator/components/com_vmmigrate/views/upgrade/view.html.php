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
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
jimport('joomla.error.exception');

/**
 * View class for a list of tracks.
 *
 * @package		Joomla.Administrator
 * @subpackage	com_banners
 * @since		1.6
 */
class VMMigrateViewUpgrade extends JViewLegacy
{

	protected $canDo;
	protected $extensions;
	protected $steps;
	protected $demoextensions = array();
	protected $demosteps = array();
	protected $isPro;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$this->canDo 		= VMMigrateHelperVMMigrate::getActions();
		$app = JFactory::getApplication();
		$params = JComponentHelper::getParams('com_vmmigrate');
		$jversion = new JVersion();
		$joomla_version_dest = $jversion->getShortVersion();
		if ($params->get('show_spash_config', 1)) {
			$app->enqueueMessage(JText::_('VMMIGRATE_PLEASE_CONFIGURE'), 'warning');
		} else {

			//print_a($helper->isValidConnection());
			$valid_database_connection = VMMigrateHelperDatabase::isValidConnection();
			if (!$valid_database_connection) {

				if (version_compare($joomla_version_dest, 3, 'gt')) {
				} else {
					$app->enqueueMessage(JText::_('VMMIGRATE_SOURCE_DATABASE_CONNECTION_WARNING'), 'warning');
				}
				//$exception = new JException(JText::_('VMMIGRATE_SOURCE_DATABASE_CONNECTION_WARNING'),100,E_WARNING);
				//JError::throwError($exception);
			} else {
				//$readonlyuser = VMMigrateHelperDatabase::isReadonlyUser();
				//if (!$readonlyuser) {
				//	$exception = new JException(JText::_('VMMIGRATE_SOURCE_DATABASE_RIGHTS_WARNING'),100,E_NOTICE);
				//	JError::throwError($exception);
				//}
				
				$validPrefix = VMMigrateHelperDatabase::isValidPrefix();
				if (!$validPrefix) {
					$app->enqueueMessage(JText::_('VMMIGRATE_SOURCE_DATABASE_PREFIX_WARNING'), 'warning');
					//$exception = new JException(JText::_('VMMIGRATE_SOURCE_DATABASE_PREFIX_WARNING'),100,E_WARNING);
					//JError::throwError($exception);
				}
			}
	
			$valid_source_path = VMMigrateHelperFilesystem::isValidConnection();
			if (!$valid_source_path) {
				$app->enqueueMessage(JText::_('VMMIGRATE_SOURCE_PATH_STATUS_WARNING'), 'warning');
				//$exception = new JException(JText::_('VMMIGRATE_SOURCE_PATH_STATUS_WARNING'),100,E_WARNING);
				//JError::throwError($exception);
			}
			
			if (JDEBUG) {
				$app->enqueueMessage(JText::_('VMMIGRATE_TURN_OFF_DEBUG'), 'warning');
				//$exception = new JException(JText::_('VMMIGRATE_TURN_OFF_DEBUG'),100,E_NOTICE);
				//JError::throwError($exception);
			}
		}

		VMMigrateHelperVMMigrate::loadCssJs();
		
		$this->extensions = VMMigrateHelperVMMigrate::GetMigrators();
		$this->steps = VMMigrateHelperVMMigrate::GetMigratorsSteps($this->extensions);
		
		if ($params->get('show_not_pro', 0)) {
			$this->demoextensions = VMMigrateHelperVMMigrate::GetMigratorsDemo();
			$this->demosteps = VMMigrateHelperVMMigrate::GetMigratorsDemoSteps();
		}
		$this->demoextensions = array();
		
		
		$this->isPro = VMMigrateHelperVMMigrate::GetMigratorsPro($this->extensions);

		$this->addToolbar();
		VMMigrateHelperVMMigrate::setJoomlaVersionLayout($this);
		
		$this->extensionsFeed = VMMigrateHelperVMMigrate::getExtensionsRssFeed();
		
		parent::display($tpl);
	}
	
	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.6
	 */
	protected function addToolbar()
	{
		$bar = JToolBar::getInstance('toolbar');
		
		JToolBarHelper::title(JText::_('COM_VMMIGRATE'), 'vmmigrate' );

		if ($this->canDo->get('core.admin')) {
			JToolBarHelper::divider();
			JToolBarHelper::preferences('com_vmmigrate');
		}
		JToolBarHelper::divider();
		$bar->appendButton( 'Popup', 'help', JText::_('help'), 'https://www.daycounts.com/help/vm-migrator/?tmpl=component', 670, 500 );
	}

}
