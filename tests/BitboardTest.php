<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use piotrbaczek\ChessEngine\Bitboard;
use piotrbaczek\ChessEngine\Common\Integers;

class BitboardTest extends TestCase
{
    private Bitboard $bitboard;

    protected function setUp(): void
    {
        parent::setUp();
        $this->bitboard = new Bitboard(Integers::zero());
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->bitboard);
    }

    protected function assertPreConditions(): void
    {
        $this->assertInstanceOf(Bitboard::class, $this->bitboard);
    }

    public function testGetHexValueReturnsCorrectValue(): void
    {
        $this->assertEmpty($this->bitboard->getHexValue());
    }

    public function testHasMasks(): void
    {
        $this->assertInstanceOf(Bitboard\Masks::class, $this->bitboard::masks());
        $this->assertInstanceOf(Bitboard\Masks::class, Bitboard::masks());
    }
}