<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Traits\JobSummary;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Core\Types\ArrayType;
use DateTime;

class JobResponseData extends JsonSerializableType
{
    use JobSummary;

    /**
     * @var array<JobResponseDataErrorsItem> $errors
     */
    #[JsonProperty('errors'), ArrayType([JobResponseDataErrorsItem::class])]
    public array $errors;

    /**
     * @var mixed $result
     */
    #[JsonProperty('result')]
    public mixed $result;

    /**
     * @var Pagination $resultPagination
     */
    #[JsonProperty('resultPagination')]
    public Pagination $resultPagination;

    /**
     * @var array<array<string, mixed>> $results
     */
    #[JsonProperty('results'), ArrayType([['string' => 'mixed']])]
    public array $results;

    /**
     * @param array{
     *   createdAt: DateTime,
     *   creditsUsed: int,
     *   id: string,
     *   status: string,
     *   total: int,
     *   type: value-of<JobSummaryType>,
     *   errors: array<JobResponseDataErrorsItem>,
     *   resultPagination: Pagination,
     *   results: array<array<string, mixed>>,
     *   completed?: ?int,
     *   completedAt?: ?DateTime,
     *   error?: ?string,
     *   failed?: ?int,
     *   startedAt?: ?DateTime,
     *   result?: mixed,
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
        $this->errors = $values['errors'];
        $this->result = $values['result'] ?? null;
        $this->resultPagination = $values['resultPagination'];
        $this->results = $values['results'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
