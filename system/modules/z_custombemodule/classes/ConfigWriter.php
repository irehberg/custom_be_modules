<?php

/**
 * TYPOlight webCMS
 * Copyright (C) 2005-2009 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  Yanick Witschi 2010 
 * @author     Yanick Witschi <yanick.witschi@certo-net.ch> 
 * @package    CustomBEModule 
 * @license    LGPL 
 * @filesource
 */


/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace Contao;


/**
 * Class ConfigWriter 
 *
 * @copyright  Yanick Witschi 2010 
 * @author     Yanick Witschi <yanick.witschi@certo-net.ch> 
 * @package    Controller
 */
class ConfigWriter extends \Backend
{
	/**
	 * Contains the prepared string for the config.php
	 * @var string
	 */
	protected $configString = '';
	
	/**
	 * Contains an array of the prepared languages
	 * @var array
	 */
	protected $arrLanguages = array();
	
	/**
	 * Defines whether there is at least one group or module to write
	 * @var boolean
	 */
	protected $blnHasData = false;
	
	
	/**
	 * Initialize the object and import Files
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('Files');
	}
	
	
	/**
	 * Does the update
	 */
	public function doUpdate()
	{
		// fix installation problem
		if (!$this->Database->tableExists('tl_custombemodule'))
		{
			return;
		}
		
		$this->prepareGroupConfig();
		$this->prepareModuleConfig();
		$this->prepareGroupLanguageFiles();
		$this->prepareModuleLanguageFiles();
		$this->writeData();
		
		if(strpos($this->Environment->request, '&key=generateModules') !== false)
		{
			$this->redirect(str_replace('&key=generateModules', '', $this->Environment->request));
		}
	}
	
	
	/**
	 * Write the config.php for groups
	 */
	protected function prepareGroupConfig()
	{
		$objGroups = $this->Database->prepare("SELECT * FROM tl_custombemodule WHERE type='group'")
									 ->execute();
		
		if(!$objGroups->numRows)
		{
			return;
		}
		
		// has data
		$this->blnHasData = true;
		
		while($objGroups->next())
		{
			$key = array_search($objGroups->group_position, array_keys($GLOBALS['BE_MOD']));
			
			$newKey = 0;
			if($objGroups->beforeOrafter == 'before')
			{
				$newKey = $key - 1;
				$newKey = ($newKey < 0) ? 0 : $newKey;
			}
			else
			{
				$newKey = $key;
			}
			
			$this->configString .= chr(10).'array_insert($GLOBALS[\'BE_MOD\'], '.$newKey.', array
			(
				\''.$objGroups->tabname.'\' => array()
			));'.chr(10);
		}
	}
	
	
	/**
	 * Write the config.php for modules
	 */
	protected function prepareModuleConfig()
	{
		$objModules = $this->Database->prepare("SELECT * FROM tl_custombemodule WHERE type!='group' ORDER BY pastebefore")
									 ->execute();
		
		if(!$objModules->numRows)
		{
			return;
		}
		
		// has data
		$this->blnHasData = true;
									 
		while($objModules->next())
		{
			if (is_numeric($objModules->iconUrl))
			{
				$objFile = \FilesModel::findByPk($objModules->iconUrl);
				//print_r($this->Database->execute("SELECT path FROM tl_files WHERE id=" . $objModules->iconUrl)->path);
				$strIconUrl = $objFile->path;
			}
			else
			{
				$strIconUrl = ($objModules->iconUrl != '') ? $objModules->iconUrl : 'system/modules/z_custombemodule/assets/standard.png';
			}
			
			if($objModules->specialplace < 1)
			{
				$this->configString .= chr(10).'$GLOBALS[\'BE_MOD\'][\''.$objModules->addtogroup.'\'][\''.$objModules->tabname.'\'] = array
				(
						\'callback\'     => \'CustomBEModule\',
						\'icon\'     	 => \''.$strIconUrl.'\'
				);'.chr(10);
			}
 			else
			{
				$this->configString .= chr(10).'array_insert($GLOBALS[\'BE_MOD\'][\''.$objModules->addtogroup.'\'], '.str_replace('count_','',$objModules->pastebefore).', array
				(
					\''.$objModules->tabname.'\' => array
					(
						\'callback\'     => \'CustomBEModule\',
						\'icon\'     	 => \''.$strIconUrl.'\'
					)
				));'.chr(10);
			}
		}
	}
	
	
	/**
	 * Write the languages for groups
	 */
	protected function prepareGroupLanguageFiles()
	{
		$objModules = $this->Database->prepare("SELECT * FROM tl_custombemodule WHERE type='group' ORDER BY language")
											 ->execute();
		
		while($objModules->next())
		{
			$this->arrLanguages[strtolower($objModules->language)] .= chr(10).'$GLOBALS[\'TL_LANG\'][\'MOD\'][\''.$objModules->tabname.'\'] = \''.specialchars($objModules->module_name).'\';'.chr(10);
		}
	}
	
	
	/**
	 * Write the languages for modules
	 */
	protected function prepareModuleLanguageFiles()
	{
		$objModules = $this->Database->prepare("SELECT * FROM tl_custombemodule WHERE type!='group' ORDER BY language")
											 ->execute();
		
		while($objModules->next())
		{	
			$this->arrLanguages[strtolower($objModules->language)] .= chr(10).'$GLOBALS[\'TL_LANG\'][\'MOD\'][\''.$objModules->tabname.'\'] = array(\''.specialchars($objModules->module_name).'\', \''.specialchars($objModules->descr).'\');'.chr(10);
		}
	}
	
	
	/**
	 * Write content to files
	 */
	protected function writeData()
	{
		if(!$this->blnHasData)
		{
			$this->configString = chr(10).'$arrDummy = array();'.chr(10);
		}
		
		// config.php
		// set chmod
		if(!$this->Files->is_writeable('system/modules/z_custombemodule/config/config.php'))
		{
			$this->Files->chmod('system/modules/z_custombemodule/config/config.php', 0777);
		}
		
		$objFile = new File('system/modules/z_custombemodule/config/config.php');

		$strContent = $objFile->getContent();
		
		preg_match_all('~### CUSTOMCONFIG START ###(.+)### CUSTOMCONFIG END ###~Us', $strContent, $arrMatches);
		
		$objFile->write(str_replace($arrMatches[1],$this->configString,$strContent));
		$objFile->close();
		$objFile = null;
		
		// languages do not have to be parsed if there is no module at all
		if(!$this->blnHasData)
		{
			return;
		}

		// languages, modules.php
		foreach($this->arrLanguages as $language => $languageString)
		{
			// set chmod
			if(!$this->Files->is_writeable('system/modules/z_custombemodule/languages/'.$language.'/modules.php'))
			{
				$this->Files->chmod('system/modules/z_custombemodule/languages/'.$language.'/modules.php', 0777);
			}
			
			$objFile = new File('system/modules/z_custombemodule/languages/'.$language.'/modules.php');
			$strContent = $objFile->getContent();
			
			// check wheter the replacement tags are already there, if not add
			if(strpos($strContent, '### CUSTOMCONFIG START ###') === false)
			{
				$strReplace = str_replace('?>','### CUSTOMCONFIG START ###'.chr(10).'//dummy'.chr(10).'### CUSTOMCONFIG END ###'.chr(10).'?>',$strContent);
				$objFile->write($strReplace);
				$objFile->close();
				
				$objFile = new File('system/modules/z_custombemodule/languages/'.$language.'/modules.php');
				$strContent = $objFile->getContent();
			}
			
 			preg_match_all('~### CUSTOMCONFIG START ###(.+)### CUSTOMCONFIG END ###~Us', $strContent, $arrMatches);	

			$objFile->write(str_replace($arrMatches[1],$languageString,$strContent));
			$objFile->close();
		}
	}
}

?>