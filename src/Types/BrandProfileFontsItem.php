<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Core\Types\ArrayType;

class BrandProfileFontsItem extends JsonSerializableType
{
    /**
     * @var string $family
     */
    #[JsonProperty('family')]
    public string $family;

    /**
     * @var ?array<string> $weights
     */
    #[JsonProperty('weights'), ArrayType(['string'])]
    public ?array $weights;

    /**
     * @param array{
     *   family: string,
     *   weights?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->family = $values['family'];
        $this->weights = $values['weights'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
