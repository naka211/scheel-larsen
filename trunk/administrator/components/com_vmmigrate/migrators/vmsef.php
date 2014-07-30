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

class VMMigrateModelVmsef extends VMMigrateModelBase {

	public $isPro = true;
	var $baseLanguageTable;

    function __construct($config = array()) {
        parent::__construct($config);

		if (!self::isInstalledDest('com_virtuemart')) {
			return false;
		}

		$this->baseLanguageTable = $this->getLanguageTableSuffix($this->baseLanguage);
		if (!class_exists( 'VmConfig' )) require(JPATH_ADMINISTRATOR.'/components/com_virtuemart/helpers/config.php');
		VmConfig::loadConfig();
		$this->limit = 25;
    }
	
	public static function getSteps() {
		if (!self::isInstalledSource('com_vm_sef')) {
			return array();
		}
		$steps = array();
		$steps[] = array('name'=>'reset_log'				,'default'=>0);
		$steps[] = array('name'=>'reset_log_error'			,'default'=>1);
		//$steps[] = array('name'=>'reset_data'				,'default'=>0);
		$steps[] = array('name'=>'vmsef_vendors'			,'default'=>1, 'joomfish'=>1);
		$steps[] = array('name'=>'vmsef_manufacturers'		,'default'=>1, 'joomfish'=>1);
		$steps[] = array('name'=>'vmsef_categories'			,'default'=>1, 'joomfish'=>1);
		$steps[] = array('name'=>'vmsef_products'			,'default'=>1, 'joomfish'=>1);
		return $steps;
	}

	public function reset_data() {

		$resetall = (count($this->steps)==1 && $this->steps[0]=='reset_data');
		$sql = array();
		if (in_array('acepolls_polls',$this->steps) || $resetall) {
			$sql[] = 'TRUNCATE TABLE #__acepolls_polls;';
			$sql[] = 'TRUNCATE TABLE #__acepolls_options;';
			$sql[] = 'TRUNCATE TABLE #__acepolls_votes;';
		}
		if (in_array('acepolls_votes',$this->steps) || $resetall) {
			$sql[] = 'TRUNCATE TABLE #__acepolls_votes;';
		}

		$valid = true;
		foreach($sql as $query){
			$this->destination_db->setQuery($query);
			$result = $this->destination_db->query();
			if (!$result) {
				$valid = false;
			}
		}

		if (VMMigrateHelperDatabase::queryBatch($this->destination_db,$sql)) {
		    $this->logInfo(JText::_('DATA_RESETED'));
		} else {
			$this->logError(JText::_('DATA_RESET_ERROR'));
		}
		
	}
	
    public function vmsef_vendors() {

        $pk = 'vendor_id';
		$excludeids = $this->getAlreadyTransferedIds();			// Load already transfered items
		$items = $this->getItems2BTransfered('vm_sef_vendors',$pk,$excludeids,'published=1');	//Get a list of source objects to be transfered
        if (!$items) {
			$this->logInfo(JText::_('NOTHING_TO_TRANSFER'));
            return false;
        }

        foreach ($items as $i => $item) {
			
			$srcid = $item[$pk];	//Set the primary key
			
			$record = new stdClass();
			$record->virtuemart_vendor_id 	= $item['vendor_id'];
			$record->slug 					= $this->checkSlug('#__virtuemart_vendors_'.$this->baseLanguageTable,$item['alias'],'slug',$srcid,'virtuemart_vendor_id');
			$record->metadesc				= $item['metadesc'];
			$record->metakey				= $item['metakey'];
			
			try {
				$this->destination_db->transactionStart();
				$this->insertOrReplace('#__virtuemart_vendors_'.$this->baseLanguageTable, $record, 'virtuemart_vendor_id');
				$this->logRow($srcid,$item['alias']);
				//Joomfish
				if ($this->joomfishInstalled) {
					foreach ($this->additionalLanguages as $language) {
						$record_lang = clone $record;
						$translatedFields = $this->getTranslations('vm_sef_vendors',$srcid,$language->lang_id);
						foreach (get_object_vars($record) as $propertyName=>$propertyValue) {
							$oldPropertyName = $propertyName;
							if ($propertyName == 'slug') {$oldPropertyName = 'alias';}
							if (array_key_exists($oldPropertyName,$translatedFields)) {
								$record_lang->{$propertyName} = $translatedFields[$oldPropertyName]->translation;
							}
						}
						if ($this->insertOrReplace('#__virtuemart_vendors_'.$this->getLanguageTableSuffix($language->lang_code), $record_lang, 'virtuemart_vendor_id')) {
							$this->logTranslation($srcid,$language->lang_code,$record_lang->slug);
						}
					}
				}
				$this->destination_db->transactionCommit();
			} catch (Exception $e) {
				$this->destination_db->transactionRollback();
				$this->logError($e->getMessage(),$srcid);
			}
		}

		if ($this->moreResults) {
			return true;
		}

  	}

