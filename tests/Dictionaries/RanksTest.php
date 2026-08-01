<?php

declare(strict_types=1);

namespace Tests\Dictionaries;

use PHPUnit\Framework\TestCase;
use piotrbaczek\ChessEngine\Dictionaries\CountsEnumCasesInterface;
use piotrbaczek\ChessEngine\Dictionaries\Ranks;

final class RanksTest extends TestCase
{
    public function testItContainsEightCases(): void
    {
        self::assertCount(8, Ranks::cases());
    }

    public function testGetCasesCountReturnsEight(): void
    {
        self::assertSame(8, Ranks::getCasesCount());
    }

    public function testBackedValuesAreCorrect(): void
    {
        self::assertSame(
            [
                'RANK_1' => 0,
                'RANK_2' => 1,
                'RANK_3' => 2,
                'RANK_4' => 3,
                'RANK_5' => 4,
                'RANK_6' => 5,
                'RANK_7' => 6,
                'RANK_8' => 7,
            ],
            array_column(
                Ranks::cases(),
                'value',
                'name'
            )
        );
    }

    public function testCasesAreReturnedInDeclarationOrder(): void
    {
        self::assertSame(
            [
                Ranks::RANK_1,
                Ranks::RANK_2,
                Ranks::RANK_3,
                Ranks::RANK_4,
                Ranks::RANK_5,
                Ranks::RANK_6,
                Ranks::RANK_7,
                Ranks::RANK_8,
            ],
            Ranks::cases()
        );
    }

    public function testFromReturnsCorrectCaseForValidValues(): void
    {
        self::assertSame(Ranks::RANK_1, Ranks::from(0));
        self::assertSame(Ranks::RANK_4, Ranks::from(3));
        self::assertSame(Ranks::RANK_8, Ranks::from(7));
    }

    public function testTryFromReturnsNullForInvalidValues(): void
    {
        self::assertNull(Ranks::tryFrom(-1));
        self::assertNull(Ranks::tryFrom(8));
        self::assertNull(Ranks::tryFrom(100));
    }

    public function testFromThrowsValueErrorForInvalidValue(): void
    {
        $this->expectException(\ValueError::class);

        $count = Ranks::from(8);
    }

    public function testItImplementsCountsEnumCasesInterface(): void
    {
        self::assertInstanceOf(
            CountsEnumCasesInterface::class,
            Ranks::RANK_1
        );
    }
}