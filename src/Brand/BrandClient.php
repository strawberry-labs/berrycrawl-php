<?php

namespace Berrycrawl\Brand;

use Psr\Http\Client\ClientInterface;
use Berrycrawl\Core\Client\RawClient;
use Berrycrawl\Brand\Requests\BrandDto;
use Berrycrawl\Types\BrandResponse;
use Berrycrawl\Exceptions\BerrycrawlException;
use Berrycrawl\Exceptions\BerrycrawlApiException;
use Berrycrawl\Core\Json\JsonApiRequest;
use Berrycrawl\Environments;
use Berrycrawl\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;

class BrandClient
{
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
     * @param RawClient $client
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        RawClient $client,
        ?array $options = null,
    ) {
        $this->client = $client;
        $this->options = $options ?? [];
    }

    /**
     * Send one website URL. BerryCrawl returns the brand identity found on that site.
     *
     * @param BrandDto $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?BrandResponse
     * @throws BerrycrawlException
     * @throws BerrycrawlApiException
     */
    public function retrieve(BrandDto $request, ?array $options = null): ?BrandResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "brand",
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
                return BrandResponse::fromJson($json);
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
}
