<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Core\Types\ArrayType;

class TestWebhookResponse extends JsonSerializableType
{
    /**
     * @var string $event
     */
    #[JsonProperty('event')]
    public string $event;

    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var array<string, mixed> $payload
     */
    #[JsonProperty('payload'), ArrayType(['string' => 'mixed'])]
    public array $payload;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   event: string,
     *   message: string,
     *   payload: array<string, mixed>,
     *   success: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->event = $values['event'];
        $this->message = $values['message'];
        $this->payload = $values['payload'];
        $this->success = $values['success'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
