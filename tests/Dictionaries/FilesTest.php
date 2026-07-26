<?php

declare(strict_types=1);

namespace Tests\Dictionaries;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use piotrbaczek\ChessEngine\Dictionaries\Files;
use ValueError;

final class FilesTest extends TestCase
{
    public function testItContainsEightCases(): void
    {
        self::assertCount(8, Files::cases());
    }

    public function testGetCasesCountReturnsEight(): void
    {
        self::assertSame(8, Files::getCasesCount());
    }

    #[DataProvider('casesProvider')]
    public function testCaseValues(Files $file, int $expectedValue): void
    {
        self::assertSame($expectedValue, $file->value);
    }

    public static function casesProvider(): iterable
    {
        yield 'FILE_A' => [Files::FILE_A, 0];
        yield 'FILE_B' => [Files::FILE_B, 1];
        yield 'FILE_C' => [Files::FILE_C, 2];
        yield 'FILE_D' => [Files::FILE_D, 3];
        yield 'FILE_E' => [Files::FILE_E, 4];
        yield 'FILE_F' => [Files::FILE_F, 5];
        yield 'FILE_G' => [Files::FILE_G, 6];
        yield 'FILE_H' => [Files::FILE_H, 7];
    }

    public function testCasesAreReturnedInDeclarationOrder(): void
    {
        self::assertSame(
            [
                Files::FILE_A,
                Files::FILE_B,
                Files::FILE_C,
                Files::FILE_D,
                Files::FILE_E,
                Files::FILE_F,
                Files::FILE_G,
                Files::FILE_H,
            ],
            Files::cases()
        );
    }

    #[DataProvider('fromProvider')]
    public function testFromReturnsCorrectCase(int $value, Files $expected): void
    {
        self::assertSame($expected, Files::from($value));
    }

    public static function fromProvider(): iterable
    {
        foreach (Files::cases() as $case) {
            yield $case->name => [$case->value, $case];
        }
    }

    public function testTryFromReturnsNullForInvalidValue(): void
    {
        self::assertNull(Files::tryFrom(-1));
        self::assertNull(Files::tryFrom(8));
        self::assertNull(Files::tryFrom(100));
    }

    public function testFromThrowsValueErrorForInvalidValue(): void
    {
        $this->expectException(ValueError::class);

        $count = Files::from(8);
    }
}