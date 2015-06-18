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
defined('_JEXEC') or die ('Restricted access');
JImport('joomla.application.component.view');
class JoautofacebookViewAccounts extends JView {
	function display($tmp=null)	{
		$mainframe = JFactory::getApplication();
		$layout = $this->getLayout();
		$this->state		= $this->get('State');
		switch($layout){
			case 'edit':
				$item		=& $this->get('Dataid');
				$isNew		= ($item->id < 1);
				$text = $isNew ? JText::_('COM_JOAUTOFACEBOOK_FACEBOOK_NEW') : JText::_('COM_JOAUTOFACEBOOK_FACEBOOK_EDIT');
				JToolBarHelPer::title($text,'joautofacebook_account.png');
				JToolBarHelper::apply('accounts.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('accounts.save', 'JTOOLBAR_SAVE');
				JToolBarHelper::cancel('accounts.cancel', 'JTOOLBAR_CLOSE');
				
				if($item->app_id !='' && $item->app_secret !=''){
					$facebook = new Facebook(array(
						'appId'  => $item->app_id,
					  	'secret' => $item->app_secret,
					));
					
					$user = $facebook->getUser();					
					if ($user) {
						try {
							// Proceed knowing you have a logged in user who's authenticated.
							$user_profile = $facebook->api('/me');
						} catch (FacebookApiException $e) {
							error_log($e);
							$user = null;
						}
					}
					if ($user) {
						$logoutUrl = $facebook->getLogoutUrl();
					} else {
						$loginUrl = $facebook->getLoginUrl();
					}
					$this->assignRef('user_profile', $user_profile);
					$this->assignRef('user', $user);
					$this->assignRef('loginUrl', $loginUrl);
					$this->assignRef('logoutUrl', $logoutUrl);
					//get accesstoken
					$app_access = "fb_".$item->app_id."_access_token";					
					if($item->accesstoken !=""){						
						$access_token = $item->accesstoken;
					} else {
						$access_token = @$_SESSION[$app_access];
					}
					
					if($item->facebook_id !=""){
						$facebook_id = $item->facebook_id;
					}else{
						$facebook_id = $user_profile["id"];	
					}	
										
					if($access_token !=""){				
						$groupPage  = joautofacebook::getGroup($access_token);		
						$pagesToken = joautofacebook::accessTokenPages($access_token);
						$lookup = explode(',', $item->post_to_page);
						$options = array();
						//facebook Personal page
						$options[] = JHTML::_('select.option', $facebook_id.'|'.$access_token, 'Facebook Personal page', 'access_token', 'name');
						//Facebook fan pages
						foreach(@$pagesToken['data'] as $option_page){
							$options[] = JHTML::_('select.option', $option_page['id'].'|'.$option_page['access_token'], $option_page['name'].' - ['.$option_page['category'].']', 'access_token', 'name');
						}
						//facebook groups pages
						foreach(@$groupPage['data'] as $option_group){						
							$options[] = JHTML::_('select.option', $option_group['id'].'|'.$access_token, $option_group['name'].' - [Groups]', 'access_token', 'name');
						}
						
						$option_select_accesstoken = JHTML::_('select.genericlist',  $options, 'access_token_accounts[]', 'class="inputbox" style="width:235px;" multiple="multiple" size="10"', 'access_token', 'name', $lookup);
					}
					$this->assignRef('app_access', $app_access);
					$this->assignRef('option_select_accesstoken', $option_select_accesstoken);
				}
				
				$this->assignRef('item',$item);
				
			break;
			case 'default':
				JToolBarHelPer::title(JText::_('COM_JOAUTOFACEBOOK_ACCOUNTS'),'joautofacebook_accounts.png');
				JToolBarHelper::addNew('accounts.add');
				JToolBarHelper::editList('accounts.edit');
				JToolBarHelper::divider();
				JToolBarHelper::publish('accounts.publish', 'JTOOLBAR_PUBLISH', true);
				JToolBarHelper::unpublish('accounts.unpublish', 'JTOOLBAR_UNPUBLISH', true);
				JToolBarHelper::deleteList('', 'accounts.delete', 'JTOOLBAR_DELETE');
				
				$items =& $this ->get('Data');
				$pagination = & $this->get( 'Pagination' );
								
				$filter_order		= $mainframe->getUserStateFromRequest( $option.'filter_order', 'filter_order', 'f.id',	'cmd' );
				$filter_order_Dir	= $mainframe->getUserStateFromRequest( $option.'filter_order_Dir', 'filter_order_Dir', '', 'word' );				
				if (!in_array($filter_order, array('f.app_id', 'f.facebook_id', 'f.facebook_name', 'f.ordering', 'f.created', 'f.published', 'f.id'))) {
					$filter_order = 'f.id';
				}
				//search
				$search	= $mainframe->getUserStateFromRequest( $option.'search', 'search', '', 'string' );
				if (strpos($search, '"') !== false) {
					$search = str_replace(array('=', '<'), '', $search);
				}
				
				$search = JString::strtolower($search);
				$lists['search']= $search;
				$lists['order_Dir'] = $filter_order_Dir;
				$lists['order'] = $filter_order;
				
				$this->assignRef('items',$items);
				$this->assignRef('pagination',	$pagination);
				$this->assignRef('lists', $lists);
				
				break;
			case 'facebookpost':
				JToolBarHelPer::title(JText::_('COM_JOAUTOFACEBOOK_POST_MANAGER_ON_FACEBOOK'),'joautofacebook_posts.png');
				JToolBarHelper::deleteList('', 'accounts.removepost', 'JTOOLBAR_DELETE');
				JToolBarHelper::cancel('accounts.cancel', 'JTOOLBAR_CLOSE');
				$item		=& $this->get('Dataid');
				$accesstokens_post = $item->post_to_page;
				$arr_accesstokens_post = explode(',', $accesstokens_post);
				
				$this->assignRef('app_id', $item->app_id);
				$this->assignRef('app_secret', $item->app_secret);
				$this->assignRef('arr_accesstokens_post', $arr_accesstokens_post);
				$this->assignRef('items', $item);
			break;	
		}
		parent::display($tmp);
	}
	
}

?>