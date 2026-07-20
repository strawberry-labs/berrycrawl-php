<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class AccountResponseDataPlan extends JsonSerializableType
{
    /**
     * @var int $concurrency
     */
    #[JsonProperty('concurrency')]
    public int $concurrency;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var int $queueLimit
     */
    #[JsonProperty('queueLimit')]
    public int $queueLimit;

    /**
     * @var int $rateLimitPerMinute
     */
    #[JsonProperty('rateLimitPerMinute')]
    public int $rateLimitPerMinute;

    /**
     * @param array{
     *   concurrency: int,
     *   id: string,
     *   name: string,
     *   queueLimit: int,
     *   rateLimitPerMinute: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->concurrency = $values['concurrency'];
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->queueLimit = $values['queueLimit'];
        $this->rateLimitPerMinute = $values['rateLimitPerMinute'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