    public function vmsef_manufacturers() {
		
        $pk = 'manufacturer_id';
		$excludeids = $this->getAlreadyTransferedIds();			// Load already transfered items
		$items = $this->getItems2BTransfered('vm_sef_manufacturers',$pk,$excludeids,'published=1');	//Get a list of source objects to be transfered
        if (!$items) {
			$this->logInfo(JText::_('NOTHING_TO_TRANSFER'));
            return false;
        }

        foreach ($items as $i => $item) {
			
			$srcid = $item[$pk];	//Set the primary key
			
			$record = new stdClass();
			$record->virtuemart_manufacturer_id	= $item['manufacturer_id'];
			$record->slug 						= $this->checkSlug('#__virtuemart_manufacturers_'.$this->baseLanguageTable,$item['alias'],'slug',$srcid,'virtuemart_manufacturer_id');
			//$record->metadesc					= $item['metadesc'];
			//$record->metakey					= $item['metakey'];
			
			try {
				$this->destination_db->transactionStart();
				$this->insertOrReplace('#__virtuemart_manufacturers_'.$this->baseLanguageTable, $record, 'virtuemart_manufacturer_id');
				$this->logRow($srcid,$item['alias']);
				//Joomfish
				if ($this->joomfishInstalled) {
					foreach ($this->additionalLanguages as $language) {
						$record_lang = clone $record;
						$translatedFields = $this->getTranslations('vm_sef_manufacturers',$srcid,$language->lang_id);
						foreach (get_object_vars($record) as $propertyName=>$propertyValue) {
							$oldPropertyName = $propertyName;
							if ($propertyName == 'slug') {$oldPropertyName = 'alias';}
							if (array_key_exists($oldPropertyName,$translatedFields)) {
								$record_lang->{$propertyName} = $translatedFields[$oldPropertyName]->translation;
							}
						}
						if ($this->insertOrReplace('#__virtuemart_manufacturers_'.$this->getLanguageTableSuffix($language->lang_code), $record_lang, 'virtuemart_manufacturer_id')) {
							$this->logTranslation($srcid,$language->lang_code,$record_lang->slug);
						}
					}
				}
				$this->destination_db->transactionCommit();
			} catch (Exception $e) {
				$this->destination_db->transactionRollback();
				$this->logError($e->getMessage(),$srcid);
			}
		}

		if ($this->moreResults) {
			return true;
		}

  	}

