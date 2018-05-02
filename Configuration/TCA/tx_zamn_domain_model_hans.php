<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$nkwgok_data = [
    'ctrl' => [
        'title' => 'Hans',
        'label' => 'Nachlass',
        'default_sortby' => 'ORDER BY uid',
        'iconfile' => \TYPO3\CMS\Core\Utility\PathUtility::getAbsoluteWebPath($_EXTKEY).'Resources/Public/Images/ext_icon.gif',
        'searchFields' => 'title',
    ],
    'interface' => [
        'showRecordFieldList' => 'title,content',
    ],
    'columns' => [
        'uid' => [
            'label' => 'id',
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hans_id' => [
            'exclude' => 0,
            'label' => 'Hans ID',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'title' => [
            'exclude' => 0,
            'label' => 'Nachlass',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
    ],
    'types' => [
        '0' => ['showitem' => 'hans_id, title, content, kalliope'],
    ],
    'palettes' => [
        '1' => ['showitem' => ''],
    ],
];

return $nkwgok_data;
