<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;
use DateTime;
use Berrycrawl\Core\Types\Date;

class BrandResponseDataMeta extends JsonSerializableType
{
    /**
     * @var bool $cached
     */
    #[JsonProperty('cached')]
    public bool $cached;

    /**
     * @var int $creditsUsed
     */
    #[JsonProperty('creditsUsed')]
    public int $creditsUsed;

    /**
     * @var DateTime $fetchedAt
     */
    #[JsonProperty('fetchedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $fetchedAt;

    /**
     * @var string $sourceUrl
     */
    #[JsonProperty('sourceUrl')]
    public string $sourceUrl;

    /**
     * @param array{
     *   cached: bool,
     *   creditsUsed: int,
     *   fetchedAt: DateTime,
     *   sourceUrl: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->cached = $values['cached'];
        $this->creditsUsed = $values['creditsUsed'];
        $this->fetchedAt = $values['fetchedAt'];
        $this->sourceUrl = $values['sourceUrl'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
