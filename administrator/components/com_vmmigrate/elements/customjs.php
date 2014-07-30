<?php
/*------------------------------------------------------------------------
# author    Jeremy Magne
# copyright Copyright (C) 2010 Daycounts.com. All Rights Reserved.
# Websites: http://www.daycounts.com
# Technical Support: http://www.daycounts.com/en/contact/
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
-------------------------------------------------------------------------*/

defined ('_JEXEC') or die();

class JFormFieldCustomjs extends JFormField {

	/**
	 * Element name
	 *
	 * @access    protected
	 * @var        string
	 */
	var $_name = 'Customjs';

	public function getInput () {
		
		JLoader::discover('VMMigrateHelper', JPATH_ADMINISTRATOR.'/components/com_vmmigrate/helpers');
		VMMigrateHelperVMMigrate::loadCssJs();
		
		return '';		
	}

}