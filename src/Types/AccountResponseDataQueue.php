<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class AccountResponseDataQueue extends JsonSerializableType
{
    /**
     * @var int $active
     */
    #[JsonProperty('active')]
    public int $active;

    /**
     * @var int $waiting
     */
    #[JsonProperty('waiting')]
    public int $waiting;

    /**
     * @param array{
     *   active: int,
     *   waiting: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->active = $values['active'];
        $this->waiting = $values['waiting'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
