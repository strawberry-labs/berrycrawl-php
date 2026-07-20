<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class BrandDesignSystemColors extends JsonSerializableType
{
    /**
     * @var ?string $accent
     */
    #[JsonProperty('accent')]
    public ?string $accent;

    /**
     * @var ?string $background
     */
    #[JsonProperty('background')]
    public ?string $background;

    /**
     * @var ?string $link
     */
    #[JsonProperty('link')]
    public ?string $link;

    /**
     * @var ?string $primary
     */
    #[JsonProperty('primary')]
    public ?string $primary;

    /**
     * @var ?string $secondary
     */
    #[JsonProperty('secondary')]
    public ?string $secondary;

    /**
     * @var ?string $textPrimary
     */
    #[JsonProperty('textPrimary')]
    public ?string $textPrimary;

    /**
     * @param array{
     *   accent?: ?string,
     *   background?: ?string,
     *   link?: ?string,
     *   primary?: ?string,
     *   secondary?: ?string,
     *   textPrimary?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->accent = $values['accent'] ?? null;
        $this->background = $values['background'] ?? null;
        $this->link = $values['link'] ?? null;
        $this->primary = $values['primary'] ?? null;
        $this->secondary = $values['secondary'] ?? null;
        $this->textPrimary = $values['textPrimary'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
