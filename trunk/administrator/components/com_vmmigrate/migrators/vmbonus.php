<?php
/*------------------------------------------------------------------------
# vm_migrate - Virtuemart 2 Migrator
# ------------------------------------------------------------------------
# author    Jeremy Magne
# copyright Copyright (C) 2010 Daycounts.com. All Rights Reserved.
# Websites: http://www.daycounts.com
# Technical Support: http://www.daycounts.com/en/contact/
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
-------------------------------------------------------------------------*/
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import the Joomla modellist library
jimport('joomla.application.component.model');

class VMMigrateModelVmbonus extends VMMigrateModelBase {

	public $isPro = true;

    function __construct($config = array()) {
        parent::__construct($config);
    }
	
	public static function getSteps() {
		if (!self::isInstalledBoth('com_vm_bonus')) {
			return array();
		}
		$steps = array();
		$steps[] = array('name'=>'reset_log'				,'default'=>0, 'warning'=>JText::_('VMMIGRATE_WARNING_RESET_LOG'));
		$steps[] = array('name'=>'reset_log_error'			,'default'=>1);
		$steps[] = array('name'=>'reset_data'				,'default'=>0, 'warning'=>JText::_('VMMIGRATE_WARNING_RESET_DATA'));
		$steps[] = array('name'=>'vmbonus_settings'			,'default'=>1);
		$steps[] = array('name'=>'vmbonus_rules'			,'default'=>1);
		return $steps;
	}

	public function reset_data() {

		$resetall = (count($this->steps)==1 && $this->steps[0]=='reset_data');
		$sql = array();
		if (in_array('vmbonus_rules',$this->steps) || $resetall) {
			$sql[] = 'TRUNCATE TABLE #__vm_bonus;';
		}
		
		$valid = true;
		foreach($sql as $query){
			$this->destination_db->setQuery($query);
			$result = $this->destination_db->query();
			if (!$result) {
				$valid = false;
			}
		}

		if ($valid) {
		    $this->logInfo(JText::_('DATA_RESETED'));
		} else {
			$this->logError(JText::_('DATA_RESET_ERROR'));
		}
		
	}
	
	public function vmbonus_settings() {
		
		$src_where = "`option`='com_vm_bonus'";
		$dst_where = "`element`='com_vm_bonus'";
		$properties=array();

		$this->migrateComponentSettings($src_where,$dst_where,$properties);
	}

	public function vmbonus_rules() {
		
		$pk = 'id';
        $excludeids = $this->getAlreadyTransferedIds();			// Load already transfered items
		$items = $this->getItems2BTransfered('vm_bonus',$pk,$excludeids);	//Get a list of source objects to be transfered
        if (!$items) {
			$this->logInfo(JText::_('NOTHING_TO_TRANSFER'));
            return false;
        }

		
        foreach ($items as $i => $item) {
			$srcid = $item[$pk];	//Set the primary key
			
			$record = new stdClass(); 
			$record->id						= $item['id'];
			$record->rule_name				= $item['rule_name'];
			$record->products_ids_to_have	= str_replace('|',',',$item['products_ids_to_have']);
			$record->check_stocks			= $item['check_stocks'];
			$record->check_min_order		= $item['check_min_order'];
			$record->check_max_order		= $item['check_max_order'];
			$record->userCanUpdateQty		= $item['userCanUpdateQty'];
			$record->published				= $item['published'];
			$record->ruleAmount				= $item['ruleAmount'];
			$record->shopper_group_ids		= $item['shopper_group_ids'];
			$record->product_ids_to_add		= str_replace('|',',',$item['product_ids_to_add']);
			$record->ruleDistinct			= $item['ruleDistinct'];
			$record->ruleCat				= str_replace('|',',',$item['ruleCat']);
			$record->ruleManuf				= str_replace('|',',',$item['ruleManuf']);
			$record->ruleLimit				= $item['ruleLimit'];
			//$record->filterFeatured			= 0;
			$record->ruleMaxAmount			= $item['ruleMaxAmount'];
			$record->coupon_id				= $item['coupon_id'];
			$record->upsell					= $item['upsell'];
			$record->upsell_rate			= $item['upsell_rate'];
			$record->ordering				= $item['ordering'];
			$record->last_rule				= $item['last_rule'];
			$record->publish_up				= $item['publish_up'];
			$record->publish_down			= $item['publish_down'];
			$record->upsell_msg				= $item['upsell_msg'];
			$record->product_ids_to_remove	= str_replace('|',',',$item['product_ids_to_remove']);
			$record->qty_to_add				= $item['qty_to_add'];
			$record->countProducts			= $item['countProducts'];
			$record->ruleWeight				= $item['ruleWeight'];
			$record->ruleMaxWeight			= $item['ruleMaxWeight'];
			$record->products_to_have_qty	= $item['products_to_have_qty'];
			//$record->products_to_have_qty_max			= $item['ruleLimit'];
			$record->coupon_to_have_id		= $item['coupon_to_have_id'];
			//$record->valid_rules			= $item['ruleLimit'];
			//$record->show_valid_msg			= $item['ruleLimit'];
			//$record->rule_valid_msg			= $item['ruleLimit'];
			//$record->rule_checkout			= $item['ruleLimit'];
			//$record->rule_checkout_msg			= $item['ruleLimit'];
			
			try {
				$this->destination_db->transactionStart();
				$this->insertOrReplace('#__vm_bonus', $record, 'id');
				$this->destination_db->transactionCommit();
				$this->logRow($srcid,$item['rule_name']);
			} catch (Exception $e) {
				$this->destination_db->transactionRollback();
				$this->logError($e->getMessage(),$srcid);
			}
			
		}
		
		if ($this->moreResults) {
			return true;
		}
	}

}
