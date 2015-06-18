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
class JoautofacebookViewPostmanager extends JView {
	function display($tmp=null)	{
		$mainframe = JFactory::getApplication();
		$layout = $this->getLayout();
		$this->state		= $this->get('State');
		switch($layout){
			case 'default':
				JToolBarHelPer::title(JText::_('COM_JOAUTOFACEBOOK_POSTMANAGER'),'joautofacebook_postmanager.png');
				JToolBarHelper::publish('postmanager.publish', 'COM_JOAUTOFACEBOOK_POSTED', true);				
				JToolBarHelper::divider();
				JToolBarHelper::deleteList('', 'postmanager.delete', 'JTOOLBAR_DELETE');
				
				$items =& $this ->get('Data');
				$pagination = & $this->get( 'Pagination' );
				
				$filter_state = array(
					array('value'=>'', 'text'=>JText::_('COM_JOAUTOFACEBOOK_SELECT_STATE')),
					array('value'=>'-1', 'text'=>JText::_('COM_JOAUTOFACEBOOK_SUCCESSFUL')),
					array('value'=>'1', 'text'=>JText::_('COM_JOAUTOFACEBOOK_PENDING')),					
				);
								
				$filter_order		= $mainframe->getUserStateFromRequest( $option.'filter_order', 'filter_order', 'm.article_id',	'cmd' );
				$filter_order_Dir	= $mainframe->getUserStateFromRequest( $option.'filter_order_Dir', 'filter_order_Dir', '', 'word' );
				
				if (!in_array($filter_order, array('m.article_id', 'm.title', 'm.state', 'm.date_created', 'm.date_published'))) {
					$filter_order = 'm.article_id';
				}
				//search
				$search	= $mainframe->getUserStateFromRequest( $option.'search', 'search', '', 'string' );
				if (strpos($search, '"') !== false) {
					$search = str_replace(array('=', '<'), '', $search);
				}
				
				$javascript 	= 'onchange="document.adminForm.submit();"';
				$lists['state'] = JHTML::_('select.genericList',$filter_state, 'filter_state', $javascript, 'value', 'text', JRequest::getVar('filter_state'));
				
				$search = JString::strtolower($search);
				$lists['search']= $search;
				$lists['order_Dir'] = $filter_order_Dir;
				$lists['order'] = $filter_order;
				
				
				$this->assignRef('items',$items);
				$this->assignRef('pagination',	$pagination);
				$this->assignRef('lists', $lists);
				
			break;			
		}
		parent::display($tmp);
	}
	
}

?>