<?php

namespace piotrbaczek\ChessEngine\Common;

use phpseclib3\Math\BigInteger;

abstract class Integers
{
    public static function zero(): BigInteger
    {
        return new BigInteger('0', 16);
    }
}