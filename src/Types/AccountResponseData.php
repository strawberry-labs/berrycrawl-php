<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use DateTime;
use Berrycrawl\Core\Json\JsonProperty;
use Berrycrawl\Core\Types\Date;

class AccountResponseData extends JsonSerializableType
{
    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var int $credits
     */
    #[JsonProperty('credits')]
    public int $credits;

    /**
     * @var string $email
     */
    #[JsonProperty('email')]
    public string $email;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var float $lifetimeSpendUsd
     */
    #[JsonProperty('lifetimeSpendUsd')]
    public float $lifetimeSpendUsd;

    /**
     * @var AccountResponseDataPlan $plan
     */
    #[JsonProperty('plan')]
    public AccountResponseDataPlan $plan;

    /**
     * @var AccountResponseDataQueue $queue
     */
    #[JsonProperty('queue')]
    public AccountResponseDataQueue $queue;

    /**
     * @param array{
     *   createdAt: DateTime,
     *   credits: int,
     *   email: string,
     *   id: string,
     *   lifetimeSpendUsd: float,
     *   plan: AccountResponseDataPlan,
     *   queue: AccountResponseDataQueue,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->createdAt = $values['createdAt'];
        $this->credits = $values['credits'];
        $this->email = $values['email'];
        $this->id = $values['id'];
        $this->lifetimeSpendUsd = $values['lifetimeSpendUsd'];
        $this->plan = $values['plan'];
        $this->queue = $values['queue'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
