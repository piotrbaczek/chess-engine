<?php

namespace piotrbaczek\ChessEngine\Bitboard;

use phpseclib3\Math\BigInteger;
use piotrbaczek\ChessEngine\Dictionaries\Files;
use piotrbaczek\ChessEngine\Dictionaries\Ranks;

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

    public function pretty(): string
    {
        $output = "+---+---+---+---+---+---+---+---+\n";

        for ($rank = Ranks::RANK_8->value; $rank >= 0; --$rank) {
            for ($file = Files::FILE_A->value; $file <= Files::FILE_H->value; ++$file) {

                // $mask = makeSquare($file, $rank);

//                $output .= bitAnd($bitboard, $mask)->compare(new Number('0')) !== 0
//                    ? '| X '
//                    : '|   ';
            }

            $output .= '| ' . ($rank + 1) . "\n";
            $output .= "+---+---+---+---+---+---+---+---+\n";
        }

        $output .= "  a   b   c   d   e   f   g   h\n";

        return $output;
    }

    private function make_square($f, $r) {
        // return Square(($r << 3) + $f);
    }
}