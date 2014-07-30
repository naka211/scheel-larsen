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

jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

/**
 * Script file of SPUpgrade component
 */
class com_vmmigrateInstallerScript {

    /**
     * method to install the component
     *
     * @return void
     */
    function install($parent) {
        // $parent is the class calling this method
        //$parent->getParent()->setRedirectURL('index.php?option=com_spupgrade');
    }

    /**
     * method to uninstall the component
     *
     * @return void
     */
    function uninstall($parent) {
        // $parent is the class calling this method
    }

    /**
     * method to update the component
     *
     * @return void
     */
    function update($parent) {
        // $parent is the class calling this method
    }

    /**
     * method to run before an install/update/uninstall method
     *
     * @return void
     */
    function preflight($type, $parent) {

        $jversion = new JVersion();

        // Installing component manifest file version
        $component_version = $parent->get("manifest")->version;
        $joomla_version_dest = $jversion->getShortVersion();
        $minimun_version = $parent->get("manifest")->attributes()->minimum_version;
        $maximun_version = $parent->get("manifest")->attributes()->maximum_version;

        //abort if version less than minimun
        if ($minimun_version && version_compare($joomla_version_dest, $minimun_version, 'lt')) {
            Jerror::raiseWarning(null, 'Cannot install in a Joomla release prior to ' . $minimun_version);
            return false;
        }
        // abort if the current Joomla release is older
        if ($maximun_version && version_compare($joomla_version_dest, $maximun_version.'.9999', 'gt')) {
            Jerror::raiseWarning(null, 'Cannot install in a Joomla release greater than ' . $maximun_version);
            return false;
        }
    
    }

    /**
     * method to run after an install/update/uninstall method
     *
     * @return void
     */
    function postflight($route, $parent) {

		if ($route=='update') {
			
			//Remove the non-pro migrators from the migrators folder
			$oldfiles = array();
			$migrators = JFolder::files(JPATH_ADMINISTRATOR.'/components/com_vmmigrate/migrators','.php');
			jimport('joomla.application.component.model');
			JLoader::discover('VMMigrateHelper', JPATH_ADMINISTRATOR.'/components/com_vmmigrate/helpers');
			JLoader::discover('VMMigrateModel', JPATH_ADMINISTRATOR.'/components/com_vmmigrate/models');
			JLoader::discover('VMMigrateModel', JPATH_ADMINISTRATOR.'/components/com_vmmigrate/migrators');
			foreach ($migrators as $migrator) {
				$extension = basename($migrator,'.php');
				if ($extension != 'joomla' & $extension != 'virtuemart') {
					$model = JModelLegacy::getInstance( $extension,'VMMigrateModel' );
					if (!$model->isPro) {
						$oldfiles[] = JPATH_ADMINISTRATOR.'/components/com_vmmigrate/migrators/'.$extension.'.php';
					}
				}
			}
			foreach ($oldfiles as $oldfile) {
				if (JFile::exists($oldfile))
					JFile::delete($oldfile);
			}
		}
        // $parent is the class calling this method
        // $type is the type of change (install, update or discover_install)
		$link = 'index.php?option=com_vmmigrate';
		echo '<br><br><a href="'.$link.'">OK</a>';
    }    
}
