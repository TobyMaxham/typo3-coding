<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Tricept.' . $_EXTKEY,
	'Tmcoding',
	array(
		'Code' => 'list, show, new, create, edit, update, delete',
		'CodeType' => 'list, show',
		'CodeComment' => 'list, show, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Code' => 'create, update, delete',
		'CodeType' => '',
		'CodeComment' => 'create, update, delete',
		
	)
);
