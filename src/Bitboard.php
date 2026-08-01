<?php

namespace piotrbaczek\ChessEngine;

use piotrbaczek\ChessEngine\Bitboard\Masks;

class Bitboard
{
    public Masks $masks;

    public function __construct()
    {
        $this->masks = new Masks();
    }
}