<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Core\Types\ArrayType;

class BrandDesignSystemTypographyFontStacks extends JsonSerializableType
{
    /**
     * @var array<string> $body
     */
    #[JsonProperty('body'), ArrayType(['string'])]
    public array $body;

    /**
     * @var array<string> $heading
     */
    #[JsonProperty('heading'), ArrayType(['string'])]
    public array $heading;

    /**
     * @var array<string> $paragraph
     */
    #[JsonProperty('paragraph'), ArrayType(['string'])]
    public array $paragraph;

    /**
     * @param array{
     *   body: array<string>,
     *   heading: array<string>,
     *   paragraph: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
        $this->heading = $values['heading'];
        $this->paragraph = $values['paragraph'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
