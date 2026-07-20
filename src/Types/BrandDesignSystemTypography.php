<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class BrandDesignSystemTypography extends JsonSerializableType
{
    /**
     * @var BrandDesignSystemTypographyFontFamilies $fontFamilies
     */
    #[JsonProperty('fontFamilies')]
    public BrandDesignSystemTypographyFontFamilies $fontFamilies;

    /**
     * @var BrandDesignSystemTypographyFontSizes $fontSizes
     */
    #[JsonProperty('fontSizes')]
    public BrandDesignSystemTypographyFontSizes $fontSizes;

    /**
     * @var BrandDesignSystemTypographyFontStacks $fontStacks
     */
    #[JsonProperty('fontStacks')]
    public BrandDesignSystemTypographyFontStacks $fontStacks;

    /**
     * @param array{
     *   fontFamilies: BrandDesignSystemTypographyFontFamilies,
     *   fontSizes: BrandDesignSystemTypographyFontSizes,
     *   fontStacks: BrandDesignSystemTypographyFontStacks,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->fontFamilies = $values['fontFamilies'];
        $this->fontSizes = $values['fontSizes'];
        $this->fontStacks = $values['fontStacks'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
