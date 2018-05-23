<?php

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin([
    'LLL:EXT:zamn/locallang_db.xml:tt_content.list_type_pi1',
    'zamn_pi1',
], 'list_type');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Subugoe.zamn',
    'Hans',
    'Zamn Hans'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['zamn_pi1'] = 'layout,select_key';
