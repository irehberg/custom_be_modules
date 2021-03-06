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
$GLOBALS['TL_LANG']['tl_custombemodule']['module_name'] = array('Modulname', 'Geben Sie hier den Modulnamen ein (erscheint so in der Navigation)');
$GLOBALS['TL_LANG']['tl_custombemodule']['descr'] = array('Modulbeschreibung', 'Geben Sie hier die Modulbeschreibung ein (erscheint so auf der Startseite)');
$GLOBALS['TL_LANG']['tl_custombemodule']['language'] = array('Sprache', 'Geben Sie hier an, für welche Sprache dieses Modul gilt. Wenn Sie mehrere BE-Sprachen nutzen, müssen Sie das Modul kopieren.');
$GLOBALS['TL_LANG']['tl_custombemodule']['forwardto'] = array('Weiterleitung', 'Geben Sie hier die Weiterleitung im Stil von \'do=article&table=tl_content&id=39\' ein');
$GLOBALS['TL_LANG']['tl_custombemodule']['addtogroup'] = array('Gruppenzuordnung', 'Wählen Sie die Gruppe in welche Sie dieses Modul einfügen möchten (wird am Ende einer Kategorie aufgelistet)');
$GLOBALS['TL_LANG']['tl_custombemodule']['specialplace'] = array('Genaue Reihenfolge bestimmen?', 'Wenn Sie diese Checkbox aktivieren, können Sie zudem den genauen Platz des Navigationspunktes auswählen');
$GLOBALS['TL_LANG']['tl_custombemodule']['pastebefore'] = array('Genaue Platzierung', '<strong>Vor</strong> welchem Navigationspunkt möchten Sie dieses Modul platzieren?');
$GLOBALS['TL_LANG']['tl_custombemodule']['iconUrl'] = array('Icon', 'Wählen Sie hier das gewünschte Icon');
$GLOBALS['TL_LANG']['tl_custombemodule']['type'] = array('Typ', 'Wählen Sie den Modul-Typ aus.');
$GLOBALS['TL_LANG']['tl_custombemodule']['group_position'] = array('Referenzgruppe', 'Wählen Sie hier die Referenzgruppe. Sie können Ihre Gruppe nachher vor oder nach dieser Gruppe einfügen.');
$GLOBALS['TL_LANG']['tl_custombemodule']['beforeOrafter'] = array('Vor oder nach Referenzgruppe einfügen?', 'Bestimmen Sie hier die Einfügereihenfolge.');
$GLOBALS['TL_LANG']['tl_custombemodule']['link'] = array('Externer Link', 'Geben Sie hier den Link inkl. "http://" ein.');
$GLOBALS['TL_LANG']['tl_custombemodule']['file'] = array('Datei', 'Wählen Sie hier eine Datei aus.');


/**
 * Reference
 */
$GLOBALS['TL_LANG']['tl_custombemodule']['type']['module']	= 'Modul';
$GLOBALS['TL_LANG']['tl_custombemodule']['type']['group']	= 'Modulgruppe';
$GLOBALS['TL_LANG']['tl_custombemodule']['type']['link']	= 'Externer Link';
$GLOBALS['TL_LANG']['tl_custombemodule']['type']['file']	= 'Datei zum Download';
$GLOBALS['TL_LANG']['tl_custombemodule']['beforeOrafter']['before'] = 'Vorher';
$GLOBALS['TL_LANG']['tl_custombemodule']['beforeOrafter']['after']	= 'Nachher';


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_custombemodule']['custombemodule_legend'] = 'BE Modul generieren';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_custombemodule']['new']    = array('Neues Modul hinzufügen', 'Fügen Sie hier ein neues Modul hinzu');
$GLOBALS['TL_LANG']['tl_custombemodule']['edit']   = array('Modul editieren', 'Editieren Sie das Modul mit der ID %s');
$GLOBALS['TL_LANG']['tl_custombemodule']['copy']   = array('Modul kopieren', 'Kopieren Sie das Modul mit der ID %s');
$GLOBALS['TL_LANG']['tl_custombemodule']['delete'] = array('Modul löschen', 'Löschen Sie das Modul mit der ID %s');
$GLOBALS['TL_LANG']['tl_custombemodule']['show']   = array('Details anzeigen', 'Details des Moduls mit der ID %s zeigen');
$GLOBALS['TL_LANG']['tl_custombemodule']['generateModules'] = array('Module generieren', 'Generieren Sie die Module');

?>