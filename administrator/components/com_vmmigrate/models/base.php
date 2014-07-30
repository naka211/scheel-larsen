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
jimport('joomla.client.helper');
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

class VMMigrateModelBase extends JModelLegacy {

	public $isPro = false;

	protected $status;
	//protected $source_path;
	protected $destination_db;
	protected $source_db;
	protected $pk;
	protected $limit = 100; //Number of rows to deal with at a time
	protected $total_transfered = 0;
	protected $moreResults = false;
    protected $params;
	protected $steps;
	protected $current_step;
	protected $extension;
	protected $source_filehelper;
	protected $joomfishInstalled;
	protected $baseLanguage;
	protected $additionalLanguages = array();
	
    function __construct($config = array()) {
        parent::__construct($config);
        $config = JFactory::getConfig();

        $this->params = JComponentHelper::getParams('com_vmmigrate');
		//$source_path = $this->params->get('source_path');
		//$this->source_path = rtrim( $source_path, "/" );
		$this->destination_db = JFactory::getDBO();
        $this->source_db = VMMigrateHelperDatabase::getSourceDb();
        $this->source_filehelper = VMMigrateHelperFilesystem::getInstance();
        $this->joomla_version_src = self::getJoomlaVersionSource();
        $this->joomla_version = $this->joomla_version_src;
        $this->joomla_version_dest = self::getJoomlaVersionDest();

		$this->baseLanguage = $this->getDefaultLanguage();
		if (self::isInstalledSource('com_joomfish')) {
			$this->joomfishInstalled = true;
			$langs = $this->getAdditionalLanguages();
			$this->additionalLanguages = ($langs) ? $langs : array();
		} else {
			$this->joomfishInstalled = false;
			$this->additionalLanguages = array();
		}

    }

	public static function getSteps() {
		return array();
	}
	
	public function setExtension($extension) {
		$this->extension = $extension;
	}
	
	public function execute_step($step,$steps) {

		$this->steps = $steps;
		$this->current_step = $step;
        $this->logStep($step);
		
		$process_more = $this->$step();
		$this->setNext($process_more);
		
		return $this->status;
	}
	
	protected function setNext($process_more=false) {
		$current = $this->current_step;
		if ($process_more) {
			$this->status['next'] = $current;
			$this->status['nextName'] = JText::_($current);
			//print_a($this->status);
		} else {
			$steps = $this->steps;
			$firstElement = current($steps);
			//$lastElement = $myArray[sizeof($steps)-1];
			$lastElement = sizeof($steps)-1;
			$currentKey = array_search($current, $steps);
			$currentValue = $steps[$currentKey];
			//$previousValue = "";
			$nextValue = "";
			if($current!=$lastElement){
				$nextKey = $currentKey + 1;
				$nextValue = isset($steps[$nextKey]) ? $steps[$nextKey] : null;
			}
			$this->status['next'] = $nextValue;
			$this->status['nextName'] = JText::_($nextValue);
			$this->status['percentage'] = 100;
		}
	}

	/********************/
	/* Database actions */
	/********************/
	protected function copy_one2one($table,$pk='id',$dest_table='',$dest_pk='',$where='',$log_column='') {
        $excludeids = $this->getAlreadyTransferedIds();			// Load already transfered items
		$items = $this->getItems2BTransfered($table,$pk,$excludeids,$where);	//Get a list of source objects to be transfered
        if (!$items) {
			$this->logInfo(JText::_('NOTHING_TO_TRANSFER'));
            return false;
        }
		
		if (!$dest_table) {
			$dest_table = $table;
		}
		if (!$dest_pk) {
			$dest_pk = $pk;
		}
		
		
        foreach ($items as $i => $item) {
			$srcid = $item[$pk];	//Set the primary key

			$extrainfo = '';
			if (array_key_exists($log_column,$item)) $extrainfo = $item[$log_column];
			elseif (array_key_exists('title',$item)) $extrainfo = $item['title'];
			elseif (array_key_exists('name',$item)) $extrainfo = $item['name'];
			
			$record = JArrayHelper::toObject($item);

			if ($pk != $dest_pk) {
				//Let's change the item to reflect pk columns change
				$this->{$dest_pk} 	= $srcid;
				$this->{$pk}		= null;				
			}
			
			try {
				$this->destination_db->transactionStart();
				$this->insertOrReplace('#__'.$dest_table, $record, $dest_pk);
				$this->destination_db->transactionCommit();
				$this->logRow($srcid,$extrainfo);
			} catch (Exception $e) {
				$this->destination_db->transactionRollback();
				$this->logError($e->getMessage(),$srcid);
			}
		}
		
		if ($this->moreResults) {
			return true;
		}
	}
	
