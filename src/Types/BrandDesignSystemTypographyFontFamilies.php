<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class BrandDesignSystemTypographyFontFamilies extends JsonSerializableType
{
    /**
     * @var ?string $heading
     */
    #[JsonProperty('heading')]
    public ?string $heading;

    /**
     * @var ?string $primary
     */
    #[JsonProperty('primary')]
    public ?string $primary;

    /**
     * @param array{
     *   heading?: ?string,
     *   primary?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->heading = $values['heading'] ?? null;
        $this->primary = $values['primary'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
