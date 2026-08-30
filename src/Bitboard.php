<?php

namespace piotrbaczek\ChessEngine;

use piotrbaczek\ChessEngine\Bitboard\InternalBitboard;
use piotrbaczek\ChessEngine\Bitboard\Masks;
use piotrbaczek\ChessEngine\Common\HexInteger;
use Stringable;

class Bitboard implements Stringable
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

    public function getValue(): HexInteger
    {
        return $this->internalBitBoard->getValue();
    }

    public function bitwiseLeftShift(int $bytes):self
    {
        $this->internalBitBoard->bitwiseLeftShift($bytes);

        return $this;
    }

    public function bitwiseOr(Bitboard $bitboard): self
    {
        $this->internalBitBoard->bitwiseOr($bitboard);

        return $this;
    }

    public function __toString(): string
    {
        return $this->internalBitBoard->__toString();
    }
}