<?php

namespace Tests\Bitboard;

use PHPUnit\Framework\TestCase;
use piotrbaczek\ChessEngine\Bitboard\Masks;

class MasksTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->masks = new Masks();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->masks);
    }

    public function testInitialFileValuesAreCorrect(): void
    {
        $this->assertEquals('0101010101010101', $this->masks->getFileAMask()->getHexValue());
        $this->assertEquals('0202020202020202', $this->masks->getFileBMask()->getHexValue());
        $this->assertEquals('0404040404040404', $this->masks->getFileCMask()->getHexValue());
        $this->assertEquals('0808080808080808', $this->masks->getFileDMask()->getHexValue());
        $this->assertEquals('1010101010101010', $this->masks->getFileEMask()->getHexValue());
        $this->assertEquals('2020202020202020', $this->masks->getFileFMask()->getHexValue());
        $this->assertEquals('4040404040404040', $this->masks->getFileGMask()->getHexValue());
        $this->assertEquals('8080808080808080', $this->masks->getFileHMask()->getHexValue());
    }

    public function testInitialRankValuesAreCorrect(): void
    {
        $this->assertEquals('ff', $this->masks->getRank1Mask()->getHexValue());
        $this->assertEquals('ff00', $this->masks->getRank2Mask()->getHexValue());
        $this->assertEquals('ff0000', $this->masks->getRank3Mask()->getHexValue());
        $this->assertEquals('ff000000', $this->masks->getRank4Mask()->getHexValue());
        $this->assertEquals('ff00000000', $this->masks->getRank5Mask()->getHexValue());
        $this->assertEquals('ff0000000000', $this->masks->getRank6Mask()->getHexValue());
        $this->assertEquals('ff000000000000', $this->masks->getRank7Mask()->getHexValue());
        $this->assertEquals('ff00000000000000', $this->masks->getRank8Mask()->getHexValue());
    }
}