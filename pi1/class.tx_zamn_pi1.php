<?php

declare(strict_types=1);

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

/**
 * Plugin 'zamn' for the 'zamn' extension.
 */
class tx_zamn_pi1 extends \TYPO3\CMS\Frontend\Plugin\AbstractPlugin
{
    /**
     * @var string
     */
    public $prefixId = 'tx_zamn_pi1';

    /**
     * @var string
     */
    public $scriptRelPath = 'pi1/class.tx_zamn_pi1.php';

    /**
     * @var string
     */
    public $extKey = 'zamn';

    /**
     * @var bool
     */
    public $pi_checkCHash = false;

    /**
     * The main method of the PlugIn.
     *
     * @param string $content The PlugIn content
     * @param array  $conf    The PlugIn configuration
     *
     * @return string The content that is displayed on the website
     */
    public function main($content, $conf)
    {
        $this->conf = $conf;
        $this->pi_setPiVarDefaults();
        $this->pi_loadLL();
        $this->pi_USER_INT_obj = true;

        if (\TYPO3\CMS\Core\Utility\GeneralUtility::_GET('reccheck')) {
            $content = $this->detailView();
        } else {
            $content = $this->listView();
        }

        return $this->pi_wrapInBaseClass($content);
    }

    /**
     * @return string
     */
    protected function listView(): string
    {
        $language = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(TYPO3\CMS\Core\Context\Context::class)->getAspect('language');

        $listUrl = 'http://ssgfi.sub.uni-goettingen.de/cgi-bin/ssgfi/anzeige1.pl/db=zamn/tag=SSW/words=Mathematik/dsp=title/nh=2';
        $URLContent = \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl($listUrl);
        $content = '<h4>'.$this->pi_getLL('collections').'</h4>'.$URLContent;
        $page = $this->pi_getPageLink($GLOBALS['TSFE']->id);

        $replacer = [
            'cgi-bin/ssgfi/zdmn.pl' => $page,
            '&nbsp;* * *</LI>' => sprintf('</ol><h4>%s</h4><ol>', $this->pi_getLL('persons')),
            '?t_show' => sprintf('?L='%'&t_show', $language),
        ];

        $content = strtr($content, $replacer);

        return $content;
    }

    /**
     * @return string
     */
    protected function detailView(): string
    {
        $itemUrl = 'http://ssgfi.sub.uni-goettingen.de/cgi-bin/ssgfi/zamn.pl?nh=';
        $itemUrl .= '&'.$_SERVER['QUERY_STRING'];
        $content = \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl($itemUrl);
        $start = strpos($content, '<p');
        $content = substr($content, $start);
        $content = strip_tags($content, '<p><div><a><table><tr><td>');

        return $content;
    }
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/zamn/pi1/class.tx_zamn_pi1.php']) {
    include_once $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/zamn/pi1/class.tx_zamn_pi1.php'];
}
