<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class BrandResponseData extends JsonSerializableType
{
    /**
     * @var BrandProfile $brand
     */
    #[JsonProperty('brand')]
    public BrandProfile $brand;

    /**
     * @var BrandResponseDataMeta $meta
     */
    #[JsonProperty('meta')]
    public BrandResponseDataMeta $meta;

    /**
     * @param array{
     *   brand: BrandProfile,
     *   meta: BrandResponseDataMeta,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->brand = $values['brand'];
        $this->meta = $values['meta'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
