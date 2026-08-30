<?php

namespace Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use piotrbaczek\ChessEngine\Bitboard;
use piotrbaczek\ChessEngine\Dictionaries\FEN;
use piotrbaczek\ChessEngine\Dictionaries\Pieces;
use piotrbaczek\ChessEngine\Dictionaries\SideToMove;
use piotrbaczek\ChessEngine\FENReader;
use piotrbaczek\ChessEngine\Position;

class FENReaderTest extends TestCase
{
    public function testReadsBasicFEN(): void
    {
        $position = FENReader::fromFEN(FEN::STARTING->value);

        $this->assertInstanceOf(Position::class, $position);

        $this->assertEquals(SideToMove::WHITE, $position->getSideToMove());

        $castlingRights = $position->getCastlingRights();
        $this->assertInstanceOf(Position\CastlingRights::class, $castlingRights);
        $this->assertTrue($castlingRights->isWhiteKingSide());
        $this->assertTrue($castlingRights->isWhiteQueenSide());
        $this->assertTrue($castlingRights->isBlackKingSide());
        $this->assertTrue($castlingRights->isBlackQueenSide());

        $this->assertEquals('-', $position->getEnPassantSquare());
        $this->assertEquals(0, $position->getHalfMoveClock());
        $this->assertEquals(1, $position->getFullMoveNumber());

        foreach (Pieces::cases() as $piece) {
            $this->assertTrue($position->getBitboards()->offsetExists($piece->value));

            /** @var Bitboard $pieceBitboard */
            $pieceBitboard = $position->getBitboards()->offsetGet($piece->value);

            switch ($piece) {
                case Pieces::WHITE_KING:
                    $this->assertEquals('10', $pieceBitboard->getHexValue());
                    break;
                case Pieces::WHITE_QUEEN:
                    $this->assertEquals('08', $pieceBitboard->getHexValue());
                    break;
                case Pieces::WHITE_BISHOP:
                    $this->assertEquals('24', $pieceBitboard->getHexValue());
                    break;
                case Pieces::WHITE_KNIGHT:
                    $this->assertEquals('42', $pieceBitboard->getHexValue());
                    break;
                case Pieces::WHITE_ROOK:
                    $this->assertEquals('0081', $pieceBitboard->getHexValue());
                    break;
                case Pieces::WHITE_PAWN:
                    $this->assertEquals('00ff00', $pieceBitboard->getHexValue());
                    break;
                case Pieces::BLACK_KING:
                    $this->assertEquals('1000000000000000', $pieceBitboard->getHexValue());
                    break;
                case Pieces::BLACK_QUEEN:
                    $this->assertEquals('0800000000000000', $pieceBitboard->getHexValue());
                    break;
                case Pieces::BLACK_BISHOP:
                    $this->assertEquals('2400000000000000', $pieceBitboard->getHexValue());
                    break;
                case Pieces::BLACK_KNIGHT:
                    $this->assertEquals('4200000000000000', $pieceBitboard->getHexValue());
                    break;
                case Pieces::BLACK_ROOK:
                    $this->assertEquals('008100000000000000', $pieceBitboard->getHexValue());
                    break;
                case Pieces::BLACK_PAWN:
                    $this->assertEquals('00ff000000000000', $pieceBitboard->getHexValue());
                    break;
            }
        }
    }

    public static function provideInvalidTestData(): array
    {
        return [
            ['rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBN w KQkq - 0 1'],
            ['rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNRR w KQkq - 0 1'],
            ['rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBXR w KQkq - 0 1'],
            ['rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0'],
            ['rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1 extra'],
        ];
    }

    /**
     * @param string $invalidFen
     * @return void
     */
    #[DataProvider('provideInvalidTestData')]
    public function testInvalidDataFailsWithException(string $invalidFen)
    {
        $this->expectException(InvalidArgumentException::class);
        $position = FENReader::fromFEN($invalidFen);
    }
}