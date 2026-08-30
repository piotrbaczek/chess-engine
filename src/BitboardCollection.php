<?php

namespace piotrbaczek\ChessEngine;

use Ramsey\Collection\AbstractCollection;

/**
 * @extends AbstractCollection<Bitboard>
 */
class BitboardCollection extends AbstractCollection
{

    public function getType(): string
    {
        return Bitboard::class;
    }
}