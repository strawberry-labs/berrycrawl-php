<?php

namespace Berrycrawl\Types;

use Berrycrawl\Core\Json\JsonSerializableType;
use Berrycrawl\Core\Json\JsonProperty;

class ActionDto extends JsonSerializableType
{
    /**
     * @var ?float $amount
     */
    #[JsonProperty('amount')]
    public ?float $amount;

    /**
     * @var ?value-of<ActionDtoDirection> $direction
     */
    #[JsonProperty('direction')]
    public ?string $direction;

    /**
     * @var ?string $key
     */
    #[JsonProperty('key')]
    public ?string $key;

    /**
     * @var ?float $milliseconds
     */
    #[JsonProperty('milliseconds')]
    public ?float $milliseconds;

    /**
     * @var ?string $selector
     */
    #[JsonProperty('selector')]
    public ?string $selector;

    /**
     * @var ?string $text
     */
    #[JsonProperty('text')]
    public ?string $text;

    /**
     * @var value-of<ActionDtoType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   type: value-of<ActionDtoType>,
     *   amount?: ?float,
     *   direction?: ?value-of<ActionDtoDirection>,
     *   key?: ?string,
     *   milliseconds?: ?float,
     *   selector?: ?string,
     *   text?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->amount = $values['amount'] ?? null;
        $this->direction = $values['direction'] ?? null;
        $this->key = $values['key'] ?? null;
        $this->milliseconds = $values['milliseconds'] ?? null;
        $this->selector = $values['selector'] ?? null;
        $this->text = $values['text'] ?? null;
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
