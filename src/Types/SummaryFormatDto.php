<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class SummaryFormatDto extends JsonSerializableType
{
    /**
     * @var ?string $query Specific query for focused summarization
     */
    #[JsonProperty('query')]
    public ?string $query;

    /**
     * @var value-of<SummaryFormatDtoType> $type Format type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   type: value-of<SummaryFormatDtoType>,
     *   query?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->query = $values['query'] ?? null;
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
