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

namespace RauchF\OpenweathermapPhpApiService\Cache;

use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class Cache extends \Cmfcmf\OpenWeatherMap\AbstractCache implements SingletonInterface
{
    /**
     * @var \TYPO3\CMS\Core\Cache\CacheManager
     */
    protected $cacheManager = null;

    /**
     * @var \TYPO3\CMS\Core\Cache\Frontend\FrontendInterface
     */
    protected $cache = null;

    /**
     * Cache constructor.
     */
    public function __construct()
    {
        $this->cacheManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Cache\\CacheManager');
        $this->cache = $this->cacheManager->getCache('openweathermap_php_api_service');
    }

    public function isCached($url)
    {
        return $this->cache->has($this->calculateCacheIdentifier($url));
    }

    public function getCached($url)
    {
        return $this->cache->get($this->calculateCacheIdentifier($url));
    }

    public function setCached($url, $content)
    {
        $this->cache->set($this->calculateCacheIdentifier($url), $content, array(), $this->seconds);

        return $this->isCached($url);
    }

    protected function calculateCacheIdentifier($url)
    {
        return md5($url);
    }
}