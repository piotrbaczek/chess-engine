<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use piotrbaczek\ChessEngine\Bitboard;

class BitboardTest extends TestCase
{
    private Bitboard $bitboard;

    protected function setUp(): void
    {
        parent::setUp();
        $this->bitboard = new Bitboard();
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

    public function testHasMasks()
    {
        $this->assertInstanceOf(Bitboard\Masks::class, $this->bitboard->masks);
    }
}