	protected function getAlreadyTransferedIds() {
        // Load already transfered items
		$query = $this->destination_db->getQuery(true);
		$query->select('source_id')
			->from($this->destination_db->qn('#__vmmigrate_log'))
			->where($this->destination_db->qn('extension').' = '.$this->destination_db->q($this->extension))
			->where($this->destination_db->qn('task').' = '.$this->destination_db->q($this->current_step));
			//->where('state = 1');
        $this->destination_db->setQuery($query);
        $result = $this->destination_db->query();
        if (!$result) {
            $message = $this->destination_db->getErrorMsg();
	        $this->logError($message);
            return null;
        }
        $temp = $this->destination_db->loadColumn();
		$this->total_transfered = count($temp);
		return $temp;
	}
	
	protected function getItems2BTransfered($table,$pk='id',$excludeids=array(),$additional_where='',$order_by='') {
		//Get the number of source rows to calculate progression percentage
		$query = $this->source_db->getQuery(true);
		$query->select('count(*)')->from('#__'.$table);
		if ($additional_where) {
			$query->where($additional_where);
		}
        $total_src_rows = $this->source_db->setQuery($query)->loadResult();
		
		//Now get the actual records to transfer (excluding those already transfered)
		$query = $this->source_db->getQuery(true);
		$query->select('*')->from('#__'.$table);
		if (count($excludeids)) {
			$query->where($pk." NOT IN ('".implode("','",$excludeids)."')");
		}
		if ($additional_where) {
			$query->where($additional_where);
		}
		if ($order_by) {
			$query->order($order_by);
		}
        $this->source_db->setQuery($query);
		
		$result = $this->source_db->query();
		$total_rows_to_transfer = $this->source_db->getNumRows();
		if ($total_rows_to_transfer) {
			$this->status['percentage'] = round((( 100 * ($this->total_transfered + $this->limit) ) / $total_src_rows),2);
		} else {
			$this->status['percentage'] = 100;
		}
		
		if ($total_rows_to_transfer > $this->limit) {
	        $this->source_db->setQuery($query,0,$this->limit);
			$this->moreResults = true;
		} else {
			$this->moreResults = false;
		}

        if (!$result) {
            $message = $this->source_db->getErrorMsg();
	        $this->logError($message);
            return null;
        }
        $items = $this->source_db->loadAssocList();

		return $items;
	}
	
	protected function checkSlug($table,$slug,$col='slug',$srcid,$pk='id') {
		$query = $this->destination_db->getQuery(true);
		$query->select('count(*)')
			->from($table)
			->where($this->destination_db->qn($col).'='.$this->destination_db->q($slug))
			->where($this->destination_db->qn($pk).'<>'.$this->destination_db->q($srcid));
		$this->destination_db->setQuery($query);
		if ($this->destination_db->loadResult()>0) {
			$slug = uniqid($slug.'_');
		}
		return $slug;
	}

	protected function TimeToSqlDateTime($dateIn){
		if ($dateIn) {
			$date = JFactory::getDate($dateIn);
			return $date->toSql();
		} else {
			return '0000-00-00 00:00:00';
		}
	}

