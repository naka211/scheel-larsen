<?php
/*------------------------------------------------------------------------
# plg_jo_vm_autopost_facebook - JO Virtuemart Auto Post Facebook for Joomla 1.6, 1.7, 2.5
# ------------------------------------------------------------------------
# author: http://www.joomcore.com
# copyright Copyright (C) 2011 Joomcore.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.joomcore.com
# Technical Support:  Forum - http://www.joomcore.com/Support
-------------------------------------------------------------------------*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.error.error' );
jimport('joomla.plugin.plugin');
jimport( 'joomla.utilities.string' );
require_once (JPATH_ROOT . DS . 'administrator' .DS. 'components' .DS. 'com_joautofacebook' .DS. 'helpers' .DS. 'joautofacebook.php');
class plgSystemJo_vm_autopost_facebook extends JPlugin
{
	protected $table_product	= '#__virtuemart_products';	
	var $pluginName = 'Jo VM Auto Post Facebook';
	var $pluginNameHumanReadable = 'Jo VM Auto Post Facebook';
	function onAfterRender() {		
		$app = JFactory::getApplication();
		$option = JRequest::getVar('option');
		$task = JRequest::getVar('task');
		$view = JRequest::getVar('view');		
		$content_type='virtuemart';
		$product_id = JRequest::getVar('virtuemart_product_id');		
		
		if($product_id !=''){
			if(is_array($product_id)){
				$id = $product_id[0];
			}else{
				$id = $product_id;
			}
		}else{
			$id = 0;
		}	
		
		if ($option == 'com_virtuemart' && $view=='product' && ($task == 'edit' || $task =='add')) {
			$body = JResponse::getBody();
			$output = joautofacebook::facebookformpost($id, $content_type);
			$setbody = preg_replace("/<div id=\"admin-ui-tabs\">/", "\n\n".$output."\n\n<div id=\"admin-ui-tabs\">", $body);
			JResponse::setBody($setbody);
		}		
					
		return true ; 
	}
	function onAfterRoute()
	{
		$app = JFactory::getApplication();
		$option = JRequest::getVar('option');
		$task = JRequest::getVar('task');
		$view = JRequest::getVar('view');
		$post = JRequest::get('post');
		if ($option == 'com_virtuemart' && $view=='product') {
			if($task =='apply' || $task =='save'){	
				$access_token = $post['posttofacebook'];					
				if(count($access_token) >0){
					
					$product_currency = $post['mprices']['product_currency'];
					$product_currency = $product_currency[0];
					
					$db = JFactory::getDBO();
					$query = "SELECT virtuemart_currency_id, currency_symbol FROM #__virtuemart_currencies WHERE virtuemart_currency_id =".$product_currency;
					$db->setQuery($query);
					$currency = $db->loadOBject();
					
					
					if($app->isAdmin()){
						$number_positiontrim = JString::strrpos(JURI::base(), '/administrator/');
						$baseurl = substr_replace(JURI::base(), '', $number_positiontrim).'/';
					}else{
						$baseurl = JURI::base();
					}
					
					$costprice = $post['mprices']['product_price'];
					$costprice = $costprice[0];
					
					
					if($costprice =='' || $costprice ==0){
						$price = '';
					}else{
						$price = ' (Price: '.round($costprice,2).' '.$currency->currency_symbol.')';
					}
					
					$message = $post['message'];
					$title = $post['product_name'].$price;			
					
					$description = strip_tags($post['product_s_desc'].$post['product_desc']);				
					$product_id = $post['virtuemart_product_id'];
					if (!empty($product_id)) {
						$id_product = $product_id;
						$url = $baseurl.'index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id='.$product_id; 
					} else {
						$product_new_id = $this->getID($this->table_product);
						$id_product = $product_new_id;
						$url = $baseurl.'index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id='.$product_new_id;
					}					
										
					if($_FILES['upload']['name'] !=''){
						$imagename = JFile::makeSafe($_FILES['upload']['name']);
						$imagesrc = $_FILES['upload']['tmp_name'];
						$destfolder = JPATH_ROOT.DS.'images'.DS.'jo_vm_autopost';
		     				JFolder::create($destfolder, 0755);
						$imagedest = $destfolder.DS.$imagename;
						JFile::copy($imagesrc, $imagedest);
						$path_image = $baseurl.'images/jo_vm_autopost/'.$imagename;
					} elseif($post['file_title'] !='' && $_FILES['upload']['name'] ==''){
						$path_image = $baseurl.$post['file_url'];
					}elseif($post['file_title'] =='' && $_FILES['upload']['name'] ==''){
						$path_image = $baseurl.'components/com_joautofacebook/assets/default.gif';
					}					
					joautofacebook::postfacebook($access_token, $message, $title, $url, $description, $path_image);				
					joautofacebook::updatedata('virtuemart', $id_product, $message, $title, $description, $path_image, $url, date('Y-m-d'), date('Y-m-d'), implode(',',$access_token), -1);
					
				}	
			}
		}
		return true;
	}
	
	protected function getID($table)
	{
		$db = &JFactory::getDBO();		
		$prefix = $db->getPrefix();
		$table = str_replace  ('#__', $prefix, $table);
		$query = 'SHOW TABLE STATUS LIKE ' . $db->Quote($table);
		$db->setQuery($query);
		$result = $db->loadAssoc();
		$next_key = (int)$result['Auto_increment'];
		return $next_key;
	}
	
	
}
