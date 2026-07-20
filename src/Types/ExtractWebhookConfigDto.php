<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Core\Types\ArrayType;

class ExtractWebhookConfigDto extends JsonSerializableType
{
    /**
     * @var ?array<string> $events Events to subscribe to
     */
    #[JsonProperty('events'), ArrayType(['string'])]
    public ?array $events;

    /**
     * @var ?array<string, mixed> $metadata Custom metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var ?string $secret Optional secret used to sign direct webhook deliveries
     */
    #[JsonProperty('secret')]
    public ?string $secret;

    /**
     * @var string $url Webhook URL
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @param array{
     *   url: string,
     *   events?: ?array<string>,
     *   metadata?: ?array<string, mixed>,
     *   secret?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->events = $values['events'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->secret = $values['secret'] ?? null;
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
