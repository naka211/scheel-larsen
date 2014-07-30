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
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

abstract class VMMigrateHelperDatabase {

	public static $src_database = null;

	public static function ConvertToBoolean($table, $column) {
		$db				= JFactory::getDBO();
		$query = "UPDATE ".$table. " SET ".$db->qn($column)."='0' WHERE ".$db->qn($column)."='N'";
		$db->setQuery( $query );
		if (!$result = $db->query()){return false;}
		$result = $this->AlterColumnIfExists($table, $column, $column, $attributes = "tinyint(1) NOT NULL DEFAULT '0'" );
		return $result;
	}

	public static function AlterColumnIfExists($table, $old_column, $new_column, $attributes = "INT( 11 ) NOT NULL DEFAULT '0'" ) {
		$db				= JFactory::getDBO();
		$columnExists 	= false;

		$query = 'SHOW COLUMNS FROM '.$table;
		$db->setQuery( $query );
		if (!$result = $db->query()){return false;}
		$columnData = $db->loadObjectList();
		
		foreach ($columnData as $valueColumn) {
			if ($valueColumn->Field == $old_column) {
				$columnExists = true;
				break;
			}
		}

		if ($columnExists) {
			$query = 'ALTER TABLE '.$db->qn($table).' CHANGE '.$db->qn($old_column).' '.$new_column.' '.$attributes.';';
			$db->setQuery( $query );
			if (!$result = $db->query()){return false;}
			return true;
		}
		
		return false;
	}

	public static function DropColumnIfExists($table, $column ) {
		$db				= JFactory::getDBO();
		$columnExists 	= false;

		$query = 'SHOW COLUMNS FROM '.$table;
		$db->setQuery( $query );
		if (!$result = $db->query()){return false;}
		$columnData = $db->loadObjectList();
		
		foreach ($columnData as $valueColumn) {
			if ($valueColumn->Field == $column) {
				$columnExists = true;
				break;
			}
		}

		if ($columnExists) {
			$query = 'ALTER TABLE '.$db->qn($table).' DROP '.$db->qn($column).';';
			$db->setQuery( $query );
			if (!$result = $db->query()){return false;}
			return true;
		}
		
		return false;
	}

	public static function AddColumnIfNotExists($table, $column, $attributes = "INT( 11 ) NOT NULL DEFAULT '0'", $after = '' ) {
		
		$db				= JFactory::getDBO();
		$columnExists 	= false;

		$query = 'SHOW COLUMNS FROM '.$table;
		$db->setQuery( $query );
		if (!$result = $db->query()){return false;}
		$columnData = $db->loadObjectList();
		
		foreach ($columnData as $valueColumn) {
			if ($valueColumn->Field == $column) {
				$columnExists = true;
				break;
			}
		}
		
		if (!$columnExists) {
			if ($after != '') {
				$query = 'ALTER TABLE '.$db->qn($table).' ADD '.$db->qn($column).' '.$attributes.' AFTER '.$db->qn($after).';';
			} else {
				$query = 'ALTER TABLE '.$db->qn($table).' ADD '.$db->qn($column).' '.$attributes.';';
			}
			$db->setQuery( $query );
			if (!$result = $db->query()){return false;}
		}
		
		return true;
	}

	public static function getSourceDb() {

		if (!self::$src_database)
		{
			self::$src_database = self::createSourceDbo();
		}

		return self::$src_database;
	}

	protected static function createSourceDbo()
	{
		$params = JComponentHelper::getParams('com_vmmigrate');
        $options = array(); //prevent problems 
        $options['driver'] = $params->get("driver", 'mysql');            // Local Database driver name     
        $options['host'] = $params->get("host", 'localhost');    // Database host name
        $options['user'] = $params->get("source_user_name", 'foo');       // User for database authentication
        $options['password'] = $params->get("source_password", '');   // Password for database authentication
        $options['database'] = $params->get("source_database_name", 'foo');      // Database name
        $options['prefix'] = $params->get("source_db_prefix", 'jos_');             // Database prefix (may be empty)

		try	{
			$jversion = new JVersion();
			if(version_compare($jversion->getShortVersion(), '3.0', 'ge')){
				$db = JDatabaseDriver::getInstance($options);
			} else {
		        $db = JDatabase::getInstance($options);
			}

		} catch (RuntimeException $e) {
			if (!headers_sent()) {
				header('HTTP/1.1 500 Internal Server Error');
			}
			jexit('Database Error: ' . $e->getMessage());
		}

		return $db;
	}

	public static function isValidConnection() {
        $source_db = VMMigrateHelperDatabase::getSourceDb();
		return $source_db->connected();
	}
	
	public static function isReadonlyUser() {
		$params = JComponentHelper::getParams('com_vmmigrate');
		$source_db = self::getSourceDb();
		$source_db->setQuery('SHOW GRANTS');
		$grants = $source_db->loadResult();
		
		$forbids = '/INSERT|UPDATE|DELETE|CREATE|DROP|RELOAD|SHUTDOWN|PROCESS|FILE|,';
		$forbids .= 'REFERENCES|INDEX|ALTER|SHOW\sDATABASES|SUPER|CREATE|TEMPORARY\sTABLES|CREATE|';
		$forbids .= 'EXECUTE|REPLICATION\sSLAVE|CREATE|REPLICATION\sCLIENT|CREATE\sVIEW|SHOW\sVIEW|';
		$forbids .= 'CREATE\sROUTINE|ALTER\sROUTINE|EVENT|TRIGGER/';
		
		preg_match_all($forbids, $grants, $matches,PREG_SET_ORDER,5);
		if (count($matches)) {
			return false;
		} else {
			return true;
		}
	}

	public static function isValidPrefix() {

		try {
			$source_db = VMMigrateHelperDatabase::getSourceDb();
			$query = $source_db->getQuery(true);
	
			//$query->select('count(*)')->from('#__components');
			$query->select('count(*)')->from('#__users');
	
			$source_db->setQuery($query);
			$found_extensions = $source_db->loadResult();
	
			if ($found_extensions) {
				return true;
			} else {
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
	}
	
	public static function queryBatch($db,$sql_script,$abort_on_error=true, $p_transaction_safe=true) {
		$jversion = new JVersion();
        if(version_compare($jversion->getShortVersion(), '3.0', 'ge')){
        	$queries = $db->splitSql($sql_script);
			$valid = true;
        	foreach($queries as $query){
        		$db->setQuery($query);
        		$result = $db->query();
				if (!$result) {
					$valid = false;
				}
        	}
			return $valid;
        } else {
        	$db->setQuery($sql_script);
        	return $db->queryBatch(false);
        }
	}


}

?>