	protected function deleteRows($table,$where) {
		$db = $this->destination_db;
		$query = $db->getQuery(true);
		$query->delete($table)->where($where);
		$db->setQuery($query);
		$db->query();
	}
	
	protected function insertOrReplace($table,&$object,$key) {

		$db = $this->destination_db;
		
		if (is_array($object)) {
			//Start by removing the records
			$query = $db->getQuery(true);
			$query->delete($table)->where($key.'='.$db->q($object[0]->$key));
			$db->setQuery($query);
			$db->query();
			
			foreach ($object as $object_one) {
				if ($db->insertObject($table, $object_one)) {
				} else {
					throw new Exception($db->getErrorMsg());
				}
			}
			return 'multiple';
		}
		
		$query = $db->getQuery(true);
		$query->select('count(*)')
			->from($table)
			->where($key.'='.$db->q($object->$key));
		$db->setQuery($query);
		$found_record = $db->loadResult();
		if ($found_record) {
			if ($db->updateObject($table, $object, $key)) {
				return 'update';
			} else {
				$this->logError($db->getErrorMsg());
				//throw new Exception($db->getErrorMsg());
			}
		} else {
			if ($db->insertObject($table, $object, $key)) {
				return 'insert';
			} else {
				$this->logError($db->getErrorMsg());
				//throw new Exception($db->getErrorMsg());
			}
		}
	}

	protected function resetAutoIncrements() {
		$sql = 'SHOW TABLE STATUS';
		$this->destination_db->setQuery($sql);
		$tables  = $this->destination_db->loadObjectList();
		foreach ($tables as $table) {
			if ($table->Engine == 'MyISAM') {
				$sql .= "ALTER TABLE ".$table->Name." AUTO_INCREMENT = 1;";
				try {
					$this->destination_db->setQuery($sql)->query();
				} catch (Exception $e) {
				}
			}
		}
	}

	protected function migrateComponentSettings($src_where='',$dst_where='',$properties=array()) {
		
		$query = $this->source_db->getQuery(true);
		$oldparams = new JRegistry();

		if (version_compare($this->joomla_version_src, '1.6', 'ge')) {
			$query->select($this->source_db->qn('params'))
				->from('#__extensions')
				->where($src_where);
			$this->source_db->setQuery($query);
			$component = $this->source_db->setQuery($query)->loadObject();
			$oldparams->loadString($component->params, 'JSON');
		} else {
			$query->select($this->source_db->qn('params'))
				->from('#__components')
				->where($src_where);
			$this->source_db->setQuery($query);
			$component = $this->source_db->setQuery($query)->loadObject();
			$oldparams->loadString($component->params, 'INI');
		}
		
		
		$query_dest = $this->destination_db->getQuery(true);
		$query_dest->select('*')
			->from('#__extensions')
			->where($this->destination_db->qn('type').'='.$this->destination_db->q('component'))
			->where($dst_where);
		$extension = $this->destination_db->setQuery($query_dest)->loadObject();
		$newparams = new JRegistry();
		$newparams->loadString($extension->params, 'JSON');
		
		if (count($properties)) {
			foreach ($properties as $src_property => $dest_property) {
				$newparams->set($dest_property,$oldparams->get($src_property));
			}
		} else {
			$properties = $oldparams->toArray();
			foreach ($properties as $property => $v) {
				$newparams->set($property,$oldparams->get($property));
			}
		}
		
		$extension->params = $newparams->toString('JSON');

		try {
			$this->destination_db->transactionStart();
			$this->destination_db->updateObject('#__extensions', $extension, 'extension_id');
			foreach ($properties as $property => $v) {
				$this->logInfo($property);
			}
		} catch (Exception $e) {
			$this->destination_db->transactionRollback();
			$this->logError($e->getMessage(),$srcid);
		}
	}
	
