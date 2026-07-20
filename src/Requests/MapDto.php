<?php

namespace Berrycrawl\Requests;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Types\LocationDto;
use Berrycrawl\Types\MapDtoSitemap;

class MapDto extends JsonSerializableType
{
    /**
     * @var ?bool $ignoreQueryParameters Ignore query parameters when discovering URLs
     */
    #[JsonProperty('ignoreQueryParameters')]
    public ?bool $ignoreQueryParameters;

    /**
     * @var ?bool $includeSubdomains Include subdomains in the map
     */
    #[JsonProperty('includeSubdomains')]
    public ?bool $includeSubdomains;

    /**
     * @var ?float $limit Maximum number of URLs to return
     */
    #[JsonProperty('limit')]
    public ?float $limit;

    /**
     * @var ?LocationDto $location Location configuration
     */
    #[JsonProperty('location')]
    public ?LocationDto $location;

    /**
     * @var ?string $search Search filter for URLs
     */
    #[JsonProperty('search')]
    public ?string $search;

    /**
     * @var ?value-of<MapDtoSitemap> $sitemap How to handle sitemaps
     */
    #[JsonProperty('sitemap')]
    public ?string $sitemap;

    /**
     * @var ?float $timeout Timeout for map operation in milliseconds
     */
    #[JsonProperty('timeout')]
    public ?float $timeout;

    /**
     * @var string $url URL to map
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @param array{
     *   url: string,
     *   ignoreQueryParameters?: ?bool,
     *   includeSubdomains?: ?bool,
     *   limit?: ?float,
     *   location?: ?LocationDto,
     *   search?: ?string,
     *   sitemap?: ?value-of<MapDtoSitemap>,
     *   timeout?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ignoreQueryParameters = $values['ignoreQueryParameters'] ?? null;
        $this->includeSubdomains = $values['includeSubdomains'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->location = $values['location'] ?? null;
        $this->search = $values['search'] ?? null;
        $this->sitemap = $values['sitemap'] ?? null;
        $this->timeout = $values['timeout'] ?? null;
        $this->url = $values['url'];
    }
}
