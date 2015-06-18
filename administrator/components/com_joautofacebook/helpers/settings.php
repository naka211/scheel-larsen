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
defined('_JEXEC') or die;
class SettingsHelper
{
	private static $_settings = array();
	
	private static function _load ()
	{
		$db = JFactory::getDBO();
		$db->setQuery("SELECT * FROM #__joat_settings");
		$settings = $db->loadObjectList();
		
		foreach ($settings as $setting) {
			self::$_settings[$setting->key] = $setting->value;
		}
		
	}
	
	public static function get ($key)
	{
		if (empty(self::$_settings)) {
			self::_load();
		}
		
		return (isset(self::$_settings[$key])) ? self::$_settings[$key] : null;
		
	}
	
	public static function set ($key, $value)
	{
		self::$_settings[$key] = $value;
		
		$db = JFactory::getDBO();
		$db->setQuery("REPLACE #__joat_settings SET `key`='{$key}', `value`='{$value}'");
		$db->query();
	}
}