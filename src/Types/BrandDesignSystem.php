<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class BrandDesignSystem extends JsonSerializableType
{
    /**
     * @var BrandDesignSystemColors $colors
     */
    #[JsonProperty('colors')]
    public BrandDesignSystemColors $colors;

    /**
     * @var value-of<BrandDesignSystemColorScheme> $colorScheme
     */
    #[JsonProperty('colorScheme')]
    public string $colorScheme;

    /**
     * @var BrandDesignSystemComponents $components
     */
    #[JsonProperty('components')]
    public BrandDesignSystemComponents $components;

    /**
     * @var BrandDesignSystemImages $images
     */
    #[JsonProperty('images')]
    public BrandDesignSystemImages $images;

    /**
     * @var BrandDesignSystemSpacing $spacing
     */
    #[JsonProperty('spacing')]
    public BrandDesignSystemSpacing $spacing;

    /**
     * @var BrandDesignSystemTypography $typography
     */
    #[JsonProperty('typography')]
    public BrandDesignSystemTypography $typography;

    /**
     * @param array{
     *   colors: BrandDesignSystemColors,
     *   colorScheme: value-of<BrandDesignSystemColorScheme>,
     *   components: BrandDesignSystemComponents,
     *   images: BrandDesignSystemImages,
     *   spacing: BrandDesignSystemSpacing,
     *   typography: BrandDesignSystemTypography,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->colors = $values['colors'];
        $this->colorScheme = $values['colorScheme'];
        $this->components = $values['components'];
        $this->images = $values['images'];
        $this->spacing = $values['spacing'];
        $this->typography = $values['typography'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
