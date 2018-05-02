<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPItoST43($_EXTKEY, 'pi1/class.tx_zamn_pi1.php', '_pi1',
    'list_type', 1);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Subugoe.'.$_EXTKEY,
    'Hans',
    [
        'Index' => 'index, detail',
    ]
);
