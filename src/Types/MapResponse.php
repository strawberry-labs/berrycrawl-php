<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Core\Types\ArrayType;

class MapResponse extends JsonSerializableType
{
    /**
     * @var int $creditsUsed
     */
    #[JsonProperty('creditsUsed')]
    public int $creditsUsed;

    /**
     * @var array<MapLink> $links
     */
    #[JsonProperty('links'), ArrayType([MapLink::class])]
    public array $links;

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
     *   links: array<MapLink>,
     *   success: bool,
     *   total: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->creditsUsed = $values['creditsUsed'];
        $this->links = $values['links'];
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
