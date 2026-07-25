<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use piotrbaczek\ChessEngine\Bitboard;

class BitboardTest extends TestCase
{
    public function testBitboard()
    {
        $bitboard = new Bitboard();
        var_dump($bitboard->getWhiteKingBitboard()->getValue()->toString());
        $this->assertInstanceOf(Bitboard::class, $bitboard);
    }
}