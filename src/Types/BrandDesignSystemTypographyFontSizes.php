<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class BrandDesignSystemTypographyFontSizes extends JsonSerializableType
{
    /**
     * @var ?string $body
     */
    #[JsonProperty('body')]
    public ?string $body;

    /**
     * @var ?string $h1
     */
    #[JsonProperty('h1')]
    public ?string $h1;

    /**
     * @var ?string $h2
     */
    #[JsonProperty('h2')]
    public ?string $h2;

    /**
     * @param array{
     *   body?: ?string,
     *   h1?: ?string,
     *   h2?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->body = $values['body'] ?? null;
        $this->h1 = $values['h1'] ?? null;
        $this->h2 = $values['h2'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
