<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class BrandDesignSystemImages extends JsonSerializableType
{
    /**
     * @var ?string $favicon
     */
    #[JsonProperty('favicon')]
    public ?string $favicon;

    /**
     * @var ?string $logo
     */
    #[JsonProperty('logo')]
    public ?string $logo;

    /**
     * @var ?string $ogImage
     */
    #[JsonProperty('ogImage')]
    public ?string $ogImage;

    /**
     * @param array{
     *   favicon?: ?string,
     *   logo?: ?string,
     *   ogImage?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->favicon = $values['favicon'] ?? null;
        $this->logo = $values['logo'] ?? null;
        $this->ogImage = $values['ogImage'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
