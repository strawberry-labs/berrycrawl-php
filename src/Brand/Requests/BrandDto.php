<?php

namespace Berrycrawl\Brand\Requests;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class BrandDto extends JsonSerializableType
{
    /**
     * @var ?bool $refresh Ignore a cached profile and fetch the website again
     */
    #[JsonProperty('refresh')]
    public ?bool $refresh;

    /**
     * @var ?float $timeout Maximum time to spend building the profile, in milliseconds
     */
    #[JsonProperty('timeout')]
    public ?float $timeout;

    /**
     * @var string $url The public website whose brand profile should be extracted
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @param array{
     *   url: string,
     *   refresh?: ?bool,
     *   timeout?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->refresh = $values['refresh'] ?? null;
        $this->timeout = $values['timeout'] ?? null;
        $this->url = $values['url'];
    }
}
