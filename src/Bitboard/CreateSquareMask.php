<?php

namespace piotrbaczek\ChessEngine\Bitboard;

use phpseclib3\Math\BigInteger;

trait CreateSquareMask
{
    protected function getSquareMask(int $file, int $rank): BigInteger
    {
        return (new BigInteger($rank))
            ->bitwise_leftShift(3)
            ->add(new BigInteger($file));
    }
}