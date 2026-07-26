<?php

namespace piotrbaczek\ChessEngine\Bitboard;

use phpseclib3\Math\BigInteger;
use piotrbaczek\ChessEngine\Common\Integers;
use piotrbaczek\ChessEngine\Dictionaries\Files;
use piotrbaczek\ChessEngine\Dictionaries\Ranks;
use Stringable;

class InternalBitboard implements Stringable
{
    use CreateSquareMask;

    private BigInteger $value;

    public function __construct(BigInteger $value)
    {
        $this->value = $value;
    }

    public function getValue(): BigInteger
    {
        return $this->value;
    }

    public function __toString(): string
    {
        $output = "+---+---+---+---+---+---+---+---+\n";

        for ($rank = Ranks::RANK_8->value; $rank >= Ranks::RANK_1->value; --$rank) {
            for ($file = Files::FILE_A->value; $file <= Files::FILE_H->value; ++$file) {

                $mask = $this->getSquareMask($file, $rank);

                $output .= $this->value->bitwise_and($mask)->compare(Integers::zero()) !== 0
                    ? '| X '
                    : '|   ';
            }

            $output .= '| ' . ($rank + 1) . "\n";
            $output .= "+---+---+---+---+---+---+---+---+\n";
        }

        $output .= "  a   b   c   d   e   f   g   h\n";

        return $output;
    }
}