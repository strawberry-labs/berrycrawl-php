<?php

namespace Berrycrawl\Jobs\Requests;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Jobs\Types\ListJobsRequestType;
use Berrycrawl\Jobs\Types\ListJobsRequestStatus;

class ListJobsRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<ListJobsRequestType> $type
     */
    public ?string $type;

    /**
     * @var ?value-of<ListJobsRequestStatus> $status
     */
    public ?string $status;

    /**
     * @var ?float $page
     */
    public ?float $page;

    /**
     * @var ?float $limit
     */
    public ?float $limit;

    /**
     * @param array{
     *   type?: ?value-of<ListJobsRequestType>,
     *   status?: ?value-of<ListJobsRequestStatus>,
     *   page?: ?float,
     *   limit?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->limit = $values['limit'] ?? null;
    }
}