	/******************/
	/* Log management */
	/******************/
	public function reset_log() {

		$query = $this->destination_db->getQuery(true);
		$query->delete('#__vmmigrate_log')
			->where("extension = ".$this->destination_db->q($this->extension))
			->where("task in ('".implode("','",$this->steps)."')");
			
		if (count($this->steps)==1 && $this->steps[0]=='reset_log') {
			$query = $this->destination_db->getQuery(true);
			$query->delete('#__vmmigrate_log')
				->where("extension = ".$this->destination_db->q($this->extension));
		}
		$this->destination_db->setQuery($query);
		if ($this->destination_db->query()) {
	        $this->logInfo(JText::_('HISTORY_PURGED'));
		} else {
	        $this->logError($this->destination_db->getErrorMsg());
		}
	}

	
	public function reset_log_error() {

		$query = $this->destination_db->getQuery(true);
		$query->delete('#__vmmigrate_log')
			->where("extension = ".$this->destination_db->q($this->extension))
			->where("task in ('".implode("','",$this->steps)."')")
			->where("state = 3");
			
		if (count($this->steps)==1 && $this->steps[0]=='reset_log') {
			$query = $this->destination_db->getQuery(true);
			$query->delete('#__vmmigrate_log')
				->where("extension = ".$this->destination_db->q($this->extension));
		}
		$this->destination_db->setQuery($query);
		if ($this->destination_db->query()) {
	        $this->logInfo(JText::_('HISTORY_PURGED'));
		} else {
	        $this->logError($this->destination_db->getErrorMsg());
		}
	}
	
	protected function logStep($step) {
		$this->status['step'] = $step;

		$lang = JFactory::getLanguage();
		$lang->load('com_vmmigrate.'.$this->extension,JPATH_COMPONENT_ADMINISTRATOR,null,true);		
		$this->status['stepName'] = JText::_($step);
		$this->writelogFile(JText::_($step),'step');
	}
	
	protected function logError($errorMessage,$srcid=0) {
		if ($srcid) {
			$errorMessage = JText::sprintf('ITEM_MIGRATION_ERROR',$srcid) . $errorMessage;
		}
		$this->status['logs'][] = array('type'=>'error','message'=>$errorMessage);
		$this->writeLogDb($srcid,$errorMessage,3);
		$this->writelogFile($errorMessage,'error');
	}
	
	protected function logWarning($errorMessage,$srcid=0) {
		if ($srcid) {
			$errorMessage = JText::sprintf('ITEM_MIGRATION_WARNING',$srcid) . $errorMessage;
		}
		$this->status['logs'][] = array('type'=>'warning','message'=>$errorMessage);
		$this->writeLogDb($srcid,$errorMessage,2);
		$this->writelogFile($errorMessage,'warning');
	}
	
	protected function logInfo($infoMessage,$srcid=0) {
		$this->status['logs'][] = array('type'=>'info','message'=>$infoMessage);
		
		$this->writeLogDb($srcid,$infoMessage,1);
		$this->writelogFile($infoMessage,'message');
	}
	
	protected function logTranslation($srcid,$lang,$infoMessage,$newid=0) {
		$infoMessage = JText::sprintf('VMMIGRATE_TRANSLATION_ADDED',$lang,$infoMessage);
		if ($newid) {
			$infoMessage .= ', '.JText::sprintf('ITEM_NEW_ID',$newid);
		}
		$this->status['logs'][] = array('type'=>'translation','message'=>$infoMessage);
		
		$this->writeLogDb($srcid,$infoMessage,4,$newid);
		$this->writelogFile($infoMessage,'translation');
	}
	
	protected function logRow($srcid=0,$custom_message='',$newid=0) {
		$infoMessage = JText::sprintf('ITEM_MIGRATED',$srcid);
		if ($newid) {
			$infoMessage .= ', '.JText::sprintf('ITEM_NEW_ID',$newid);
		}
		if ($custom_message) {
			$infoMessage .= ': <b>'.$custom_message.'</b>';
		}
		$this->status['logs'][] = array('type'=>'info','message'=>$infoMessage);

		$this->writeLogDb($srcid,$infoMessage,1,$newid);
		$this->writelogFile($infoMessage,'message');
	}
	
