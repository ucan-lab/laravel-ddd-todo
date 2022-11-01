<?php

declare(strict_types=1);

namespace Todo\Lang;

use ArrayIterator;
use IteratorAggregate;
use Traversable;

abstract class ArrayList implements IteratorAggregate
{
    public function __construct(private readonly array $attributes)
    {
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->attributes);
    }
}
