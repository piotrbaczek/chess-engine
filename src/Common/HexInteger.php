<?php

namespace piotrbaczek\ChessEngine\Common;

use phpseclib4\Math\BigInteger as PHPSecLibBigInteger;

class HexInteger extends PHPSecLibBigInteger
{
    public function __construct($x = 0)
    {
        parent::__construct($x, 16);
    }
}