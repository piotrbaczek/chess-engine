<?php

namespace Tests\Common;

use phpseclib3\Math\BigInteger;
use PHPUnit\Framework\TestCase;
use piotrbaczek\ChessEngine\Common\Integers;

class IntegersTest extends TestCase
{
    public function testZeroEqualsZero(): void
    {
        $isEqual = Integers::zero()->equals(new BigInteger(0));
        $this->assertTrue($isEqual);
    }
}