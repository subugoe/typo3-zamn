<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$nkwgok_data = [
    'ctrl' => [
        'title' => 'LLL:EXT:nkwgok/Resources/Private/Language/locallang_db.xml:tx_nkwgok_data',
        'label' => 'notation',
        'label_alt' => 'descr',
        'label_alt_force' => 1,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'ORDER BY crdate',
        'iconfile' => \TYPO3\CMS\Core\Utility\PathUtility::getAbsoluteWebPath($_EXTKEY).'Resources/Public/Images/ext_icon.gif',
        'searchFields' => 'descr, descr_en, notation',
    ],
    'interface' => [
        'showRecordFieldList' => 'notation,search,ppn,descr,descr_en,parent,hierarchy,hitcount,tags',
    ],
    'columns' => [
        'id' => [
            'label' => 'id',
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hans_id' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:nkwgok/Resources/Private/Language/locallang_db.xml:tx_nkwgok_data.ppn',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'title' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:nkwgok/Resources/Private/Language/locallang_db.xml:tx_nkwgok_data.notation',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
    ],
    'types' => [
        '0' => ['showitem' => 'hans_id, title, search, descr, descr_en, descr_alternate, descr_alternate_en, parent, hierarchy, childcount, hitcount, totalhitcount, tags, type'],
    ],
    'palettes' => [
        '1' => ['showitem' => ''],
    ],
];

return $nkwgok_data;