	protected function writeLogDb($srcid,$message='',$state=1,$newid=0) {
		//Insert in the history table
		$record = new stdClass();
		$record->id = null;
		$record->extension = $this->extension;
		$record->task = $this->current_step;
		$record->note = $message;
		$record->state = $state;
		$record->source_id = $srcid;
		$record->destination_id = ($newid) ? $newid : $srcid;

		$db = $this->destination_db;
		$query = $db->getQuery(true);
		$query->delete('#__vmmigrate_log')
			->where('extension = '.$db->q($record->extension))
			->where('task = '.$db->q($record->task))
			->where('source_id = '.$db->q($record->source_id));
		$db->setQuery($query)->query();
		
		$db->insertObject('#__vmmigrate_log', $record, 'id');

	}

	public function writelogFile($message, $type = 'message') {
		jimport('joomla.log.log');
		switch ($type) {
			case 'critical': 
				$error_level 	= JLog::CRITICAL; 
				break;
			case 'error': 
				$error_level 	= JLog::ERROR; 
				break;
			case 'warning': 
				$error_level 	= JLog::WARNING; 
				break;
			case 'debug': 
				$error_level 	= JLog::DEBUG; 
				break;
			case 'step': 
				$error_level 	= JLog::INFO; 
				$message		= "\n\n".$message;
				break;
			case 'message': 
			default:
				$error_level 	= JLog::INFO; 
		}
		JLog::addLogger(array('text_file' => 'com_vmmigrate.log.php'),	JLog::ALL, $this->extension.'.'.JText::_($this->current_step));	
		JLog::add($message, $error_level, $this->extension.'.'.JText::_($this->current_step));
	}

	/***********/
	/* Helpers */
	/***********/	
	public static function isInstalledBoth($element,$type='component',$folder='') {

        $isInstalledSource 	= self::isInstalledSource($element,$type,$folder);
        $isInstalledDest 	= self::isInstalledDest($element,$type,$folder);

		if ($isInstalledSource && $isInstalledDest) {
			return true;
		} else {
			return false;
		}
	}
	
	public static function getJoomlaVersion(){
		return self::getJoomlaVersionSource();
	}
	
	public static function getJoomlaVersionSource(){
		$params = JComponentHelper::getParams('com_vmmigrate');
		$joomla_version_src = $params->get('joomla_version','1.5');
		return $joomla_version_src;
	}
	
	public static function getJoomlaVersionDest() {
		$jversion = new JVersion();
		$joomla_version_dest = $jversion->getShortVersion();
		return $joomla_version_dest;
	}
	
	public static function isInstalledSource($element,$type='component',$folder='') {

		if (!VMMigrateHelperDatabase::isValidConnection()) {
			return false;
		}
		if (!VMMigrateHelperDatabase::isValidPrefix()) {
			return false;
		}
        $source_db = VMMigrateHelperDatabase::getSourceDb();

		$params = JComponentHelper::getParams('com_vmmigrate');
		$params->get('joomla_version','1.5');
		$joomla_version_src = self::getJoomlaVersionSource();
		
		//Test if the extension is installed on the source website
		$query = $source_db->getQuery(true);
		if (version_compare($joomla_version_src, '1.6', 'ge')) {
			$query->select('extension_id')
				->from('#__extensions')
				->where("element = ".$source_db->q($element))
				->where("type = ".$source_db->q($type));
		} else {
			switch ($type) {
				case 'plugin':
					$query->select('id')->from('#__plugins')->where("element = ".$source_db->q($element));
					if ($folder) {
						$query->where("folder = ".$source_db->q($folder));
					}
					break;
				case 'module':
					$query->select('id')->from('#__modules')->where("module = ".$source_db->q($element));
					break;
				case 'component':
				default:
					$query->select('id')->from('#__components')->where($source_db->qn('option')." = ".$source_db->q($element));
				
			}
		}
		$source_db->setQuery($query);
		$extension_id = $source_db->loadResult();

		if ($extension_id) {
			return true;
		} else {
			return false;
		}
	}
	
