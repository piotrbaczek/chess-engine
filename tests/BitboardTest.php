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

    public function testInitialFileValuesAreCorrect()
    {
        $this->assertEquals('0101010101010101', $this->bitboard->getFileABB()->getValue()->toHex());
        $this->assertEquals('0202020202020202', $this->bitboard->getFileBBB()->getValue()->toHex());
        $this->assertEquals('0404040404040404', $this->bitboard->getFileCBB()->getValue()->toHex());
        $this->assertEquals('0808080808080808', $this->bitboard->getFileDBB()->getValue()->toHex());
        $this->assertEquals('1010101010101010', $this->bitboard->getFileEBB()->getValue()->toHex());
        $this->assertEquals('2020202020202020', $this->bitboard->getFileFBB()->getValue()->toHex());
        $this->assertEquals('4040404040404040', $this->bitboard->getFileGBB()->getValue()->toHex());
        $this->assertEquals('8080808080808080', $this->bitboard->getFileHBB()->getValue()->toHex());
    }

    public function testInitialRankValuesAreCorrect()
    {
        $this->assertEquals('ff', $this->bitboard->getRank1BB()->getValue()->toHex());
        $this->assertEquals('ff00', $this->bitboard->getRank2BB()->getValue()->toHex());
        $this->assertEquals('ff0000', $this->bitboard->getRank3BB()->getValue()->toHex());
        $this->assertEquals('ff000000', $this->bitboard->getRank4BB()->getValue()->toHex());
        $this->assertEquals('ff00000000', $this->bitboard->getRank5BB()->getValue()->toHex());
        $this->assertEquals('ff0000000000', $this->bitboard->getRank6BB()->getValue()->toHex());
        $this->assertEquals('ff000000000000', $this->bitboard->getRank7BB()->getValue()->toHex());
        $this->assertEquals('ff00000000000000', $this->bitboard->getRank8BB()->getValue()->toHex());
    }
}