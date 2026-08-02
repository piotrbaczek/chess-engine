<?php

namespace Tests\Bitboard;

use PHPUnit\Framework\TestCase;
use piotrbaczek\ChessEngine\Bitboard\InternalBitboard;
use piotrbaczek\ChessEngine\Common\HexInteger;

class InternalBitboardTest extends TestCase
{
    private InternalBitboard $blackFieldsBitboard;

    protected function setUp(): void
    {
        parent::setUp();
        $this->blackFieldsBitboard = new InternalBitboard(new HexInteger('0xAA55AA55AA55AA55'));
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->blackFieldsBitboard);
    }

    public function testInternalBitboardReturnsHex()
    {
        $this->assertEquals('aa55aa55aa55aa55', $this->blackFieldsBitboard->getHexValue());
    }

    public function testInternalBitboardCanBeDrawn()
    {
        $graphicalRepresentation = $this->blackFieldsBitboard->__toString();
        $this->assertEquals('+---+---+---+---+---+---+---+---+
|   | X |   | X |   | X |   | X | 8
+---+---+---+---+---+---+---+---+
| X |   | X |   | X |   | X |   | 7
+---+---+---+---+---+---+---+---+
|   | X |   | X |   | X |   | X | 6
+---+---+---+---+---+---+---+---+
| X |   | X |   | X |   | X |   | 5
+---+---+---+---+---+---+---+---+
|   | X |   | X |   | X |   | X | 4
+---+---+---+---+---+---+---+---+
| X |   | X |   | X |   | X |   | 3
+---+---+---+---+---+---+---+---+
|   | X |   | X |   | X |   | X | 2
+---+---+---+---+---+---+---+---+
| X |   | X |   | X |   | X |   | 1
+---+---+---+---+---+---+---+---+
  a   b   c   d   e   f   g   h' . "\n", $graphicalRepresentation);

    }
}