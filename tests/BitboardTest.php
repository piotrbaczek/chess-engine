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
        $this->assertEquals('0101010101010101', $this->bitboard->masks->getFileAMask()->getHexValue());
        $this->assertEquals('0202020202020202', $this->bitboard->masks->getFileBMask()->getHexValue());
        $this->assertEquals('0404040404040404', $this->bitboard->masks->getFileCMask()->getHexValue());
        $this->assertEquals('0808080808080808', $this->bitboard->masks->getFileDMask()->getHexValue());
        $this->assertEquals('1010101010101010', $this->bitboard->masks->getFileEMask()->getHexValue());
        $this->assertEquals('2020202020202020', $this->bitboard->masks->getFileFMask()->getHexValue());
        $this->assertEquals('4040404040404040', $this->bitboard->masks->getFileGMask()->getHexValue());
        $this->assertEquals('8080808080808080', $this->bitboard->masks->getFileHMask()->getHexValue());
    }

    public function testInitialRankValuesAreCorrect()
    {
        $this->assertEquals('ff', $this->bitboard->masks->getRank1Mask()->getHexValue());
        $this->assertEquals('ff00', $this->bitboard->masks->getRank2Mask()->getHexValue());
        $this->assertEquals('ff0000', $this->bitboard->masks->getRank3Mask()->getHexValue());
        $this->assertEquals('ff000000', $this->bitboard->masks->getRank4Mask()->getHexValue());
        $this->assertEquals('ff00000000', $this->bitboard->masks->getRank5Mask()->getHexValue());
        $this->assertEquals('ff0000000000', $this->bitboard->masks->getRank6Mask()->getHexValue());
        $this->assertEquals('ff000000000000', $this->bitboard->masks->getRank7Mask()->getHexValue());
        $this->assertEquals('ff00000000000000', $this->bitboard->masks->getRank8Mask()->getHexValue());
    }
}