<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Core\Types\ArrayType;

class ScrapeResponse extends JsonSerializableType
{
    /**
     * @var ScrapeResponseCredits $credits
     */
    #[JsonProperty('credits')]
    public ScrapeResponseCredits $credits;

    /**
     * @var ?array<string, mixed> $data
     */
    #[JsonProperty('data'), ArrayType(['string' => 'mixed'])]
    public ?array $data;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ScrapeMetadata $metadata
     */
    #[JsonProperty('metadata')]
    public ScrapeMetadata $metadata;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   credits: ScrapeResponseCredits,
     *   metadata: ScrapeMetadata,
     *   success: bool,
     *   data?: ?array<string, mixed>,
     *   error?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->credits = $values['credits'];
        $this->data = $values['data'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->metadata = $values['metadata'];
        $this->success = $values['success'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
