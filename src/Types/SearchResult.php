<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class SearchResult extends JsonSerializableType
{
    /**
     * @var ?value-of<SearchResultProvider> $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?string $publishedDate
     */
    #[JsonProperty('publishedDate')]
    public ?string $publishedDate;

    /**
     * @var string $snippet
     */
    #[JsonProperty('snippet')]
    public string $snippet;

    /**
     * @var string $source
     */
    #[JsonProperty('source')]
    public string $source;

    /**
     * @var string $title
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var string $url
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @param array{
     *   snippet: string,
     *   source: string,
     *   title: string,
     *   url: string,
     *   provider?: ?value-of<SearchResultProvider>,
     *   publishedDate?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->provider = $values['provider'] ?? null;
        $this->publishedDate = $values['publishedDate'] ?? null;
        $this->snippet = $values['snippet'];
        $this->source = $values['source'];
        $this->title = $values['title'];
        $this->url = $values['url'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