	public static function isInstalledDest($element,$type='component',$folder='') {

		$destination_db = JFactory::getDBO();

		//Test if the extension is installed on the destination website
		$query = $destination_db->getQuery(true);
		$query->select('extension_id')
			->from('#__extensions')
			->where("element = ".$destination_db->q($element))
			->where("type = ".$destination_db->q($type));
		if ($folder) {
			$query->where("folder = ".$destination_db->q($folder));
		}
		$destination_db->setQuery($query);
		$extension_id = $destination_db->loadResult();
		
		if ($extension_id) {
			return true;
		} else {
			return false;
		}
	}
	
	protected function getExtensionId($component_id) {
		
		$query = $this->source_db->getQuery(true);
		if (version_compare($this->joomla_version_src, '1.6', 'ge')) {
			$query->select($this->source_db->qn('option'))
				->from('#__extensions')
				->where("id = '".$component_id."'");
		} else {
			$query->select($this->source_db->qn('option'))
				->from('#__components')
				->where("id = '".$component_id."'");
		}
		$this->source_db->setQuery($query);
		$option = $this->source_db->loadResult();
		
		if ($option == 'com_user') $option = 'com_users';

		$query = $this->destination_db->getQuery(true);
		$query->select('extension_id')
			->from('#__extensions')
			->where("element = '".$option."'");
		$this->destination_db->setQuery($query);
		$extensionid = $this->destination_db->loadResult();
		if (!$extensionid) {
	        $this->logError('Could not find extension');
		}
		
		return $extensionid;
		
	}
	
	protected function fixMenuExtensionId($oldExtension, $newExtension='') {
		
		if (!$newExtension) {
			$newExtension = $oldExtension;
		}

		$query = $this->destination_db->getQuery(true);
		$query->select('extension_id')
			->from('#__extensions')
			->where("element = '".$newExtension."'");
		$this->destination_db->setQuery($query);
		$extensionid = $this->destination_db->loadResult();
		if (!$extensionid) {
	        $this->logError('Could not find extension');
		}
		
		$query = $this->destination_db->getQuery(true);
		$query->select('*')
			->from('#__menu')
			->where("client_id = 0")
			->where("link like '%option=".$oldExtension."%'");
		$this->destination_db->setQuery($query);
		$menu_items = $this->destination_db->loadObjectList();
		
		foreach ($menu_items as $menu_item) {
			$uri = JURI::getInstance($menu_item->link);
			$menu_item->component_id	= $extensionid;
			
			if ($this->destination_db->updateObject('#__menu', $menu_item, 'id')) {
				$this->logRow($menu_item->id);
			} else {
				$this->logError($e->getMessage(),$menu_item->id);
			}
			
		}
		return $menu_items;
		
	}
	
	protected function IniToJson($data) {
		if (!$data) return '';
		$newparams = new JRegistry();
		$newparams->loadString($data, 'INI');
		return $newparams->toString('JSON');
	}

	/***********************/
	/* Language management */
	/***********************/
	protected function getDefaultLanguage() {

		try {
			$query = $this->source_db->getQuery(true);

			$newparams = new JRegistry();
			if (version_compare($this->joomla_version_src, '1.6', 'ge')) {
				$query->select($this->source_db->qn('params'))
					->from('#__extensions')
					->where($this->source_db->qn('option')." = 'com_languages'");
				$langParams = $this->source_db->setQuery($query)->loadResult();
				$newparams->loadString($langParams, 'JSON');
			} else {
				$query->select($this->source_db->qn('params'))
					->from('#__components')
					->where($this->source_db->qn('option')." = 'com_languages'");
				$langParams = $this->source_db->setQuery($query)->loadResult();
				$newparams->loadString($langParams, 'INI');
			}
			return $newparams->get('site','en-GB');
		} catch (Exception $e) {
			return 'en-GB';
			//$this->logError($e->getMessage());
		}
		return 'en-GB';
	}
	
