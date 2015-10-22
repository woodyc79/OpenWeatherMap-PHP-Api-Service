<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

if (!is_array($TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['openweathermap_php_api_service'])) {
    $TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['openweathermap_php_api_service'] = array();
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addService(
    $_EXTKEY,
    'openweathermap_php_api',
    'tx_openweathermap_php_api_service',
    array (
        'title' => 'OpenWeatherMap PHP Api for TYPO3',
        'description' => '',
        'subtype' => '',
        'available' => TRUE,
        'priority' => 50,
        'quality' => 50,
        'os' => '',
        'exec' => '',
        'classFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Classes/Service/OpenweathermapPhpApiService.php',
        'className' => 'RauchF\OpenweathermapPhpApiService\Service\OpenweathermapPhpApiService',
    )
);

$composerAutoloadFile = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY)
. 'Resources/Private/Vendor/autoload.php';

require_once($composerAutoloadFile);