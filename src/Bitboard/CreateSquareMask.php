<?php

namespace piotrbaczek\ChessEngine\Bitboard;

use piotrbaczek\ChessEngine\Common\HexInteger;

trait CreateSquareMask
{
    protected function getSquareMask(int $file, int $rank): HexInteger
    {
        return (new HexInteger('1'))
            ->bitwise_leftShift(($rank << 3) + $file);
    }
}