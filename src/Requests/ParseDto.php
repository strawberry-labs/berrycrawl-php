<?php

namespace Berrycrawl\Requests;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class ParseDto extends JsonSerializableType
{
    /**
     * @var ?float $timeout
     */
    #[JsonProperty('timeout')]
    public ?float $timeout;

    /**
     * @var string $url Public PDF, Word document, or spreadsheet URL
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @param array{
     *   url: string,
     *   timeout?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->timeout = $values['timeout'] ?? null;
        $this->url = $values['url'];
    }
}
