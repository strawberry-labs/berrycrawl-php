<?php

namespace Berrycrawl\Requests;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Types\AgentConfigDto;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Core\Types\ArrayType;
use Berrycrawl\Types\ExtractWebhookConfigDto;

class ExtractDto extends JsonSerializableType
{
    /**
     * @var ?AgentConfigDto $agent Agent configuration
     */
    #[JsonProperty('agent')]
    public ?AgentConfigDto $agent;

    /**
     * @var ?bool $enableWebSearch Enable web search for URL discovery
     */
    #[JsonProperty('enableWebSearch')]
    public ?bool $enableWebSearch;

    /**
     * @var ?bool $ignoreInvalidUrLs Ignore invalid URLs and process remaining valid ones
     */
    #[JsonProperty('ignoreInvalidURLs')]
    public ?bool $ignoreInvalidUrLs;

    /**
     * @var ?bool $ignoreSitemap Ignore sitemap during URL discovery
     */
    #[JsonProperty('ignoreSitemap')]
    public ?bool $ignoreSitemap;

    /**
     * @var ?bool $includeSubdomains Include subdomains in extraction
     */
    #[JsonProperty('includeSubdomains')]
    public ?bool $includeSubdomains;

    /**
     * @var string $prompt Natural language prompt describing what to extract. Maximum 16384 UTF-8 bytes.
     */
    #[JsonProperty('prompt')]
    public string $prompt;

    /**
     * @var ?array<string, mixed> $schema JSON Schema for structured output. Serialized schema is limited to 65536 UTF-8 bytes.
     */
    #[JsonProperty('schema'), ArrayType(['string' => 'mixed'])]
    public ?array $schema;

    /**
     * @var ?array<string, mixed> $scrapeOptions Scrape options for each URL. zeroDataRetention: true is currently rejected with 400 ZERO_DATA_RETENTION_NOT_SUPPORTED.
     */
    #[JsonProperty('scrapeOptions'), ArrayType(['string' => 'mixed'])]
    public ?array $scrapeOptions;

    /**
     * @var ?bool $showSources Include source citations in response
     */
    #[JsonProperty('showSources')]
    public ?bool $showSources;

    /**
     * @var ?array<string> $urls 1–20 unique public HTTP(S) URLs. May be omitted only when enableWebSearch is true. Each URL is limited to 2048 UTF-8 bytes.
     */
    #[JsonProperty('urls'), ArrayType(['string'])]
    public ?array $urls;

    /**
     * @var ?ExtractWebhookConfigDto $webhook Webhook configuration
     */
    #[JsonProperty('webhook')]
    public ?ExtractWebhookConfigDto $webhook;

    /**
     * @param array{
     *   prompt: string,
     *   agent?: ?AgentConfigDto,
     *   enableWebSearch?: ?bool,
     *   ignoreInvalidUrLs?: ?bool,
     *   ignoreSitemap?: ?bool,
     *   includeSubdomains?: ?bool,
     *   schema?: ?array<string, mixed>,
     *   scrapeOptions?: ?array<string, mixed>,
     *   showSources?: ?bool,
     *   urls?: ?array<string>,
     *   webhook?: ?ExtractWebhookConfigDto,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->agent = $values['agent'] ?? null;
        $this->enableWebSearch = $values['enableWebSearch'] ?? null;
        $this->ignoreInvalidUrLs = $values['ignoreInvalidUrLs'] ?? null;
        $this->ignoreSitemap = $values['ignoreSitemap'] ?? null;
        $this->includeSubdomains = $values['includeSubdomains'] ?? null;
        $this->prompt = $values['prompt'];
        $this->schema = $values['schema'] ?? null;
        $this->scrapeOptions = $values['scrapeOptions'] ?? null;
        $this->showSources = $values['showSources'] ?? null;
        $this->urls = $values['urls'] ?? null;
        $this->webhook = $values['webhook'] ?? null;
    }
}
