<?php

namespace Berrycrawl\Requests;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Core\Types\ArrayType;
use Berrycrawl\Types\CrawlDtoSitemap;
use Berrycrawl\Types\WebhookConfigDto;

class CrawlDto extends JsonSerializableType
{
    /**
     * @var ?bool $allowExternalLinks Whether to allow crawling external domains
     */
    #[JsonProperty('allowExternalLinks')]
    public ?bool $allowExternalLinks;

    /**
     * @var ?bool $allowSubdomains Whether to allow crawling subdomains
     */
    #[JsonProperty('allowSubdomains')]
    public ?bool $allowSubdomains;

    /**
     * @var ?bool $crawlEntireDomain Whether to crawl entire domain or just subtree
     */
    #[JsonProperty('crawlEntireDomain')]
    public ?bool $crawlEntireDomain;

    /**
     * @var ?bool $deduplicateSimilarUrLs Deduplicate similar URLs using intelligent matching
     */
    #[JsonProperty('deduplicateSimilarURLs')]
    public ?bool $deduplicateSimilarUrLs;

    /**
     * @var ?float $delay Delay between page scrapes in milliseconds
     */
    #[JsonProperty('delay')]
    public ?float $delay;

    /**
     * @var ?array<string> $excludePaths Regex patterns to exclude paths
     */
    #[JsonProperty('excludePaths'), ArrayType(['string'])]
    public ?array $excludePaths;

    /**
     * @var ?bool $ignoreQueryParameters Ignore query parameters when deduplicating URLs
     */
    #[JsonProperty('ignoreQueryParameters')]
    public ?bool $ignoreQueryParameters;

    /**
     * @var ?array<string> $includePaths Regex patterns to include paths
     */
    #[JsonProperty('includePaths'), ArrayType(['string'])]
    public ?array $includePaths;

    /**
     * @var ?float $limit Maximum number of pages to crawl
     */
    #[JsonProperty('limit')]
    public ?float $limit;

    /**
     * @var ?float $maxConcurrency Maximum number of concurrent scrapes for this crawl
     */
    #[JsonProperty('maxConcurrency')]
    public ?float $maxConcurrency;

    /**
     * @var ?float $maxDiscoveryDepth Maximum depth for URL discovery
     */
    #[JsonProperty('maxDiscoveryDepth')]
    public ?float $maxDiscoveryDepth;

    /**
     * @var ?string $prompt Natural language instructions for crawl configuration
     */
    #[JsonProperty('prompt')]
    public ?string $prompt;

    /**
     * @var ?array<string, mixed> $scrapeOptions Scrape options to apply to each page. actions accepts at most 25 bounded browser actions. zeroDataRetention: true is currently rejected with 400 ZERO_DATA_RETENTION_NOT_SUPPORTED.
     */
    #[JsonProperty('scrapeOptions'), ArrayType(['string' => 'mixed'])]
    public ?array $scrapeOptions;

    /**
     * @var ?value-of<CrawlDtoSitemap> $sitemap Sitemap handling strategy
     */
    #[JsonProperty('sitemap')]
    public ?string $sitemap;

    /**
     * @var string $url Starting URL to crawl
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var ?WebhookConfigDto $webhook Webhook configuration
     */
    #[JsonProperty('webhook')]
    public ?WebhookConfigDto $webhook;

    /**
     * @var ?bool $zeroDataRetention Reserved for a future zero-data-retention mode. true is currently rejected with 400 ZERO_DATA_RETENTION_NOT_SUPPORTED; omit or use false.
     */
    #[JsonProperty('zeroDataRetention')]
    public ?bool $zeroDataRetention;

    /**
     * @param array{
     *   url: string,
     *   allowExternalLinks?: ?bool,
     *   allowSubdomains?: ?bool,
     *   crawlEntireDomain?: ?bool,
     *   deduplicateSimilarUrLs?: ?bool,
     *   delay?: ?float,
     *   excludePaths?: ?array<string>,
     *   ignoreQueryParameters?: ?bool,
     *   includePaths?: ?array<string>,
     *   limit?: ?float,
     *   maxConcurrency?: ?float,
     *   maxDiscoveryDepth?: ?float,
     *   prompt?: ?string,
     *   scrapeOptions?: ?array<string, mixed>,
     *   sitemap?: ?value-of<CrawlDtoSitemap>,
     *   webhook?: ?WebhookConfigDto,
     *   zeroDataRetention?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->allowExternalLinks = $values['allowExternalLinks'] ?? null;
        $this->allowSubdomains = $values['allowSubdomains'] ?? null;
        $this->crawlEntireDomain = $values['crawlEntireDomain'] ?? null;
        $this->deduplicateSimilarUrLs = $values['deduplicateSimilarUrLs'] ?? null;
        $this->delay = $values['delay'] ?? null;
        $this->excludePaths = $values['excludePaths'] ?? null;
        $this->ignoreQueryParameters = $values['ignoreQueryParameters'] ?? null;
        $this->includePaths = $values['includePaths'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->maxConcurrency = $values['maxConcurrency'] ?? null;
        $this->maxDiscoveryDepth = $values['maxDiscoveryDepth'] ?? null;
        $this->prompt = $values['prompt'] ?? null;
        $this->scrapeOptions = $values['scrapeOptions'] ?? null;
        $this->sitemap = $values['sitemap'] ?? null;
        $this->url = $values['url'];
        $this->webhook = $values['webhook'] ?? null;
        $this->zeroDataRetention = $values['zeroDataRetention'] ?? null;
    }
}