	protected function getAdditionalLanguages() {
		$query = $this->source_db->getQuery(true);
		if (version_compare($this->joomla_version_src, '1.6', 'ge')) {
			$query->select('*')
			->from('#__languages')
			->where($this->source_db->qn('lang_code')." <> ".$this->source_db->q($this->baseLanguage))
			->where($this->source_db->qn('published')." = 1")
			->order('ordering');
		} else {
			$query->select('*, id as lang_id')
			->from('#__languages')
			->where($this->source_db->qn('code')." <> ".$this->source_db->q($this->baseLanguage))
			->where($this->source_db->qn('active')." = 1")
			->order('ordering');
		}

		try {
			$languages = $this->source_db->setQuery($query)->loadObjectList('lang_code');
			//print_a($languages);
			return $languages;
		} catch (Exception $e) {
			return array();
			$this->logError($e->getMessage());
		}
	}
	
	protected function getTranslations($refTable,$refId,$languageId) {
		$query = $this->source_db->getQuery(true);
		$query->select('reference_field,value as translation')
			->from('#__jf_content')
			->where("reference_table = ".$this->source_db->q($refTable))
			->where("reference_id = ".$this->source_db->q($refId))
			->where("language_id = ".$this->source_db->q($languageId))
			->where("published = 1");
		try {
			$translations = $this->source_db->setQuery($query)->loadObjectList('reference_field');
			if (count($translations)) {
				//print_a($translations);
				return $translations;
			}
		} catch (Exception $e) {
			$this->logError($e->getMessage());
		}
	}
	
	protected function getTranslationsRecords(&$originalrecord,$refTable,$refId,$pk='id',$transformColumns=null,$param_column='params') {
		$langIndex = 1;
		$translatedRedords = array();
		foreach ($this->additionalLanguages as $language) {
			$translatedFields = $this->getTranslations($refTable,$refId,$language->lang_id);
			if ($translatedFields) {
				$recordLang = clone $originalrecord;
				$originalrecord->language = $this->baseLanguage;
				$recordLang->language = $language->lang_code;
				$recordLang->$pk = ($langIndex*1000)+$originalrecord->$pk;
				foreach ($translatedFields as $fieldName=>$fieldValue) {
					if (is_array($transformColumns) && isset($transformColumns[$fieldName])) {
						$fieldName = $transformColumns[$fieldName];
					}
					if (property_exists($recordLang,$fieldName)) { //Do not add a property that does not exists.
						if ($fieldName == $param_column) {
							$recordLang->{$fieldName} = $this->IniToJson($fieldValue->translation);
						} else {
							$recordLang->{$fieldName} = $fieldValue->translation;
						}
					}
				}
				$translatedRedords[] = $recordLang;
			}
			$langIndex++;
		}
		return $translatedRedords;
	}
	
	protected function get_records($table,$additional_where) {
		$query = $this->source_db->getQuery(true);
		$query->select('*')->from('#__'.$table);
		if ($additional_where) {
			$query->where($additional_where);
		}
        $records = $this->source_db->setQuery($query)->loadObjectList();
		return $records;
	}
	
	protected function get_record($table,$additional_where) {
		$query = $this->source_db->getQuery(true);
		$query->select('*')->from('#__'.$table);
		if ($additional_where) {
			$query->where($additional_where);
		}
        $record = $this->source_db->setQuery($query)->loadObject();
		return $record;
	}
	
	
}
