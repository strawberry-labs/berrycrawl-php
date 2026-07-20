<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class BrandAsset extends JsonSerializableType
{
    /**
     * @var ?int $height
     */
    #[JsonProperty('height')]
    public ?int $height;

    /**
     * @var ?string $theme
     */
    #[JsonProperty('theme')]
    public ?string $theme;

    /**
     * @var string $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $url
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var ?int $width
     */
    #[JsonProperty('width')]
    public ?int $width;

    /**
     * @param array{
     *   type: string,
     *   url: string,
     *   height?: ?int,
     *   theme?: ?string,
     *   width?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->height = $values['height'] ?? null;
        $this->theme = $values['theme'] ?? null;
        $this->type = $values['type'];
        $this->url = $values['url'];
        $this->width = $values['width'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
