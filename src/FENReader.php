<?php

namespace piotrbaczek\ChessEngine;

use InvalidArgumentException;
use piotrbaczek\ChessEngine\Common\HexInteger;
use piotrbaczek\ChessEngine\Dictionaries\SideToMove;
use piotrbaczek\ChessEngine\Position\CastlingRights;

final class FENReader
{
    public static function fromFEN(string $fen): Position
    {
        $parts = preg_split('/\s+/', trim($fen));

        if (count($parts) !== 6) {
            throw new InvalidArgumentException(
                'Invalid FEN: expected 6 fields.'
            );
        }

        [
            $board,
            $sideToMove,
            $castlingRightsString,
            $enPassantSquare,
            $halfMoveClock,
            $fullMoveNumber,
        ] = $parts;

        /**
         * AbstractCollection<Bitboard> $bitboards
         */
        $bitboards = new BitboardCollection();
        $bitboards->initializeWithEmptyOffsets();

        $ranks = explode('/', $board);

        if (count($ranks) !== 8) {
            throw new InvalidArgumentException(
                'Invalid FEN: board must contain 8 ranks.'
            );
        }

        foreach ($ranks as $fenRank => $rank) {
            $file = 0;

            for ($i = 0, $length = strlen($rank); $i < $length; ++$i) {
                $character = $rank[$i];

                if (ctype_digit($character)) {
                    $file += (int)$character;
                    continue;
                }

                if (!$bitboards->offsetExists($character)) {
                    throw new InvalidArgumentException(
                        "Invalid FEN: invalid piece '$character'."
                    );
                }

                if ($file >= 8) {
                    throw new InvalidArgumentException(
                        'Invalid FEN: too many squares in rank.'
                    );
                }

                /*
                 * FEN starts at rank 8.
                 *
                 * Bitboard starts at A1 = bit 0.
                 *
                 * Therefore:
                 *
                 * FEN rank 8 -> bitboard rank 7
                 * FEN rank 7 -> bitboard rank 6
                 * ...
                 * FEN rank 1 -> bitboard rank 0
                 */
                $square = ((7 - $fenRank) * 8) + $file;

                $squareBit = new Bitboard(new HexInteger('1'));
                $squareBit = $squareBit->bitwiseLeftShift($square);

                $bitboards->offsetSet($character, $bitboards->offsetGet($character)->bitwiseOr($squareBit));

                ++$file;
            }

            if ($file !== 8) {
                throw new InvalidArgumentException(
                    'Invalid FEN: rank must contain exactly 8 squares.'
                );
            }
        }

        $position = (new Position())
            ->setSideToMove(SideToMove::from($sideToMove))
            ->setCastlingRights(new CastlingRights($castlingRightsString))
            ->setEnPassantSquare($enPassantSquare)
            ->setHalfMoveClock((int)$halfMoveClock)
            ->setFullMoveNumber((int)$fullMoveNumber);

        foreach ($bitboards as $key => $bitboard) {
            $position->setBitboard($key, $bitboard);
        }

        return $position;
    }
}