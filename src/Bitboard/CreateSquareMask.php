<?php

namespace piotrbaczek\ChessEngine\Bitboard;

use phpseclib3\Math\BigInteger;

trait CreateSquareMask
{
    protected function getSquareMask(int $file, int $rank): BigInteger
    {
        return (new BigInteger('1', 16))
            ->bitwise_leftShift(($rank << 3) + $file);
    }
}