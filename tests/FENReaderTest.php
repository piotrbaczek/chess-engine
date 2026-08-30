<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use piotrbaczek\ChessEngine\Dictionaries\FEN;
use piotrbaczek\ChessEngine\FENReader;
use piotrbaczek\ChessEngine\Position;

class FENReaderTest extends TestCase
{
    public function testReadsBasicFEN(): void
    {
        $position = FENReader::fromFEN(FEN::STARTING->value);

        $this->assertInstanceOf(Position::class, $position);

        foreach ($position->getBitboards() as $key => $bitboard) {
            echo $key . PHP_EOL . $bitboard;
        }
    }
}