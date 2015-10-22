<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Felix Rauch <rauch@skaiamail.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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

namespace RauchF\OpenweathermapPhpApiService\Service;

use TYPO3\CMS\Core\Service\AbstractService;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class OpenweathermapPhpApiService extends AbstractService
{
    /**
     * This is for convenience.
     *
     * @var string
     */
    protected $apiKey;

    /**
     * @var int
     */
    protected $cacheTTL;

    /**
     * OpenweathermapPhpApiService constructor.
     */
    public function __construct()
    {
        $extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['openweathermap_php_api_service']);
        $this->apiKey = $extConf['apiKey'];
        $this->cacheTTL = $extConf['cacheTTL'];
    }

    /**
     * @return \Cmfcmf\OpenWeatherMap
     */
    public function getOpenweathermapPhpApi()
    {
        $fetcher = GeneralUtility::makeInstance('RauchF\\OpenweathermapPhpApiService\\Fetcher\\Fetcher');
        $cache = GeneralUtility::makeInstance('RauchF\\OpenweathermapPhpApiService\\Cache\\Cache');

        $instance = GeneralUtility::makeInstance('Cmfcmf\\OpenWeatherMap', $fetcher, $cache, $this->cacheTTL);
        return $instance;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return int
     */
    public function getCacheTTL()
    {
        return $this->cacheTTL;
    }

    /**
     * @param int $cacheTTL
     */
    public function setCacheTTL($cacheTTL)
    {
        $this->cacheTTL = $cacheTTL;
    }
}