    public function vmsef_categories() {

        $pk = 'category_id';
		$excludeids = $this->getAlreadyTransferedIds();			// Load already transfered items
		$items = $this->getItems2BTransfered('vm_sef_categories',$pk,$excludeids,'published=1');	//Get a list of source objects to be transfered
        if (!$items) {
			$this->logInfo(JText::_('NOTHING_TO_TRANSFER'));
            return false;
        }
		
        foreach ($items as $i => $item) {
			
			$srcid = $item[$pk];	//Set the primary key
			
			$record = new stdClass();
			$record->virtuemart_category_id	= $item['category_id'];
			$record->slug 					= $this->checkSlug('#__virtuemart_categories_'.$this->baseLanguageTable,$item['alias'],'slug',$srcid,'virtuemart_category_id');
			$record->metadesc				= $item['metadesc'];
			$record->metakey				= $item['metakey'];
			//$record->customtitle			= $item['title'];
			
			try {
				$this->destination_db->transactionStart();
				$this->insertOrReplace('#__virtuemart_categories_'.$this->baseLanguageTable, $record, 'virtuemart_category_id');
				$this->logRow($srcid,$item['alias']);
				//Joomfish
				if ($this->joomfishInstalled) {
					foreach ($this->additionalLanguages as $language) {
						$record_lang = clone $record;
						$translatedFields = $this->getTranslations('vm_sef_categories',$item['id'],$language->lang_id);
						foreach (get_object_vars($record) as $propertyName=>$propertyValue) {
							$oldPropertyName = $propertyName;
							if ($propertyName == 'slug') {$oldPropertyName = 'alias';}
							if (array_key_exists($oldPropertyName,$translatedFields)) {
								$record_lang->{$propertyName} = $translatedFields[$oldPropertyName]->translation;
							}
						}
						if ($this->insertOrReplace('#__virtuemart_categories_'.$this->getLanguageTableSuffix($language->lang_code), $record_lang, 'virtuemart_category_id')) {
							$this->logTranslation($srcid,$language->lang_code,$record_lang->slug);
						}
					}
				}
				$this->destination_db->transactionCommit();
			} catch (Exception $e) {
				$this->destination_db->transactionRollback();
				$this->logError($e->getMessage(),$srcid);
			}
		}

		if ($this->moreResults) {
			return true;
		}

  	}

    public function vmsef_products() {

        $pk = 'product_id';
		$excludeids = $this->getAlreadyTransferedIds();			// Load already transfered items
		$items = $this->getItems2BTransfered('vm_sef_products',$pk,$excludeids,'published=1');	//Get a list of source objects to be transfered
        if (!$items) {
			$this->logInfo(JText::_('NOTHING_TO_TRANSFER'));
            return false;
        }

        foreach ($items as $i => $item) {
			
			$srcid = $item[$pk];	//Set the primary key
			
			$record = new stdClass();
			$record->virtuemart_product_id	= $item['product_id'];
			$record->slug 					= $this->checkSlug('#__virtuemart_products_'.$this->baseLanguageTable,$item['alias'],'slug',$srcid,'virtuemart_product_id');
			$record->metadesc				= $item['metadesc'];
			$record->metakey				= $item['metakey'];
			//$record->customtitle			= $item['title'];
			
			try {
				$this->destination_db->transactionStart();
				$this->insertOrReplace('#__virtuemart_products_'.$this->baseLanguageTable, $record, 'virtuemart_product_id');
				$this->logRow($srcid,$item['alias']);
				//Joomfish
				if ($this->joomfishInstalled) {
					foreach ($this->additionalLanguages as $language) {
						$record_lang = clone $record;
						$translatedFields = $this->getTranslations('vm_sef_products',$srcid,$language->lang_id);
						foreach (get_object_vars($record) as $propertyName=>$propertyValue) {
							$oldPropertyName = $propertyName;
							if ($propertyName == 'slug') {$oldPropertyName = 'alias';}
							if (array_key_exists($oldPropertyName,$translatedFields)) {
								$record_lang->{$propertyName} = $translatedFields[$oldPropertyName]->translation;
							}
						}
						//$this->logWarning(print_a($record_lang,false));
						if ($this->insertOrReplace('#__virtuemart_products_'.$this->getLanguageTableSuffix($language->lang_code), $record_lang, 'virtuemart_product_id')) {
							$this->logTranslation($srcid,$language->lang_code,$record_lang->slug);
						}
					}
				}
				$this->destination_db->transactionCommit();
			} catch (Exception $e) {
				$this->destination_db->transactionRollback();
				$this->logError($e->getMessage(),$srcid);
			}
		}

		if ($this->moreResults) {
			return true;
		}

  	}

	private function getLanguageTableSuffix($lang) {
		return strtolower(str_replace('-','_',$lang));
	}
	
}
