<?php

namespace Berrycrawl;

use Berrycrawl\Account\AccountClient;
use Berrycrawl\Brand\BrandClient;
use Berrycrawl\Jobs\JobsClient;
use Berrycrawl\Webhooks\WebhooksClient;
use Psr\Http\Client\ClientInterface;
use Berrycrawl\Core\Client\RawClient;
use Berrycrawl\Requests\CrawlDto;
use Berrycrawl\Types\JobCreatedResponse;
use Berrycrawl\Exceptions\BerrycrawlException;
use Berrycrawl\Exceptions\BerrycrawlApiException;
use Berrycrawl\Core\Json\JsonApiRequest;
use Berrycrawl\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Berrycrawl\Requests\ExtractDto;
use Berrycrawl\Requests\MapDto;
use Berrycrawl\Types\MapResponse;
use Berrycrawl\Requests\ParseDto;
use Berrycrawl\Types\ScrapeResponse;
use Berrycrawl\Requests\ScrapeDto;
use Berrycrawl\Requests\ScreenshotDto;
use Berrycrawl\Requests\SearchDto;
use Berrycrawl\Types\SearchResponse;
use Exception;

class Berrycrawl
{
    /**
     * @var AccountClient $account
     */
    public AccountClient $account;

    /**
     * @var BrandClient $brand
     */
    public BrandClient $brand;

    /**
     * @var JobsClient $jobs
     */
    public JobsClient $jobs;

    /**
     * @var WebhooksClient $webhooks
     */
    public WebhooksClient $webhooks;

    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options @phpstan-ignore-next-line Property is used in endpoint methods via HttpEndpointGenerator
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param ?string $apiKey The apiKey to use for authentication.
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        ?string $apiKey = null,
        ?array $options = null,
    ) {
        $apiKey ??= $this->getFromEnvOrThrow('BERRYCRAWL_API_KEY', 'Please pass in apiKey or set the environment variable BERRYCRAWL_API_KEY.');
        $defaultHeaders = [
            'Authorization' => "Bearer $apiKey",
            'X-Fern-Language' => 'PHP',
            'X-Fern-SDK-Name' => 'Berrycrawl',
        ];

        $this->options = $options ?? [];

        $this->options['headers'] = array_merge(
            $defaultHeaders,
            $this->options['headers'] ?? [],
        );

        $this->client = new RawClient(
            options: $this->options,
        );

        $this->account = new AccountClient($this->client, $this->options);
        $this->brand = new BrandClient($this->client, $this->options);
        $this->jobs = new JobsClient($this->client, $this->options);
        $this->webhooks = new WebhooksClient($this->client, $this->options);
    }

    /**
     * @param CrawlDto $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?JobCreatedResponse
     * @throws BerrycrawlException
     * @throws BerrycrawlApiException
     */
    public function crawl(CrawlDto $request, ?array $options = null): ?JobCreatedResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "crawl",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return JobCreatedResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new BerrycrawlException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new BerrycrawlException(message: $e->getMessage(), previous: $e);
        }
        throw new BerrycrawlApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * @param ExtractDto $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?JobCreatedResponse
     * @throws BerrycrawlException
     * @throws BerrycrawlApiException
     */
    public function extract(ExtractDto $request, ?array $options = null): ?JobCreatedResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "extract",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return JobCreatedResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new BerrycrawlException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new BerrycrawlException(message: $e->getMessage(), previous: $e);
        }
        throw new BerrycrawlApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * @param MapDto $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?MapResponse
     * @throws BerrycrawlException
     * @throws BerrycrawlApiException
     */
    public function map(MapDto $request, ?array $options = null): ?MapResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "map",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return MapResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new BerrycrawlException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new BerrycrawlException(message: $e->getMessage(), previous: $e);
        }
        throw new BerrycrawlApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * @param ParseDto $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ScrapeResponse
     * @throws BerrycrawlException
     * @throws BerrycrawlApiException
     */
    public function parse(ParseDto $request, ?array $options = null): ?ScrapeResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "parse",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ScrapeResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new BerrycrawlException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new BerrycrawlException(message: $e->getMessage(), previous: $e);
        }
        throw new BerrycrawlApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * @param ScrapeDto $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ScrapeResponse
     * @throws BerrycrawlException
     * @throws BerrycrawlApiException
     */
    public function scrape(ScrapeDto $request = new ScrapeDto(), ?array $options = null): ?ScrapeResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "scrape",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ScrapeResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new BerrycrawlException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new BerrycrawlException(message: $e->getMessage(), previous: $e);
        }
        throw new BerrycrawlApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Cookie banners, blocking overlays, chat widgets, and lazy loading are handled by default. Every cleanup pass can be controlled per request.
     *
     * @param ScreenshotDto $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ScrapeResponse
     * @throws BerrycrawlException
     * @throws BerrycrawlApiException
     */
    public function screenshot(ScreenshotDto $request, ?array $options = null): ?ScrapeResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "screenshot",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ScrapeResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new BerrycrawlException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new BerrycrawlException(message: $e->getMessage(), previous: $e);
        }
        throw new BerrycrawlApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * @param SearchDto $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SearchResponse
     * @throws BerrycrawlException
     * @throws BerrycrawlApiException
     */
    public function search(SearchDto $request, ?array $options = null): ?SearchResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "search",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return SearchResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new BerrycrawlException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new BerrycrawlException(message: $e->getMessage(), previous: $e);
        }
        throw new BerrycrawlApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * @param string $env
     * @param string $message
     * @return string
     */
    private function getFromEnvOrThrow(string $env, string $message): string
    {
        $value = getenv($env);
        return $value ? (string) $value : throw new Exception($message);
    }
}
