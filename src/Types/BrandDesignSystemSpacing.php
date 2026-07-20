<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class BrandDesignSystemSpacing extends JsonSerializableType
{
    /**
     * @var float $baseUnit
     */
    #[JsonProperty('baseUnit')]
    public float $baseUnit;

    /**
     * @var ?string $borderRadius
     */
    #[JsonProperty('borderRadius')]
    public ?string $borderRadius;

    /**
     * @param array{
     *   baseUnit: float,
     *   borderRadius?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->baseUnit = $values['baseUnit'];
        $this->borderRadius = $values['borderRadius'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
