<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class AgentConfigDto extends JsonSerializableType
{
    /**
     * @var ?value-of<AgentConfigDtoMode> $mode Model routing mode. "default" uses the fast default model; "smart" uses the higher-latency reasoning model.
     */
    #[JsonProperty('mode')]
    public ?string $mode;

    /**
     * @var ?string $model Explicit AI model to use. Omit for the configured default, or set "smart" to use the configured smart model.
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @param array{
     *   mode?: ?value-of<AgentConfigDtoMode>,
     *   model?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->mode = $values['mode'] ?? null;
        $this->model = $values['model'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
