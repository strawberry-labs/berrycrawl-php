# Berrycrawl PHP SDK

[![php shield](https://img.shields.io/badge/php-packagist-pink)](https://packagist.org/packages/strawberry-labs/berrycrawl)

The official PHP SDK for scraping, crawling, searching, mapping, structured extraction, screenshots, and brand profiles.

[Documentation](https://docs.berrycrawl.com) · [Dashboard](https://berrycrawl.com/app) · [GitHub](https://github.com/strawberry-labs/berrycrawl-php)

## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Environments](#environments)
- [Exception Handling](#exception-handling)
- [Advanced](#advanced)
  - [Custom Client](#custom-client)
  - [Retries](#retries)
  - [Timeouts](#timeouts)
- [Contributing](#contributing)

## Requirements

This SDK requires PHP ^8.1.

## Installation

```sh
composer require strawberry-labs/berrycrawl
```

## Usage

Set `BERRYCRAWL_API_KEY` to an API key from the [Berrycrawl dashboard](https://berrycrawl.com/app).

```php
<?php

use Berrycrawl\Berrycrawl;
use Berrycrawl\Requests\ScrapeDto;

$client = new Berrycrawl(apiKey: getenv('BERRYCRAWL_API_KEY'));
$page = $client->scrape(new ScrapeDto([
    'url' => 'https://example.com/pricing',
]));
```

### Crawl and search

```php
use Berrycrawl\Requests\CrawlDto;
use Berrycrawl\Requests\SearchDto;

$job = $client->crawl(new CrawlDto([
    'url' => 'https://example.com/docs',
    'limit' => 50,
]));

$results = $client->search(new SearchDto([
    'query' => 'best headless browser libraries',
    'limit' => 10,
]));
```

### Retrieve a brand profile

```php
use Berrycrawl\Brand\Requests\BrandDto;

$brand = $client->brand->retrieve(new BrandDto([
    'url' => 'https://stripe.com',
]));
```

## Environments

This SDK allows you to configure different environments for API requests.

```php
The SDK defaults to the `Production` environment. To use a different environment, pass it to the client constructor:

```php
use Berrycrawl\Berrycrawl;
use Berrycrawl\Environments;

$client = new Berrycrawl(
    token: '<YOUR_TOKEN>',
    options: [
        'baseUrl' => Environments::Staging->value
    ]
);
```

Available environments:
- `Environments::Production`
```

## Exception Handling

When the API returns a non-success status code (4xx or 5xx response), an exception will be thrown.

```php
use Berrycrawl\Exceptions\BerrycrawlApiException;
use Berrycrawl\Exceptions\BerrycrawlException;

try {
    $response = $client->brand->retrieve(...);
} catch (BerrycrawlApiException $e) {
    echo 'API Exception occurred: ' . $e->getMessage() . "\n";
    echo 'Status Code: ' . $e->getCode() . "\n";
    echo 'Response Body: ' . $e->getBody() . "\n";
    // Optionally, rethrow the exception or handle accordingly.
}
```

## Advanced

### Custom Client

This SDK is built to work with any HTTP client that implements the [PSR-18](https://www.php-fig.org/psr/psr-18/) `ClientInterface`.
By default, if no client is provided, the SDK will use `php-http/discovery` to find an installed HTTP client.
However, you can pass your own client that adheres to `ClientInterface`:

```php
use Berrycrawl\Berrycrawl;

// Pass any PSR-18 compatible HTTP client implementation.
// For example, using Guzzle:
$customClient = new \GuzzleHttp\Client([
    'timeout' => 5.0,
]);

$client = new Berrycrawl(options: [
    'client' => $customClient
]);

// Or using Symfony HttpClient:
// $customClient = (new \Symfony\Component\HttpClient\Psr18Client())
//     ->withOptions(['timeout' => 5.0]);
//
// $client = new Berrycrawl(options: [
//     'client' => $customClient
// ]);
```

### Retries

The SDK is instrumented with automatic retries with exponential backoff. A request will be retried as long
as the request is deemed retryable and the number of retry attempts has not grown larger than the configured
retry limit (default: 2).

A request is deemed retryable when any of the following HTTP status codes is returned:

- [408](https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/408) (Timeout)
- [429](https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/429) (Too Many Requests)
- [5XX](https://developer.mozilla.org/en-US/docs/Web/HTTP/Status#server_error_responses) (Internal Server Error)

The `retryStatusCodes` configuration controls which [5XX](https://developer.mozilla.org/en-US/docs/Web/HTTP/Status#server_error_responses) status codes are retried:

- `legacy` (default): Retries `408`, `429`, and all `>= 500`
- `recommended`: Retries `408`, `429`, `502`, `503`, `504` only (excludes `500 Internal Server Error` to avoid retrying non-idempotent failures)

Use the `maxRetries` request option to configure this behavior.

```php
$response = $client->brand->retrieve(
    ...,
    options: [
        'maxRetries' => 0 // Override maxRetries at the request level
    ]
);
```

### Timeouts

The SDK defaults to a 30 second timeout. Use the `timeout` option to configure this behavior.

```php
$response = $client->brand->retrieve(
    ...,
    options: [
        'timeout' => 3.0 // Override timeout at the request level
    ]
);
```

## Contributing

While we value open-source contributions to this SDK, this library is generated programmatically.
Additions made directly to this library would have to be moved over to our generation code,
otherwise they would be overwritten upon the next generated release. Feel free to open a PR as
a proof of concept, but know that we will not be able to merge it as-is. We suggest opening
an issue first to discuss with us!

On the other hand, contributions to the README are always very welcome!
