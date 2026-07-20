<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;
use DateTime;
use Berrycrawl\Core\Types\Date;

class JobSummary extends JsonSerializableType
{
    /**
     * @var ?int $completed
     */
    #[JsonProperty('completed')]
    public ?int $completed;

    /**
     * @var ?DateTime $completedAt
     */
    #[JsonProperty('completedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $completedAt;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var int $creditsUsed
     */
    #[JsonProperty('creditsUsed')]
    public int $creditsUsed;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?int $failed
     */
    #[JsonProperty('failed')]
    public ?int $failed;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?DateTime $startedAt
     */
    #[JsonProperty('startedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startedAt;

    /**
     * @var string $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var int $total
     */
    #[JsonProperty('total')]
    public int $total;

    /**
     * @var value-of<JobSummaryType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   createdAt: DateTime,
     *   creditsUsed: int,
     *   id: string,
     *   status: string,
     *   total: int,
     *   type: value-of<JobSummaryType>,
     *   completed?: ?int,
     *   completedAt?: ?DateTime,
     *   error?: ?string,
     *   failed?: ?int,
     *   startedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->completed = $values['completed'] ?? null;
        $this->completedAt = $values['completedAt'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->creditsUsed = $values['creditsUsed'];
        $this->error = $values['error'] ?? null;
        $this->failed = $values['failed'] ?? null;
        $this->id = $values['id'];
        $this->startedAt = $values['startedAt'] ?? null;
        $this->status = $values['status'];
        $this->total = $values['total'];
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
