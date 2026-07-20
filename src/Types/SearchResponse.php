<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Core\Types\ArrayType;

class SearchResponse extends JsonSerializableType
{
    /**
     * @var int $creditsUsed
     */
    #[JsonProperty('creditsUsed')]
    public int $creditsUsed;

    /**
     * @var array<SearchResult> $data
     */
    #[JsonProperty('data'), ArrayType([SearchResult::class])]
    public array $data;

    /**
     * @var value-of<SearchResponseProvider> $provider
     */
    #[JsonProperty('provider')]
    public string $provider;

    /**
     * @var string $query
     */
    #[JsonProperty('query')]
    public string $query;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var int $total
     */
    #[JsonProperty('total')]
    public int $total;

    /**
     * @param array{
     *   creditsUsed: int,
     *   data: array<SearchResult>,
     *   provider: value-of<SearchResponseProvider>,
     *   query: string,
     *   success: bool,
     *   total: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->creditsUsed = $values['creditsUsed'];
        $this->data = $values['data'];
        $this->provider = $values['provider'];
        $this->query = $values['query'];
        $this->success = $values['success'];
        $this->total = $values['total'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
