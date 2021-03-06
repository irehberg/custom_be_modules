<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

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
 * Fields
 */
$GLOBALS['TL_LANG']['tl_custombemodule']['module_name'] = array('Module name', 'Choose the module\'s name (appears in the navigation).');
$GLOBALS['TL_LANG']['tl_custombemodule']['descr'] = array('Module description', 'Type the module\'s description (appears on the home page).');
$GLOBALS['TL_LANG']['tl_custombemodule']['language'] = array('Language', 'Choose the language for this module. If you\'re using multiple BE languages you need to copy this module for another language.');
$GLOBALS['TL_LANG']['tl_custombemodule']['forwardto'] = array('Forwarding', 'Enter the forwarding url like \'do=article&table=tl_content&id=39\'');
$GLOBALS['TL_LANG']['tl_custombemodule']['addtogroup'] = array('Group assignment', 'Choose the group where you would like to add the module (is going to be added at the very end).');
$GLOBALS['TL_LANG']['tl_custombemodule']['specialplace'] = array('Exact position', 'If you activate this checkbox you can then choose the exact position of the module.');
$GLOBALS['TL_LANG']['tl_custombemodule']['pastebefore'] = array('Exact position', '<strong>In front of</strong> which module would you like to place the module?');
$GLOBALS['TL_LANG']['tl_custombemodule']['iconUrl'] = array('Icon', 'Choose your icon here.');
$GLOBALS['TL_LANG']['tl_custombemodule']['type'] = array('Type', 'Choose the module type.');
$GLOBALS['TL_LANG']['tl_custombemodule']['group_position'] = array('Reference group', 'Choose your reference group. You can then insert your group before or afther that group.');
$GLOBALS['TL_LANG']['tl_custombemodule']['beforeOrafter'] = array('Insert before or after reference group?', 'Define whether you want to insert your group before or after the reference group.');
$GLOBALS['TL_LANG']['tl_custombemodule']['link'] = array('External link', 'Enter a link incl. "http://".');
$GLOBALS['TL_LANG']['tl_custombemodule']['file'] = array('File', 'Choose a file here.');

/**
 * Reference
 */
$GLOBALS['TL_LANG']['tl_custombemodule']['type']['module']	= 'module';
$GLOBALS['TL_LANG']['tl_custombemodule']['type']['group']	= 'module group';
$GLOBALS['TL_LANG']['tl_custombemodule']['type']['link']	= 'external link';
$GLOBALS['TL_LANG']['tl_custombemodule']['type']['file']	= 'file to download';
$GLOBALS['TL_LANG']['tl_custombemodule']['beforeOrafter']['before'] = 'before';
$GLOBALS['TL_LANG']['tl_custombemodule']['beforeOrafter']['after']	= 'after';


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_custombemodule']['custombemodule_legend'] = 'BE module settings';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_custombemodule']['new']    = array('Add new module', 'Add a new module');
$GLOBALS['TL_LANG']['tl_custombemodule']['edit']   = array('Edit module', 'Edit the module with ID %s');
$GLOBALS['TL_LANG']['tl_custombemodule']['copy']   = array('Copy module', 'Copy the module with ID %s');
$GLOBALS['TL_LANG']['tl_custombemodule']['delete'] = array('Delete module', 'Delete the module with ID %s');
$GLOBALS['TL_LANG']['tl_custombemodule']['show']   = array('Show details', 'Show details of the module with ID %s');
$GLOBALS['TL_LANG']['tl_custombemodule']['generateModules'] = array('Generate modules', 'Generate the modules');
?>