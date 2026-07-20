<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class BrandProfileSocialsItem extends JsonSerializableType
{
    /**
     * @var string $network
     */
    #[JsonProperty('network')]
    public string $network;

    /**
     * @var string $url
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @param array{
     *   network: string,
     *   url: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->network = $values['network'];
        $this->url = $values['url'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
