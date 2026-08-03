<?php

namespace piotrbaczek\ChessEngine;

use piotrbaczek\ChessEngine\Bitboard\InternalBitboard;
use piotrbaczek\ChessEngine\Bitboard\Masks;
use piotrbaczek\ChessEngine\Common\HexInteger;

class Bitboard
{
    private static ?Masks $masks = null;
    private InternalBitboard $internalBitBoard;

    public static function masks(): Masks
    {
        if (static::$masks instanceof Masks) {
            return static::$masks;
        }

        static::$masks = new Masks();
        return static::$masks;
    }

    public function __construct(HexInteger $value)
    {
        $this->internalBitBoard = new InternalBitboard($value);
    }

    public function getHexValue(): string
    {
        return $this->internalBitBoard->getHexValue();
    }
}