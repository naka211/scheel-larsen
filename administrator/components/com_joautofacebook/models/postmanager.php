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
jimport('joomla.application.component.modellist');

class JoautofacebookModelPostmanager extends JModelList
{
	var $_data;
	var $_pagination = null;
	var $total		 = null;
	
	function __construct()
	{
		$option = JRequest::getVar('option');
		$mainframe = JFactory::getApplication('administrator');
		parent::__construct();
		
		// Get the pagination request variables
		$limit		= $mainframe->getUserStateFromRequest( 'global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int' );
		$limitstart	= $mainframe->getUserStateFromRequest( $option.'.limitstart', 'limitstart', 0, 'int' );
		
		// In case limit has been changed, adjust limitstart accordingly
		$limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);
		
		$this->setState('limit', $limit);
		$this->setState('limitstart', $limitstart);
		
		$array = JRequest::getVar('cid',  0, '', 'array');
		$this->setId((int)$array[0]);
	}
	
	function setId($id)
	{
		$this->_id		= $id;
		$this->_data	= null;
	}
	
	function _buildQuery()
	{
		$where		= $this->_buildContentWhere();
		$orderby	= $this->_buildContentOrderBy();
		$query ="SELECT m.* FROM #__joat_postmanager AS m"
		.$where
		. $orderby
		;
		return $query;
	}
	
	function _buildContentOrderBy()
	{
		$option = JRequest::getVar('option');
		$mainframe = JFactory::getApplication('administrator');		
		$filter_order		= $mainframe->getUserStateFromRequest( $option.'filter_order', 'filter_order', 'm.article_id',	'cmd' );
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( $option.'filter_order_Dir', 'filter_order_Dir', '', 'word' );
		
		if (!in_array($filter_order, array('m.article_id', 'm.title', 'm.state', 'm.date_created', 'm.date_published'))) {
			$filter_order = 'm.article_id';
		}
		if ($filter_order == 'm.article_id'){
			$orderby 	= ' ORDER BY  m.article_id '.$filter_order_Dir;
		} else {
			$orderby 	= ' ORDER BY '.$filter_order.' '.$filter_order_Dir.' , m.article_id ';
		}
		return $orderby;
	}
	
	function _buildContentWhere()
	{
		$option = JRequest::getVar('option');
		$mainframe = JFactory::getApplication('administrator');
		$db					=& JFactory::getDBO();
		$filter_order		= $mainframe->getUserStateFromRequest( $option.'filter_order', 'filter_order', 'm.article_id', 'cmd' );
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( $option.'filter_order_Dir', 'filter_order_Dir', '', 'word' );
		$search				= $mainframe->getUserStateFromRequest( $option.'search', 'search', '', 'string' );

		if (strpos($search, '"') !== false) {
			$search = str_replace(array('=', '<'), '', $search);
		}
		$search = JString::strtolower($search);

		$where = array();
		$filter_state = JRequest::getVar('filter_state');
		if (is_numeric($filter_state)) {
			$where[] = 'm.state = '.$filter_state;
		}
		if ($search) {
			$where[] = 'title LIKE '.$db->Quote( '%'.$db->getEscaped( $search, true ).'%', false );
		}
			
		$where 		= ( count( $where ) ? ' WHERE '. implode( ' AND ', $where ) : '' );
		return $where;
	}
	
	function getData()
	{
		// Lets load the data if it doesn't already exist
		if (empty( $this->_data ))
		{
			$query = $this->_buildQuery();
			$this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));
		}
		return $this->_data;
	}
	
	function getPagination()
	{
		// Lets load the content if it doesn't already exist
		if (empty($this->_pagination)) {
			jimport('joomla.html.pagination');
			$this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit'));
		}		
		return $this->_pagination;
	}
	
	function getTotal()
	{
		// Lets load the content if it doesn't already exist
		if (empty($this->_total)) {
			$query = $this->_buildquery();
			$this->_total = $this->_getListCount($query);
		}		
		return $this->_total;
	}
}