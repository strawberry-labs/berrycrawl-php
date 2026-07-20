<?php

namespace Berrycrawl\Webhooks\Requests;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Core\Types\ArrayType;

class TestWebhookDto extends JsonSerializableType
{
    /**
     * @var string $event Event type to test
     */
    #[JsonProperty('event')]
    public string $event;

    /**
     * @var ?array<string, mixed> $payload Optional custom payload for testing
     */
    #[JsonProperty('payload'), ArrayType(['string' => 'mixed'])]
    public ?array $payload;

    /**
     * @param array{
     *   event: string,
     *   payload?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->event = $values['event'];
        $this->payload = $values['payload'] ?? null;
    }
}
