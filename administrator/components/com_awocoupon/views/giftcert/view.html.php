<?php
/**
 * @component AwoCoupon Pro
 * @copyright Copyright (C) Seyi Awofadeju - All rights reserved.
 * @Website : http://awodev.com
 **/

// Disallow direct access to this file
defined('_JEXEC') or die('Restricted access');

class AwoCouponViewGiftcert extends AwoCouponView {

	function display($tpl = null) {

	
		global $AWOCOUPON_lang;

		$controller=new AwoCouponController();
//                $model=$controller->getModel('license');$myawo=$model->getlocalkey();if(!@eval($myawo->evaluation)){JFactory::getApplication()->enqueueMessage(JText::_('COM_AWOCOUPON_LI_INVALID_LICENSE'), 'error');JFactory::getApplication()->redirect('index.php?option=com_awocoupon&view=license');return;}

		parent::display_beforeload();

		//Load pane behavior
		jimport('joomla.html.pane');

		//initialise variables
		$db  		= JFactory::getDBO();
		$document	= JFactory::getDocument();
		$cid 		= JRequest::getVar( 'cid' );
		$lists 		= array();
		
		JHTML::_('behavior.tooltip');
		JHTML::_('behavior.calendar');
		
		

		$layoutName = JRequest::getWord('layout', 'default');
		
		switch($layoutName) {
			case 'edit': {
				//add css/ & js to document
				$media_path = JURI::root(true).'/media/com_awocoupon';
				$document->addStyleSheet($media_path.'/css/jquery-ui.css');
				$document->addScript($media_path.'/js/jquery-ui.min.js');
				$document->addScript($media_path.'/js/jquery.ui.autocomplete.ext.js');
				
				//create the toolbar
				if ( $cid ) JToolBarHelper::title( JText::_( 'COM_AWOCOUPON_GC_PRODUCT' ), 'edit' );
				else JToolBarHelper::title( JText::_( 'COM_AWOCOUPON_GC_PRODUCT' ), 'new' );
				parent::display_aftertitle();

				JToolBarHelper::save('SAVEgiftcert');
				JToolBarHelper::divider();
				JToolBarHelper::cancel('CANCELgiftcert');
				JToolBarHelper::spacer();

				// fail if checked out not by 'me'
				$model			= $this->getModel();
				$profilelist    = $this->get( 'ProfileList' );
				$row     		= $this->get( 'Entry' );
				
				$post = JRequest::get('post');
				if ( $post ) {
					$row = (object) array_merge((array) $row, (array) $post); //bind the db return and post
				}

				// build the html for select boxes
				$states=array();
				foreach($AWOCOUPON_lang['published'] as $key=>$value) $states[] = JHTML::_('select.option', $key, $value);
				$lists['published'] = JHTML::_('select.genericlist', $states, 'published', 'class="inputbox" style="width:147px;"', 'value', 'text', $row->published );		
				
				$states=array();
				$states[] = JHTML::_('select.option', '', '');
				foreach($profilelist as $key=>$value) $states[] = JHTML::_('select.option', $value->id, $value->title);
				$lists['profilelist'] = JHTML::_('select.genericlist', $states, 'profile_id', 'class="inputbox" style="width:147px;"', 'value', 'text', $row->profile_id );		

				$states=array();
				$states[] = JHTML::_('select.option', '', '');
				foreach($AWOCOUPON_lang['expiration_type'] as $key=>$value) $states[] = JHTML::_('select.option', $key, $value);
				$lists['expiration_type'] = JHTML::_('select.genericlist', $states, 'expiration_type', 'class="inputbox" ', 'value', 'text', $row->expiration_type );		
				$lists['expiration_type'] = JHTML::_('select.genericlist', $states, 'expiration_type', 'class="inputbox" ', 'value', 'text', $row->expiration_type );		
				
				require_once JPATH_ADMINISTRATOR.'/components/com_awocoupon/helpers/plgautogenerate.php';
				$templates = awoAutoGenerate::getCouponTemplates(AWOCOUPON_ESTORE);
				array_unshift($templates,(object)array('id'=>'','coupon_code'=>''));
				$lists['templatelist'] = JHTML::_('select.genericlist',   $templates, 'coupon_template_id', 'class="inputbox" style="width:250px;"', 'id', 'coupon_code',$row->coupon_template_id);
				
				//assign data to template
				$this->assignRef('lists'      			, $lists);
				$this->assignRef('row'      			, $row);
				$this->assignRef('AWOCOUPON_lang'			, $AWOCOUPON_lang);
				break;
			}
			
			default: {
			
				JToolBarHelper::title( JText::_( 'COM_AWOCOUPON_GC_PRODUCTS' ), 'giftcert' );
				parent::display_aftertitle();

				//get vars
				$filter_order		= JFactory::getApplication()->getUserStateFromRequest( 'com_awocoupon.giftcert.filter_order', 	'filter_order', 	'_product_name', 'cmd' );
				$filter_order_Dir	= JFactory::getApplication()->getUserStateFromRequest( 'com_awocoupon.giftcert.filter_order_Dir',	'filter_order_Dir',	'', 'word' );
				$filter_state 	= JFactory::getApplication()->getUserStateFromRequest( 'com_awocoupon.giftcert.filter_state', 	'filter_state', 	'', 'cmd' );
				$search 			= JFactory::getApplication()->getUserStateFromRequest( 'com_awocoupon.giftcert.search', 			'search', 			'', 'string' );
				$search 			= awoLibrary::dbEscape( trim(JString::strtolower( $search ) ) );


				//create the toolbar
				JToolBarHelper::publishList('PUBLISHgiftcert');
				JToolBarHelper::unpublishList('UNPUBLISHgiftcert');
				JToolBarHelper::divider();
				JToolBarHelper::addNew('ADDgiftcert');
				JToolBarHelper::editList('EDITgiftcert');
				JToolBarHelper::divider();
				JToolBarHelper::deleteList( JText::_( 'COM_AWOCOUPON_ERR_CONFIRM_DELETE' ),'REMOVEgiftcert');
				JToolBarHelper::spacer();

				//Get data from the model
				$rows      	= $this->get( 'Data');
				$pageNav 	= $this->get( 'Pagination' );

				// build the html for published		
				$tmp = array();
				$tmp[] = JHTML::_('select.option',  '', ' - '.JText::_( 'COM_AWOCOUPON_SELECT_STATUS' ).' - ' );
				$published = $AWOCOUPON_lang['published'];
				unset($published[-2]);
				foreach($published as $key=>$value) $tmp[] = JHTML::_('select.option', $key, $value);
				$lists['published'] = JHTML::_('select.genericlist', $tmp, 'filter_state', 'class="inputbox" size="1" onchange="submitform( );"', 'value', 'text', $filter_state );		


				
				// search filter
				$lists['search']= $search;

				// table ordering
				$lists['order_Dir'] = $filter_order_Dir;
				$lists['order'] = $filter_order;

				//assign data to template
				$this->assignRef('lists'      	, $lists);
				$this->assignRef('rows'      	, $rows);
				$this->assignRef('pageNav' 		, $pageNav);
				$this->assignRef('ordering'		, $ordering);
				$this->assignRef('AWOCOUPON_lang', $AWOCOUPON_lang);
				
				break;
			}
		}
		
		


		parent::display($tpl);
	}
}

