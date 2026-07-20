<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Core\Types\ArrayType;

class BrandProfile extends JsonSerializableType
{
    /**
     * @var ?BrandDesignSystem $branding
     */
    #[JsonProperty('branding')]
    public ?BrandDesignSystem $branding;

    /**
     * @var array<BrandProfileColorsItem> $colors
     */
    #[JsonProperty('colors'), ArrayType([BrandProfileColorsItem::class])]
    public array $colors;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var string $domain
     */
    #[JsonProperty('domain')]
    public string $domain;

    /**
     * @var array<BrandProfileFontsItem> $fonts
     */
    #[JsonProperty('fonts'), ArrayType([BrandProfileFontsItem::class])]
    public array $fonts;

    /**
     * @var array<BrandAsset> $images
     */
    #[JsonProperty('images'), ArrayType([BrandAsset::class])]
    public array $images;

    /**
     * @var ?string $language
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var array<BrandAsset> $logos
     */
    #[JsonProperty('logos'), ArrayType([BrandAsset::class])]
    public array $logos;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var array<BrandProfileSocialsItem> $socials
     */
    #[JsonProperty('socials'), ArrayType([BrandProfileSocialsItem::class])]
    public array $socials;

    /**
     * @var ?string $tagline
     */
    #[JsonProperty('tagline')]
    public ?string $tagline;

    /**
     * @param array{
     *   colors: array<BrandProfileColorsItem>,
     *   domain: string,
     *   fonts: array<BrandProfileFontsItem>,
     *   images: array<BrandAsset>,
     *   logos: array<BrandAsset>,
     *   name: string,
     *   socials: array<BrandProfileSocialsItem>,
     *   branding?: ?BrandDesignSystem,
     *   description?: ?string,
     *   language?: ?string,
     *   tagline?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->branding = $values['branding'] ?? null;
        $this->colors = $values['colors'];
        $this->description = $values['description'] ?? null;
        $this->domain = $values['domain'];
        $this->fonts = $values['fonts'];
        $this->images = $values['images'];
        $this->language = $values['language'] ?? null;
        $this->logos = $values['logos'];
        $this->name = $values['name'];
        $this->socials = $values['socials'];
        $this->tagline = $values['tagline'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
