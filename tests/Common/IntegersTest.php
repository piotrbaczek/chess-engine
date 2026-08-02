<?php

namespace Tests\Common;

use PHPUnit\Framework\TestCase;
use piotrbaczek\ChessEngine\Common\HexInteger;
use piotrbaczek\ChessEngine\Common\Integers;

class IntegersTest extends TestCase
{
    public function testZeroEqualsZero(): void
    {
        $isEqual = Integers::zero()->equals(new HexInteger(0));
        $this->assertTrue($isEqual);
    }
}