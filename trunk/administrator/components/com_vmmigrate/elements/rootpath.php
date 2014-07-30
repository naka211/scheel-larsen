<?php
/*------------------------------------------------------------------------
# author    Jeremy Magne
# copyright Copyright (C) 2010 Daycounts.com. All Rights Reserved.
# Websites: http://www.daycounts.com
# Technical Support: http://www.daycounts.com/en/contact/
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
-------------------------------------------------------------------------*/
defined('_JEXEC') or die( 'Restricted access' );

class JFormFieldRootpath extends JFormField {

	public function getInput()	{

		$new_path = JPATH_ROOT;
		
		if ($i = stripos($new_path,'www') > 0) {
			$old_path = substr($new_path,$i);
		} else if ($i = stripos($new_path,'public_html') > 0){
			$old_path = substr($new_path,$i);
		} else {
			$i = strripos($new_path,'/'); // <<- index of the last /
			$old_path = substr($new_path,0,$i);
		}
		
		$html = '<div style="clear:none;float:left;margin:3px 0 0 2px;">';
		$html .= JText::sprintf('This Joomla instance runs in the path <u>%s</u>',$new_path);
		$html .= JText::sprintf('<br/>If the new website is installed in a subfolder of the old website, the correct path would then be <u>%s</u>',$old_path);
		$html .= '</div>';
		return $html;
	}	
	

}