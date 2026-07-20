<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class ScreenshotViewportDto extends JsonSerializableType
{
    /**
     * @var float $height
     */
    #[JsonProperty('height')]
    public float $height;

    /**
     * @var float $width
     */
    #[JsonProperty('width')]
    public float $width;

    /**
     * @param array{
     *   height: float,
     *   width: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->height = $values['height'];
        $this->width = $values['width'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
