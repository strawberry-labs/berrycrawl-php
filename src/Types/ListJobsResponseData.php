<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Core\Types\ArrayType;

class ListJobsResponseData extends JsonSerializableType
{
    /**
     * @var array<JobSummary> $jobs
     */
    #[JsonProperty('jobs'), ArrayType([JobSummary::class])]
    public array $jobs;

    /**
     * @var Pagination $pagination
     */
    #[JsonProperty('pagination')]
    public Pagination $pagination;

    /**
     * @param array{
     *   jobs: array<JobSummary>,
     *   pagination: Pagination,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->jobs = $values['jobs'];
        $this->pagination = $values['pagination'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
