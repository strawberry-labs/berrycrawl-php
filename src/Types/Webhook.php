<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use DateTime;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Core\Types\Date;
use Berrycrawl\Core\Types\ArrayType;

class Webhook extends JsonSerializableType
{
    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var array<string> $events
     */
    #[JsonProperty('events'), ArrayType(['string'])]
    public array $events;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var bool $isActive
     */
    #[JsonProperty('isActive')]
    public bool $isActive;

    /**
     * @var ?array<array<string, mixed>> $recentDeliveries
     */
    #[JsonProperty('recentDeliveries'), ArrayType([['string' => 'mixed']])]
    public ?array $recentDeliveries;

    /**
     * @var ?string $secret
     */
    #[JsonProperty('secret')]
    public ?string $secret;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var string $url
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @param array{
     *   events: array<string>,
     *   id: string,
     *   isActive: bool,
     *   url: string,
     *   createdAt?: ?DateTime,
     *   recentDeliveries?: ?array<array<string, mixed>>,
     *   secret?: ?string,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->createdAt = $values['createdAt'] ?? null;
        $this->events = $values['events'];
        $this->id = $values['id'];
        $this->isActive = $values['isActive'];
        $this->recentDeliveries = $values['recentDeliveries'] ?? null;
        $this->secret = $values['secret'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
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
