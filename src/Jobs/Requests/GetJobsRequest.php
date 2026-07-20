<?php

namespace Berrycrawl\Jobs\Requests;

use Berrycrawl\Core\Json\JsonSerializableType;

class GetJobsRequest extends JsonSerializableType
{
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
     *   page?: ?float,
     *   limit?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->limit = $values['limit'] ?? null;
    }
}
