<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin([
    'LLL:EXT:zamn/locallang_db.xml:tt_content.list_type_pi1',
    $_EXTKEY.'_pi1',
], 'list_type');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Subugoe.'.$_EXTKEY,
    'Hans',
    'Zamn Hans'
);
