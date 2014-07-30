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

class VMMigrateHelperFilesystem {
	
	public $mode;
	protected $source_ftp;
	public $source_path;
	protected $ftp_root;
	static $_instance;
	protected $_now;

	function __construct() {
		$params = JComponentHelper::getParams('com_vmmigrate');
		$ftp_active = $params->get('ftp_enable', 0);
		$jnow = JFactory::getDate();
		$this->_now = $jnow->toSql();
		
		if ($ftp_active) {
			$ftp_root = $params->get('ftp_root');
			$this->ftp_root = $ftp_root;
			$this->mode = 'ftp';
			$this->source_ftp = self::getSourceFtp();
		} else {
			$source_path = $params->get('source_path','foo');
			$source_path = trim($source_path);
			$this->mode = 'path';
			$this->source_path = rtrim( $source_path, "/" );
		}
	}

    public static function getInstance() {
		if (!is_object(self::$_instance)) {
			self::$_instance = new VMMigrateHelperFilesystem();
		} else {
			//We store in UTC and use here of course also UTC
			$jnow = JFactory::getDate();
			self::$_instance->_now = $jnow->toSql();
		}
		return self::$_instance;
	}
	
	public static function getSourceFtp() {

		$params = JComponentHelper::getParams('com_vmmigrate');

        $ftp_active = $params->get('ftp_enable', 0);
        $ftp_host = $params->get('ftp_host', '');
        $ftp_port = $params->get('ftp_port', '');
        $ftp_user = $params->get('ftp_user', '');
        $ftp_pass = $params->get('ftp_pass', '');
        $ftp_root = $params->get('ftp_root', '');
		$ftp_root = rtrim( $ftp_root, "/" );
		$ftp_root = '/'.ltrim( $ftp_root, "/" );

		jimport('joomla.client.ftp');
		$source_ftp = JFTP::getInstance($ftp_host, $ftp_port,array(),$ftp_user,$ftp_pass);
		//$source_ftp->chdir($ftp_root);

		return $source_ftp;
	}

	public static function isValidConnection() {
        $helper = self::getInstance();
		if ($helper->mode == 'ftp') {
			return $helper->source_ftp->isConnected();
		} else {
			return JFolder::exists($helper->source_path);
		}
	}
	
	public function FileExists($path) {
		if ($this->mode == 'ftp') {
			$filename = basename($path);
			$folder = str_replace($filename,'',$path);
			$files = $this->FilesNames($folder);
			return in_array(basename($path),$files);
		} else {
			return JFile::exists($this->source_path.$path);
		}
	}
	
	public function FolderExists($path) {
		if ($this->mode == 'ftp') {
			$folders = $this->Folders($path);
			return in_array(basename($path),$folders);
		} else {
			return JFolder::exists($this->source_path.$path);
		}
	}
	
	public function FilesNames($path) {
		if ($this->mode == 'ftp') {
			return $this->source_ftp->listNames($this->ftp_root.$path);
		} else {
			return JFolder::Files($this->source_path.$path);
		}
	}
	
	public function Files($path) {
		if ($this->mode == 'ftp') {
			return $this->source_ftp->listDetails($this->ftp_root.$path,'files');
		} else {
			return JFolder::Files($this->source_path.$path);
		}
	}
	
	public function Folders($path) {
		if ($this->mode == 'ftp') {
			return $this->source_ftp->listDetails($this->ftp_root.$path,'folders');
		} else {
			return JFolder::Folders($this->source_path.$path);
		}
	}
	
	public function IncludeFile($path) {
		if ($this->mode == 'ftp') {
			$filename = basename($path);
			$tempPath = JFactory::getConfig()->get('tmp_path');
			if (!JFolder::exists($tempPath.DS.'migrator')) {
				JFolder::create($tempPath.DS.'migrator');
			}
			$localFile = $tempPath.DS.'migrator'.DS.$filename;
			//Check if the file was recently downloaded
			if (JFile::exists($localFile)) {
				$time = @filemtime($localFile);
				if (($time + 900) < time()) { //File is outdated, delete and get a fresh copy
					@unlink($localFile);
					$this->source_ftp->get($tempPath.DS.'migrator'.DS.$filename,$this->ftp_root.$path);
				}
			} else {
				$this->source_ftp->get($tempPath.DS.'migrator'.DS.$filename,$this->ftp_root.$path);
			}
			if (JFile::exists($localFile)) {
				include_once($localFile);
				return true;
			} else {
				return false;
			}
		} else {
			$localFile = $this->source_path.$path;
			if (JFile::exists($localFile)) {
				include_once($localFile);
				return true;
			} else {
				return false;
			}
		}
	}
	
	public function ReadFile($path) {
		if ($this->mode == 'ftp') {
			$buffer = '';
			$this->source_ftp->read($this->ftp_root.$path,$buffer);
			return $buffer;
		} else {
			if (JFile::exists($this->source_path.$path)) {
				//return $this->source_path.$path;
				$buffer = file_get_contents($this->source_path.$path);
				$buffer = str_replace('<?php','',$buffer);
				$buffer = str_replace('?>','',$buffer);
				return $buffer.'';
			}
			return '';
			//return JFile::read($this->source_path.$path);
		}
	}
	
	public function CopyFile($src,$dest) {
		if (!JFolder::exists(dirname($dest))) {
			JFolder::create(dirname($dest));
		}
		if ($this->mode == 'ftp') {
			return $this->source_ftp->get($dest,$this->ftp_root.$src);
		} else {
			return JFile::copy($this->source_path.$src,$dest);
		}
	}
	
	public function CopyFolder($src,$dest) {
		if ($this->mode == 'ftp') {
			$files = $this->Files($src);
			foreach ($files as $file) {
				$this->source_ftp->get($dest,$this->ftp_root.$src);
			}
			return $this->source_ftp->get($dest,$this->ftp_root.$src);
		} else {
			return JFolder::copy($this->source_path.$src,$dest,'',true);
		}
	}
	

}

?>