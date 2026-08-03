<?php

namespace Tests\Common;

use Error;
use PHPUnit\Framework\TestCase;
use piotrbaczek\ChessEngine\Common\HexInteger;
use piotrbaczek\ChessEngine\Common\Integers;
use ReflectionClass;

class IntegersTest extends TestCase
{
    public function testZeroEqualsZero(): void
    {
        $isEqual = Integers::zero()->equals(new HexInteger(0));
        self::assertTrue($isEqual);
    }

    public function testZeroReturnsHexInteger(): void
    {
        $zero = Integers::zero();

        self::assertInstanceOf(HexInteger::class, $zero);
    }

    public function testConstructorIsPrivate(): void
    {
        $this->expectException(Error::class);
        $this->expectExceptionMessageIsOrContains('Call to private piotrbaczek\ChessEngine\Common\Integers::__construct() from scope Tests\Common\IntegersTest');
        $integer = new Integers();
    }
}