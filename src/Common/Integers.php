<?php

namespace piotrbaczek\ChessEngine\Common;

use phpseclib3\Math\BigInteger;

final class Integers
{
    private function __construct()
    {

    }

    private function __clone()
    {

    }

    public static function zero(): HexInteger
    {
        return new HexInteger('0');
    }
}