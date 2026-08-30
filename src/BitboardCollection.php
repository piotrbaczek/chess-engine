<?php

namespace piotrbaczek\ChessEngine;

use PHPUnit\Framework\Assert;
use piotrbaczek\ChessEngine\Common\HexInteger;
use piotrbaczek\ChessEngine\Dictionaries\Pieces;
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

    public function offsetSet($offset, $value): void
    {
        Assert::assertInstanceOf(Pieces::class, Pieces::from($offset));
        parent::offsetSet($offset, $value);
    }

    public function initializeWithEmptyOffsets(): void
    {
        foreach (Pieces::cases() as $case) {
            $this->offsetSet($case->value, new Bitboard(new HexInteger('0')));
        }
    }
}