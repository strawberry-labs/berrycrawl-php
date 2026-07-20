<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class ScreenshotCookieDto extends JsonSerializableType
{
    /**
     * @var ?string $domain
     */
    #[JsonProperty('domain')]
    public ?string $domain;

    /**
     * @var ?bool $httpOnly
     */
    #[JsonProperty('httpOnly')]
    public ?bool $httpOnly;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $path
     */
    #[JsonProperty('path')]
    public ?string $path;

    /**
     * @var ?value-of<ScreenshotCookieDtoSameSite> $sameSite
     */
    #[JsonProperty('sameSite')]
    public ?string $sameSite;

    /**
     * @var ?bool $secure
     */
    #[JsonProperty('secure')]
    public ?bool $secure;

    /**
     * @var string $value
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   name: string,
     *   value: string,
     *   domain?: ?string,
     *   httpOnly?: ?bool,
     *   path?: ?string,
     *   sameSite?: ?value-of<ScreenshotCookieDtoSameSite>,
     *   secure?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->domain = $values['domain'] ?? null;
        $this->httpOnly = $values['httpOnly'] ?? null;
        $this->name = $values['name'];
        $this->path = $values['path'] ?? null;
        $this->sameSite = $values['sameSite'] ?? null;
        $this->secure = $values['secure'] ?? null;
        $this->value = $values['value'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
