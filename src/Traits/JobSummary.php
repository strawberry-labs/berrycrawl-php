<?php

namespace Berrycrawl\Traits;

use DateTime;
use Berrycrawl\Types\JobSummaryType;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Core\Types\Date;

/**
 * @property ?int $completed
 * @property ?DateTime $completedAt
 * @property DateTime $createdAt
 * @property int $creditsUsed
 * @property ?string $error
 * @property ?int $failed
 * @property string $id
 * @property ?DateTime $startedAt
 * @property string $status
 * @property int $total
 * @property value-of<JobSummaryType> $type
 */
trait JobSummary
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
}
