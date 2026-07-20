<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;
use DateTime;
use Berrycrawl\Core\Types\Date;

class ScrapeMetadata extends JsonSerializableType
{
    /**
     * @var ?string $contentType
     */
    #[JsonProperty('contentType')]
    public ?string $contentType;

    /**
     * @var ?int $statusCode
     */
    #[JsonProperty('statusCode')]
    public ?int $statusCode;

    /**
     * @var DateTime $timestamp
     */
    #[JsonProperty('timestamp'), Date(Date::TYPE_DATETIME)]
    public DateTime $timestamp;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var string $url
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @param array{
     *   timestamp: DateTime,
     *   url: string,
     *   contentType?: ?string,
     *   statusCode?: ?int,
     *   title?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->contentType = $values['contentType'] ?? null;
        $this->statusCode = $values['statusCode'] ?? null;
        $this->timestamp = $values['timestamp'];
        $this->title = $values['title'] ?? null;
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
