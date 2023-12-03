<?php

declare(strict_types=1);

namespace Todo\Domain\Model\User;

use InvalidArgumentException;

final readonly class PlainPassword implements Password
{
    private const string VALIDATE_ERROR_MESSAGE = '大文字、小文字、数字、記号を含む8文字以上のパスワードを入力してください';

    public function __construct(private string $value)
    {
        // 最低8文字以上か
        if (strlen($value) < 8) {
            throw new InvalidArgumentException(self::VALIDATE_ERROR_MESSAGE);
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
