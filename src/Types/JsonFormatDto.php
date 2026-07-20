<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Core\Types\ArrayType;

class JsonFormatDto extends JsonSerializableType
{
    /**
     * @var ?string $prompt Natural language prompt for extraction guidance
     */
    #[JsonProperty('prompt')]
    public ?string $prompt;

    /**
     * @var array<string, mixed> $schema JSON schema for structured extraction
     */
    #[JsonProperty('schema'), ArrayType(['string' => 'mixed'])]
    public array $schema;

    /**
     * @var value-of<JsonFormatDtoType> $type Format type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   schema: array<string, mixed>,
     *   type: value-of<JsonFormatDtoType>,
     *   prompt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->prompt = $values['prompt'] ?? null;
        $this->schema = $values['schema'];
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
