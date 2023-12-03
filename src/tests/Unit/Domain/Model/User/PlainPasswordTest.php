<?php

declare(strict_types=1);

namespace Tests\Unit\Domain\Model\User;

use PHPUnit\Framework\TestCase;
use Todo\Domain\Model\User\PlainPassword;
use InvalidArgumentException;

final class PlainPasswordTest extends TestCase
{
    /**
     * @param string $password
     * @return void
     * @dataProvider data利用可能なパスワード
     */
    public function test利用可能なパスワード(string $password): void
    {
        $plainPassword = new PlainPassword($password);
        $this->assertInstanceOf(PlainPassword::class, $plainPassword);
    }

    /**
     * @return array
     */
    public static function data利用可能なパスワード(): array
    {
        return [
            '大文字、小文字、数字、記号を含む' => [
                'password' => 'P@ssword',
            ],
            '数字なし' => [
                'password' => 'P@ssword',
            ],
            '記号なし' => [
                'password' => 'Passw0rd',
            ],
            '大文字なし' => [
                'password' => 'p@ssw0rd',
            ],
            '小文字なし' => [
                'password' => 'P@SSW0RD',
            ],
        ];
    }

    /**
     * @param string $password
     * @return void
     * @dataProvider data利用不可なパスワード
     */
    public function test利用不可なパスワード(string $password): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('8文字以上のパスワードを入力してください');
        new PlainPassword($password);
    }

    /**
     * @return array
     */
    public static function data利用不可なパスワード(): array
    {
        return [
            '8文字未満' => [
                'password' => 'P@ssw0r',
            ],
        ];
    }
}
