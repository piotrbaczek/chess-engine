<?php

namespace piotrbaczek\ChessEngine\Position;

use piotrbaczek\ChessEngine\Dictionaries\Pieces;

class CastlingRights
{
    private bool $whiteKingSide;
    private bool $whiteQueenSide;
    private bool $blackKingSide;
    private bool $blackQueenSide;

    public function __construct(string $castlingRights)
    {
        $this->whiteKingSide = str_contains($castlingRights, Pieces::WHITE_KING->value);
        $this->whiteQueenSide = str_contains($castlingRights, Pieces::WHITE_QUEEN->value);
        $this->blackKingSide = str_contains($castlingRights, Pieces::BLACK_KING->value);
        $this->blackQueenSide = str_contains($castlingRights, Pieces::BLACK_QUEEN->value);
    }

    public function isWhiteKingSide(): bool
    {
        return $this->whiteKingSide;
    }

    public function isBlackQueenSide(): bool
    {
        return $this->blackQueenSide;
    }

    public function isBlackKingSide(): bool
    {
        return $this->blackKingSide;
    }

    public function isWhiteQueenSide(): bool
    {
        return $this->whiteQueenSide;
    }
}