<?php

namespace Berrycrawl\Webhooks\Requests;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Core\Types\ArrayType;

class UpdateWebhookDto extends JsonSerializableType
{
    /**
     * @var ?array<string> $events Event types to subscribe to
     */
    #[JsonProperty('events'), ArrayType(['string'])]
    public ?array $events;

    /**
     * @var ?bool $isActive Enable or disable webhook
     */
    #[JsonProperty('isActive')]
    public ?bool $isActive;

    /**
     * @var ?string $url Webhook URL to send events to
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   events?: ?array<string>,
     *   isActive?: ?bool,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->events = $values['events'] ?? null;
        $this->isActive = $values['isActive'] ?? null;
        $this->url = $values['url'] ?? null;
    }
}
