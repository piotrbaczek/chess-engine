<?php

namespace Tests\Common;

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
        $reflection = new ReflectionClass(Integers::class);

        self::assertTrue($reflection->getConstructor()->isPrivate());
    }

    public function testCloneMethodIsPrivate(): void
    {
        $reflection = new ReflectionClass(Integers::class);

        self::assertTrue($reflection->getMethod('__clone')->isPrivate());
    }
}