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

class JoautofacebookControllerAccounts extends JControllerForm
{
	function __construct()
	{
		parent::__construct();
		$this->registerTask('edit','edit');
		$this->registerTask('unpublish','publish');
	}
	function edit()
	{
		JRequest::setVar( 'view', 'accounts' );
		JRequest::setVar( 'layout', 'edit'  );
		JRequest::setVar('hidemainmenu', 1);
		parent::display();
	}
	
	function facebookpost()
	{
		JRequest::setVar( 'view', 'accounts' );
		JRequest::setVar( 'layout', 'facebookpost'  );
		JRequest::setVar('hidemainmenu', 1);
		parent::display();
	}
	
	function publish()
	{
		$db=& JFactory::getDBO();
		$cid = JRequest::getVar('cid', array(), '', 'array' );
		$publish	= ( $this->getTask() == 'publish' ? 1 : 0 );
		$cids = implode( ',', $cid );
		//var_dump($publish); die();
		$query = 'UPDATE #__joat_accounts' . 
				' SET published = ' . (int) $publish . 
				' WHERE id IN ( '. $cids .' )';
		$db->setQuery($query);		
		if (!$db->query()) {
			JError::raiseError(500,$db->getErrorMsg());
		}		
		$this->setRedirect('index.php?option=com_joautofacebook&view=accounts');				
	}
	
	function save(){
		$db =& JFactory::getDBO();
		$task		= $this->getTask();
		$row =& JTable::getInstance('accounts','JoautofacebookTable');
		$post = JRequest::get( 'post' );		
		
		if (!$row->bind( $post )) {
			JError::raiseWarning('', $row->getError() );
		}
		if (!$row->check()) {
			JError::raiseWarning('', $row->getError() );
			return $this->setRedirect('index.php?option=com_joautofacebook&view=accounts&layout=edit');
		}
		if(count($post["access_token_accounts"])>0){
			$row->post_to_page = implode(',', $post["access_token_accounts"]);
		}	
		$date = JFactory::getDate()->toMySQL();
		$row->created = $date;
		if (!$row->store()) {
			JError::raiseWarning('', $row->getError() );
		}
		$facebook = new Facebook(array(
			'appId'  => $post["app_id"],
		  	'secret' => $post["app_secret"],
		));
		
		switch ($task)
		{
			case 'apply':
					$url = JURI::base().'index.php?option=com_joautofacebook&view=accounts&task=accounts.edit&cid[]='.$row->id;
					$logoutUrl = $facebook->getLogoutUrl(array('next' => $url));
					unset($_SESSION['fb_'.$post["app_id"].'_code']);
					unset($_SESSION['fb_'.$post["app_id"].'_access_token']);
					unset($_SESSION['fb_'.$post["app_id"].'_user_id']);
					$this->setRedirect($logoutUrl);
				break;

			case 'save2new':
					$url = JURI::base().'index.php?option=com_joautofacebook&view=accounts&layout=edit';
					$logoutUrl = $facebook->getLogoutUrl(array('next' => $url));
					unset($_SESSION['fb_'.$post["app_id"].'_code']);
					unset($_SESSION['fb_'.$post["app_id"].'_access_token']);
					unset($_SESSION['fb_'.$post["app_id"].'_user_id']);
					$this->setRedirect($logoutUrl);
				break;

			default:	
				$this->setRedirect(JRoute::_('index.php?option=com_joautofacebook&view=accounts', false));
				break;
		}
	}
	
	function delete(){
		$db =& JFactory::getDBO();
		$cid	= JRequest::getVar( 'cid', array(), '', 'array' );
		
		JArrayHelper::toInteger($cid);
		$msg = '';
		
		for($i=0, $n=count($cid); $i<$n;$i++)
		{
			$row =& JTable::getInstance('accounts','JoautofacebookTable');
			
			if (!$row->delete($cid[$i])) {
				$msg .= $row->getError();					 		
			}
		 	$query = 'DELETE FROM #__joat_accounts where id='.$cid[$i];
			$db -> setQuery($query);
		 	if(!$db->query()){
		 		JError::raiseError(500, $db->getErrorMsg());
		 	}
		}		
		$this->setRedirect('index.php?option=com_joautofacebook&view=accounts', $msg);
	}
	
	function removepost(){
		$db =& JFactory::getDBO();
		$cid	= JRequest::getVar( 'cid', array(), '', 'array' );
		$account_id = JRequest::getVar('account_id');
		$msg = 'Delete successful posts on facebook';		
		for($i=0, $n=count($cid); $i<$n;$i++) {
			$delete_info = explode('|',$cid[$i]);
			joautofacebook::deletepostfacebook($delete_info[0], $delete_info[1], $delete_info[2], $delete_info[4]);			
		}		
		$this->setRedirect('index.php?option=com_joautofacebook&view=accounts&layout=facebookpost&cid[]='.$account_id, $msg);
	}

	function cancel(){
		$redirect_url = JRoute::_('index.php?option=com_joautofacebook&view=accounts', false);
		$this->setRedirect($redirect_url);
	}
	
}
