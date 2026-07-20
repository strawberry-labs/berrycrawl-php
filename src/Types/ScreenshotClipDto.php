<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class ScreenshotClipDto extends JsonSerializableType
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
     * @var float $x
     */
    #[JsonProperty('x')]
    public float $x;

    /**
     * @var float $y
     */
    #[JsonProperty('y')]
    public float $y;

    /**
     * @param array{
     *   height: float,
     *   width: float,
     *   x: float,
     *   y: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->height = $values['height'];
        $this->width = $values['width'];
        $this->x = $values['x'];
        $this->y = $values['y'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
