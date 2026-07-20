<?php

namespace Berrycrawl\Requests;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Core\Types\ArrayType;

class SearchDto extends JsonSerializableType
{
    /**
     * @var ?array<string> $categories Category filters
     */
    #[JsonProperty('categories'), ArrayType(['string'])]
    public ?array $categories;

    /**
     * @var ?string $country Country code
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @var ?float $limit Maximum number of results
     */
    #[JsonProperty('limit')]
    public ?float $limit;

    /**
     * @var ?string $location Location for geo-targeting
     */
    #[JsonProperty('location')]
    public ?string $location;

    /**
     * @var string $query Search query
     */
    #[JsonProperty('query')]
    public string $query;

    /**
     * @var ?array<string> $sources Source types to search
     */
    #[JsonProperty('sources'), ArrayType(['string'])]
    public ?array $sources;

    /**
     * @var ?string $tbs Time-based filter (e.g., qdr:d for past day)
     */
    #[JsonProperty('tbs')]
    public ?string $tbs;

    /**
     * @var ?float $timeout Timeout for search operation in milliseconds
     */
    #[JsonProperty('timeout')]
    public ?float $timeout;

    /**
     * @param array{
     *   query: string,
     *   categories?: ?array<string>,
     *   country?: ?string,
     *   limit?: ?float,
     *   location?: ?string,
     *   sources?: ?array<string>,
     *   tbs?: ?string,
     *   timeout?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->categories = $values['categories'] ?? null;
        $this->country = $values['country'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->location = $values['location'] ?? null;
        $this->query = $values['query'];
        $this->sources = $values['sources'] ?? null;
        $this->tbs = $values['tbs'] ?? null;
        $this->timeout = $values['timeout'] ?? null;
    }
}
