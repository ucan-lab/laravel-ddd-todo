<?php

declare(strict_types=1);

namespace Todo\Domain\Model\User;

use Exception;

final class DuplicateUserException extends Exception
{
}