<?php

namespace Berrycrawl\Requests;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Types\ActionDto;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Core\Types\ArrayType;
use Berrycrawl\Types\ScrapeDtoFormatsItemZero;
use Berrycrawl\Types\JsonFormatDto;
use Berrycrawl\Types\SummaryFormatDto;
use Berrycrawl\Types\ChangeTrackingFormatDto;
use Berrycrawl\Core\Types\Union;
use Berrycrawl\Types\LocationDto;
use Berrycrawl\Types\ScrapeDtoProxy;

class ScrapeDto extends JsonSerializableType
{
    /**
     * @var ?array<ActionDto> $actions Browser actions to execute
     */
    #[JsonProperty('actions'), ArrayType([ActionDto::class])]
    public ?array $actions;

    /**
     * @var ?bool $blockAds Enable ad-blocking and cookie popup blocking
     */
    #[JsonProperty('blockAds')]
    public ?bool $blockAds;

    /**
     * @var ?string $domain Domain to scrape. Normalized to https://domain when url is omitted.
     */
    #[JsonProperty('domain')]
    public ?string $domain;

    /**
     * @var ?array<string> $excludeTags CSS selectors to exclude
     */
    #[JsonProperty('excludeTags'), ArrayType(['string'])]
    public ?array $excludeTags;

    /**
     * @var ?array<string, mixed> $extractionSchema Schema for structured data extraction (used with json format)
     */
    #[JsonProperty('extractionSchema'), ArrayType(['string' => 'mixed'])]
    public ?array $extractionSchema;

    /**
     * @var ?array<(
     *    value-of<ScrapeDtoFormatsItemZero>
     *   |JsonFormatDto
     *   |SummaryFormatDto
     *   |ChangeTrackingFormatDto
     * )> $formats Output formats - can be simple strings or format objects with options
     */
    #[JsonProperty('formats'), ArrayType([new Union('string', JsonFormatDto::class, SummaryFormatDto::class, ChangeTrackingFormatDto::class)])]
    public ?array $formats;

    /**
     * @var ?array<string, mixed> $headers Custom headers
     */
    #[JsonProperty('headers'), ArrayType(['string' => 'mixed'])]
    public ?array $headers;

    /**
     * @var ?array<string> $includeTags CSS selectors to include
     */
    #[JsonProperty('includeTags'), ArrayType(['string'])]
    public ?array $includeTags;

    /**
     * @var ?LocationDto $location Location settings
     */
    #[JsonProperty('location')]
    public ?LocationDto $location;

    /**
     * @var ?float $maxAge Cache max age in milliseconds
     */
    #[JsonProperty('maxAge')]
    public ?float $maxAge;

    /**
     * @var ?bool $mobile Emulate mobile device for scraping
     */
    #[JsonProperty('mobile')]
    public ?bool $mobile;

    /**
     * @var ?bool $onlyMainContent Extract only main content
     */
    #[JsonProperty('onlyMainContent')]
    public ?bool $onlyMainContent;

    /**
     * @var ?value-of<ScrapeDtoProxy> $proxy Proxy mode. auto starts direct and escalates only when blocked. basic is an alias for none.
     */
    #[JsonProperty('proxy')]
    public ?string $proxy;

    /**
     * @var ?bool $removeBase64Images Remove base64 images from output (keeps alt text)
     */
    #[JsonProperty('removeBase64Images')]
    public ?bool $removeBase64Images;

    /**
     * @var ?bool $screenshotAsBase64 Return screenshot/PDF output inline as a base64 data URL instead of an uploaded CDN URL. Default false (a CDN URL is returned).
     */
    #[JsonProperty('screenshotAsBase64')]
    public ?bool $screenshotAsBase64;

    /**
     * @var ?bool $skipTlsVerification Skip TLS certificate verification
     */
    #[JsonProperty('skipTlsVerification')]
    public ?bool $skipTlsVerification;

    /**
     * @var ?bool $storeInCache Store result in cache
     */
    #[JsonProperty('storeInCache')]
    public ?bool $storeInCache;

    /**
     * @var ?float $timeout Request timeout in milliseconds
     */
    #[JsonProperty('timeout')]
    public ?float $timeout;

    /**
     * @var ?string $url URL to scrape. Either url or domain is required.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?float $waitFor Wait time before scraping (ms)
     */
    #[JsonProperty('waitFor')]
    public ?float $waitFor;

    /**
     * @var ?bool $zeroDataRetention Reserved for a future zero-data-retention mode. true is currently rejected with 400 ZERO_DATA_RETENTION_NOT_SUPPORTED; omit or use false.
     */
    #[JsonProperty('zeroDataRetention')]
    public ?bool $zeroDataRetention;

    /**
     * @param array{
     *   actions?: ?array<ActionDto>,
     *   blockAds?: ?bool,
     *   domain?: ?string,
     *   excludeTags?: ?array<string>,
     *   extractionSchema?: ?array<string, mixed>,
     *   formats?: ?array<(
     *    value-of<ScrapeDtoFormatsItemZero>
     *   |JsonFormatDto
     *   |SummaryFormatDto
     *   |ChangeTrackingFormatDto
     * )>,
     *   headers?: ?array<string, mixed>,
     *   includeTags?: ?array<string>,
     *   location?: ?LocationDto,
     *   maxAge?: ?float,
     *   mobile?: ?bool,
     *   onlyMainContent?: ?bool,
     *   proxy?: ?value-of<ScrapeDtoProxy>,
     *   removeBase64Images?: ?bool,
     *   screenshotAsBase64?: ?bool,
     *   skipTlsVerification?: ?bool,
     *   storeInCache?: ?bool,
     *   timeout?: ?float,
     *   url?: ?string,
     *   waitFor?: ?float,
     *   zeroDataRetention?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->actions = $values['actions'] ?? null;
        $this->blockAds = $values['blockAds'] ?? null;
        $this->domain = $values['domain'] ?? null;
        $this->excludeTags = $values['excludeTags'] ?? null;
        $this->extractionSchema = $values['extractionSchema'] ?? null;
        $this->formats = $values['formats'] ?? null;
        $this->headers = $values['headers'] ?? null;
        $this->includeTags = $values['includeTags'] ?? null;
        $this->location = $values['location'] ?? null;
        $this->maxAge = $values['maxAge'] ?? null;
        $this->mobile = $values['mobile'] ?? null;
        $this->onlyMainContent = $values['onlyMainContent'] ?? null;
        $this->proxy = $values['proxy'] ?? null;
        $this->removeBase64Images = $values['removeBase64Images'] ?? null;
        $this->screenshotAsBase64 = $values['screenshotAsBase64'] ?? null;
        $this->skipTlsVerification = $values['skipTlsVerification'] ?? null;
        $this->storeInCache = $values['storeInCache'] ?? null;
        $this->timeout = $values['timeout'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->waitFor = $values['waitFor'] ?? null;
        $this->zeroDataRetention = $values['zeroDataRetention'] ?? null;
    }
}
