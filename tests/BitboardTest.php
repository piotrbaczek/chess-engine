<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use piotrbaczek\ChessEngine\Bitboard;

class BitboardTest extends TestCase
{
    public function testBitboard()
    {
        $bitboard = new Bitboard();
        echo $bitboard->getWhiteKingBitboard();
        $this->assertInstanceOf(Bitboard::class, $bitboard);
    }
}