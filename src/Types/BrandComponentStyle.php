<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class BrandComponentStyle extends JsonSerializableType
{
    /**
     * @var ?string $background
     */
    #[JsonProperty('background')]
    public ?string $background;

    /**
     * @var ?string $borderColor
     */
    #[JsonProperty('borderColor')]
    public ?string $borderColor;

    /**
     * @var ?string $borderRadius
     */
    #[JsonProperty('borderRadius')]
    public ?string $borderRadius;

    /**
     * @var ?string $shadow
     */
    #[JsonProperty('shadow')]
    public ?string $shadow;

    /**
     * @var ?string $textColor
     */
    #[JsonProperty('textColor')]
    public ?string $textColor;

    /**
     * @param array{
     *   background?: ?string,
     *   borderColor?: ?string,
     *   borderRadius?: ?string,
     *   shadow?: ?string,
     *   textColor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->background = $values['background'] ?? null;
        $this->borderColor = $values['borderColor'] ?? null;
        $this->borderRadius = $values['borderRadius'] ?? null;
        $this->shadow = $values['shadow'] ?? null;
        $this->textColor = $values['textColor'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
