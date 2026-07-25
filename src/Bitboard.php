<?php

namespace piotrbaczek\ChessEngine;

use phpseclib3\Math\BigInteger;
use piotrbaczek\ChessEngine\BItboard\InternalBitboard;

class Bitboard
{
    private InternalBitboard $whiteKingBitboard;

    public function __construct()
    {
        $this->whiteKingBitboard = new InternalBitboard(new BigInteger('0101010101010101', 16));
    }

    public function getWhiteKingBitboard(): InternalBitboard
    {
        return $this->whiteKingBitboard;
    }
}