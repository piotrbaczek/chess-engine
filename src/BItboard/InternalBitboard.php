<?php

namespace piotrbaczek\ChessEngine\BItboard;

use phpseclib3\Math\BigInteger;

class InternalBitboard
{
    private BigInteger $value;

    public function __construct(BigInteger $value)
    {
        $this->value = $value;
    }

    public function getValue(): BigInteger
    {
        return $this->value;
    }

    public function pretty()
    {

    }
}