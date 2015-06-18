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

class JoautofacebookModelAccounts extends JModelList
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
		$query ="SELECT f.* FROM #__joat_accounts AS f"
		.$where
		. $orderby
		;
		return $query;
	}
	
	function _buildContentOrderBy()
	{
		$option = JRequest::getVar('option');
		$mainframe = JFactory::getApplication('administrator');		
		$filter_order		= $mainframe->getUserStateFromRequest( $option.'filter_order', 'filter_order', 'f.ordering',	'cmd' );
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( $option.'filter_order_Dir', 'filter_order_Dir', '', 'word' );
		
		if (!in_array($filter_order, array('f.app_id', 'f.facebook_id', 'f.facebook_name', 'f.ordering', 'f.created', 'f.published', 'f.id'))) {
			$filter_order = 'f.ordering';
		}
		if ($filter_order == 'f.ordering'){
			$orderby 	= ' ORDER BY  f.ordering '.$filter_order_Dir;
		} else {
			$orderby 	= ' ORDER BY '.$filter_order.' '.$filter_order_Dir.' , f.ordering ';
		}
		return $orderby;
	}
	
	function _buildContentWhere()
	{
		$option = JRequest::getVar('option');
		$mainframe = JFactory::getApplication('administrator');
		$db					=& JFactory::getDBO();
		$filter_order		= $mainframe->getUserStateFromRequest( $option.'filter_order', 'filter_order', 'f.ordering', 'cmd' );
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( $option.'filter_order_Dir', 'filter_order_Dir', '', 'word' );
		$search				= $mainframe->getUserStateFromRequest( $option.'search', 'search', '', 'string' );

		if (strpos($search, '"') !== false) {
			$search = str_replace(array('=', '<'), '', $search);
		}
		$search = JString::strtolower($search);

		$where = array();
		if ($search) {
			$where[] = 'facebook_name LIKE '.$db->Quote( '%'.$db->getEscaped( $search, true ).'%', false );
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

	function &getDataid()
	{
		if (empty($this->_data)) 
		{
			$query = 'SELECT f.* FROM #__joat_accounts AS f WHERE f.id = '.$this->_id;
			$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObject();
		}
		
		if(!$this->_data)	
		{
			$this->_data = new stdclass();
			$this->_data->id=0;
			$this->_data->app_id =  null;
			$this->_data->app_secret =  null;
			$this->_data->facebook_id =  null;
			$this->_data->facebook_name =  null;
			$this->_data->accesstoken =  null;
			$this->_data->post_to_page =  null;
			$this->_data->ordering =  null;
			$this->_data->created =  null;
			$this->_data->published =  null;
		}
		
		return $this->_data;	
		
	}	
	
	public function getTable($type = 'Facebooks', $prefix = 'JoautofacebookTable', $config = array()) {
		return JTable::getInstance($type, $prefix, $config);
	}		
}