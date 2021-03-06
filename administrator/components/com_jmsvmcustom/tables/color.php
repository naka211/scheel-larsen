<?php
/**
 * @package		JMS Virtuemart Customize
 * @version		1.0
 * @copyright	Copyright (C) 2009 - 2013 Joommasters. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @Website: http://www.joommasters.com
 **/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );


class TableColor extends JTable
{
	/** @var int */
	var $id					= null;
	/** @var string */
	var $color_title		= '';
	/** @var string */
	var $color_icon			= '';
	/** @var string */
	var $ordering			= null;
	/** @var bool */
	var $published			= null;

	function __construct( &$_db )
	{
		parent::__construct( '#__jmsvm_colors', 'id', $_db );
	}


	function check()
	{
		// check for valid client id
		if (is_null($this->color_title)) {
			$this->setError(JText::_( 'Title is Null' ));
			return false;
		}
		
		return true;
	}
}
?>
