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

        for ($rank = Ranks::RANK_8->value; $rank >= Ranks::RANK_1->value; --$rank) {
            for ($file = Files::FILE_A->value; $file <= Files::FILE_H->value; ++$file) {

                $mask = $this->makeSquare($file, $rank);

                $output .= $this->value->bitwise_and($mask)->compare(new BigInteger(0, 16)) !== 0
                    ? '| X '
                    : '|   ';
            }

            $output .= '| ' . ($rank + 1) . "\n";
            $output .= "+---+---+---+---+---+---+---+---+\n";
        }

        $output .= "  a   b   c   d   e   f   g   h\n";

        return $output;
    }

    private function makeSquare($f, $r): BigInteger
    {
        return (new BigInteger($r))
            ->bitwise_leftShift(3)
            ->add(new BigInteger($f));
    }
}