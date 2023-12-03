<?php

declare(strict_types=1);

namespace Todo\Domain\Model\User;

use RuntimeException;

final class DuplicateUserException extends RuntimeException
{
}
