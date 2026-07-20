<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class BrandDesignSystemComponents extends JsonSerializableType
{
    /**
     * @var ?BrandComponentStyle $buttonPrimary
     */
    #[JsonProperty('buttonPrimary')]
    public ?BrandComponentStyle $buttonPrimary;

    /**
     * @var ?BrandComponentStyle $buttonSecondary
     */
    #[JsonProperty('buttonSecondary')]
    public ?BrandComponentStyle $buttonSecondary;

    /**
     * @var ?BrandComponentStyle $input
     */
    #[JsonProperty('input')]
    public ?BrandComponentStyle $input;

    /**
     * @param array{
     *   buttonPrimary?: ?BrandComponentStyle,
     *   buttonSecondary?: ?BrandComponentStyle,
     *   input?: ?BrandComponentStyle,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->buttonPrimary = $values['buttonPrimary'] ?? null;
        $this->buttonSecondary = $values['buttonSecondary'] ?? null;
        $this->input = $values['input'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
