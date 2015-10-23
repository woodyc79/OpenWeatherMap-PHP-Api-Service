.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _developer:

Developer Manual
================

.. _usage:

Usage
-----

Get an instance of the service and the actual API class:

.. code-block:: php

    /** @var \RauchF\OpenweathermapPhpApiService\Service\OpenweathermapPhpApiService $owmService */
    $owmService = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstanceService('openweathermap_php_api');
    $owmApi = $owmService->getOpenweathermapPhpApi();

Now you can use any API method:

.. code-block:: php

    $weatherData = $owmApi->getRawWeatherData(
        $query,
        'metric', 
        'en',
        $owmService->getApiKey(),
        'json'
    );
