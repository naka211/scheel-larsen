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

// No direct access.
defined('_JEXEC') or die;
jimport('joomla.application.component.controllerform');

class JoautofacebookControllerPostmanager extends JControllerForm
{
	function __construct()
	{
		parent::__construct();
		$this->registerTask('unpublish','publish');
	}
		
	function publish()
	{
		$db=& JFactory::getDBO();
		$cid = JRequest::getVar('cid', array(), '', 'array' );
		$publish	= ( $this->getTask() == 'publish' ? -1 : 1 );
		$cids = implode( ',', $cid );
		
		//var_dump($publish); die();
		$query_itempost = 'SELECT * FROM #__joat_postmanager'.' WHERE id IN ( '. $cids .' )';
		$db->setQuery($query_itempost);
		$items = $db->loadObjectList();
		foreach($items AS $item){			
			$message = $item->message;
			$title = $item->title;
			$description = $item->description;
			$image = $item->image;
			$url = $item->url;
			$access_token = explode(',',$item->post_to);			
			joautofacebook::postfacebook($access_token, $message, $title, $url, $description, $image);			
		}
		
		$query = 'UPDATE #__joat_postmanager' . 
				' SET state = ' . (int) $publish . 
				' WHERE id IN ( '. $cids .' )';
		$db->setQuery($query);		
		if (!$db->query()) {
			JError::raiseError(500,$db->getErrorMsg());
		}		
		$this->setRedirect('index.php?option=com_joautofacebook&view=postmanager');				
	}
	
	
	function delete(){
		$db =& JFactory::getDBO();
		$cid	= JRequest::getVar( 'cid', array(), '', 'array' );
		
		JArrayHelper::toInteger($cid);
		$msg = '';
		
		for($i=0, $n=count($cid); $i<$n;$i++)
		{
			$row =& JTable::getInstance('postmanager','JoautofacebookTable');
			
			if (!$row->delete($cid[$i])) {
				$msg .= $row->getError();					 		
			}
		}		
		$this->setRedirect('index.php?option=com_joautofacebook&view=postmanager', $msg);
	}		
}
