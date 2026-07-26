<?php

declare(strict_types=1);

namespace Tests\Dictionaries;

use PHPUnit\Framework\TestCase;
use piotrbaczek\ChessEngine\Dictionaries\CountsEnumCases;
use piotrbaczek\ChessEngine\Dictionaries\Squares;

final class SquaresTest extends TestCase
{
    public function testItContainsSixtyFiveCases(): void
    {
        self::assertCount(65, Squares::cases());
    }

    public function testGetCasesCountReturnsSixtyFive(): void
    {
        self::assertSame(64, Squares::getCasesCount());
    }

    public function testFirstSquareIsA1(): void
    {
        self::assertSame(0, Squares::A1->value);
    }

    public function testLastBoardSquareIsH8(): void
    {
        self::assertSame(63, Squares::H8->value);
    }

    public function testNoneSquareHasValueSixtyFour(): void
    {
        self::assertSame(64, Squares::NONE->value);
    }

    public function testZeroConstantPointsToA1(): void
    {
        self::assertSame(Squares::A1, Squares::ZERO);
    }

    public function testAllBoardSquaresHaveSequentialValues(): void
    {
        $squares = Squares::cases();

        foreach ($squares as $index => $square) {
            self::assertSame($index, $square->value);
        }
    }

    public function testAllFilesAndRanksExist(): void
    {
        $expectedSquares = [];

        foreach (range(1, 8) as $rank) {
            foreach (['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'] as $file) {
                $expectedSquares[] = $file . $rank;
            }
        }

        $expectedSquares[] = 'NONE';

        self::assertSame(
            $expectedSquares,
            array_column(
                Squares::cases(),
                'name'
            )
        );
    }

    public function testFromReturnsCorrectSquare(): void
    {
        self::assertSame(Squares::A1, Squares::from(0));
        self::assertSame(Squares::D4, Squares::from(27));
        self::assertSame(Squares::H8, Squares::from(63));
        self::assertSame(Squares::NONE, Squares::from(64));
    }

    public function testTryFromReturnsNullForInvalidValues(): void
    {
        self::assertNull(Squares::tryFrom(-1));
        self::assertNull(Squares::tryFrom(65));
        self::assertNull(Squares::tryFrom(100));
    }

    public function testFromThrowsValueErrorForInvalidValue(): void
    {
        $this->expectException(\ValueError::class);

        $count = Squares::from(65);
    }

    public function testItImplementsCountsEnumCasesInterface(): void
    {
        self::assertInstanceOf(
            CountsEnumCases::class,
            Squares::A1
        );
    }
}