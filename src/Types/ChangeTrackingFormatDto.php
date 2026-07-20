<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Core\Types\ArrayType;

class ChangeTrackingFormatDto extends JsonSerializableType
{
    /**
     * @var ?array<string> $modes Change detection modes
     */
    #[JsonProperty('modes'), ArrayType(['string'])]
    public ?array $modes;

    /**
     * @var ?array<string, mixed> $schema Schema for structured change tracking
     */
    #[JsonProperty('schema'), ArrayType(['string' => 'mixed'])]
    public ?array $schema;

    /**
     * @var ?string $tag Tag to identify this tracking session
     */
    #[JsonProperty('tag')]
    public ?string $tag;

    /**
     * @var value-of<ChangeTrackingFormatDtoType> $type Format type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   type: value-of<ChangeTrackingFormatDtoType>,
     *   modes?: ?array<string>,
     *   schema?: ?array<string, mixed>,
     *   tag?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->modes = $values['modes'] ?? null;
        $this->schema = $values['schema'] ?? null;
        $this->tag = $values['tag'] ?? null;
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
