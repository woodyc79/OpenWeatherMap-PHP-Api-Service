# OpenWeatherMap-PHP-Api-Service (EXT:openweathermap\_php\_api\_service)

This extension provides a wrapper for the library OpenWeatherMap-PHP-Api [(GitHub)](https://github.com/cmfcmf/OpenWeatherMap-PHP-Api).

It allows developers to use the library in their TYPO3 extension without much hassle.

The library uses the TYPO3 caching framework and TYPO3’s own methods to fetch URLs.

## Requirements

This extension does not have any major requirements

- PHP 5.3-5.6
- TYPO3 CMS 6.2 (It is known to run with version 7.5, but this is unsupported)
- TYPO3 should obviously be able to access the internet

## Installation

Just install the extension from the TER or manually.

## Configuration

Some basic configuration needs to be done:

- You need an AppID / API Key from [openweathermap.org](http://openweathermap.org/). Enter this AppID in the extension configuration inside the extension manager.
- Optionally change the cache lifetime in the extension configuration.

## Usage

Get an instance of the service and the actual API class:
```php
    /** @var \RauchF\OpenweathermapPhpApiService\Service\OpenweathermapPhpApiService $owmService */
    $owmService = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstanceService('openweathermap_php_api');
    $owmApi = $owmService->getOpenweathermapPhpApi();
```

Now you can use any API method:

```php
    $weatherData = $owmApi->getRawWeatherData(
        $query,
        'metric',
        'en',
        $owmService->getApiKey(),
        'json'
    );
```

## Issues / Contributing

Please report any bugs and issues you may encounter on [GitHub](https://github.com/RauchF/OpenWeatherMap-PHP-Api-Service/issues).

## Licenses

The source code and usage are covered under the following licenses:

### OpenWeatherMap-PHP-Api-Service for TYPO3
(c) 2015 Felix Rauch

This product is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

The GNU General Public License can be found at
http://www.gnu.org/copyleft/gpl.html.

### OpenWeatherMap-PHP-Api

Copyright (c) 2013 Christian Flach

MIT — Please see the LICENSE file distributed with the source code
for further information regarding copyright and licensing.

### OpenWeatherMap
Please check out the following links to read about the usage policies
and the license of OpenWeatherMap before using the service.
- http://www.OpenWeatherMap.org
- http://www.OpenWeatherMap.org/terms
- http://www.OpenWeatherMap.org/appid