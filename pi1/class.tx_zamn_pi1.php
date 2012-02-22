<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 Muehlhoelzer Marianna <mmuehlh@sub.uni-goettingen.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

require_once(PATH_tslib.'class.tslib_pibase.php');


/**
 * Plugin 'zamn' for the 'zamn' extension.
 *
 * @author	Muehlhoelzer Marianna <mmuehlh@sub.uni-goettingen.de>
 * @package	TYPO3
 * @subpackage	tx_zamn
 */
class tx_zamn_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_zamn_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_zamn_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'zamn';	// The extension key.
	var $pi_checkCHash = false;
	
	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content,$conf)	{
		$this->conf=$conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();
	        $this->pi_USER_INT_obj=1;	
                $lang = array(
		0 => "de",
		1 => "en"
		);
		
		$listUrl='http://ssgfi1.sub.uni-goettingen.de/cgi-bin/ssgfi/anzeige.pl/db=zamn/tag=SSW/wor
ds=Mathematik/dsp=zamn/nh=2';
		$itemUrl='http://ssgfi1.sub.uni-goettingen.de/cgi-bin/ssgfi/zamn.pl?nh=';

                //show item
                if (isset($_GET["reccheck"])){
	        //t3lib_div::debug($_SERVER["QUERY_STRING"]);	
		$content=@file_get_contents($itemUrl."&".$_SERVER["QUERY_STRING"]);
		//t3lib_div::debug($content);
		$start=strpos($content, '<p');
		//$content = strip_tags($content, '<p><div>');
		$content = substr($content, $start);
		$content = strip_tags($content, '<p><div><a><table><tr><td>');
				
		//content="YEP";
                }
                else {
                //show list
                $listUrl='http://ssgfi1.sub.uni-goettingen.de/cgi-bin/ssgfi/anzeige.pl/db=zamn/tag=SSW/words=Mathematik/dsp=zamn/nh=2';

		//t3lib_div::debug($baseUrl);
		$listUrl .='&lang='.$lang[$GLOBALS["TSFE"]->sys_language_uid];
		//t3lib_div::debug($listUrl);
                $content="<h4>Collections</h4>" . @file_get_contents($listUrl);
		$content=str_replace("show.html", "historische-mathematik/nachlaesse/", $content);
		//t3lib_div::debug($content);

		$content = preg_replace('/<\/OL>...<OL>/','</OL><h4>Personal</h4><OL>', $content);
		$content = str_replace('?t_show', '?L=' .$GLOBALS["TSFE"]->sys_language_uid . '&t_show', $content);


		}
		return $this->pi_wrapInBaseClass($content);
		
	}
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/zamn/pi1/class.tx_zamn_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/zamn/pi1/class.tx_zamn_pi1.php']);
}

?>
