<?php

declare(strict_types=1);

namespace Todo\Domain\Model\Task;

use InvalidArgumentException;

final readonly class PostponeCount
{
    private const int MAX_POSTPONE_COUNT = 3;

    private function __construct(private int $value)
    {
    }

    /**
     * @return static
     */
    public static function create(int $value = 0): self
    {
        if ($value < 0) {
            throw new InvalidArgumentException('延期回数は自然数である必要があります。');
        }

        if ($value > self::MAX_POSTPONE_COUNT) {
            throw new InvalidArgumentException('最大延期回数を超えています。');
        }

        return new self($value);
    }

    public static function fromRepository(int $postponeCount): self
    {
        return new self($postponeCount);
    }

    public function value(): int
    {
        return $this->value;
    }

    /**
     * @return $this
     */
    public function increment(): self
    {
        return self::create($this->value + 1);
    }
}
