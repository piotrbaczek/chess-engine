<?php

namespace piotrbaczek\ChessEngine;

use PHPUnit\Framework\Assert;
use piotrbaczek\ChessEngine\Dictionaries\Pieces;
use piotrbaczek\ChessEngine\Dictionaries\SideToMove;

final class Position
{
    private BitboardCollection $bitboards;
    private SideToMove $sideToMove;
    private string $castlingRights;
    private string $enPassantSquare;
    private int $halfMoveClock;
    private int $fullMoveNumber;

    public function __construct()
    {
        $this->bitboards = new BitboardCollection();
    }

    public function getSideToMove(): SideToMove
    {
        return $this->sideToMove;
    }

    public function setSideToMove(SideToMove $sideToMove): Position
    {
        $this->sideToMove = $sideToMove;
        return $this;
    }

    public function getCastlingRights(): string
    {
        return $this->castlingRights;
    }

    public function setCastlingRights(string $castlingRights): Position
    {
        $this->castlingRights = $castlingRights;
        return $this;
    }

    public function getEnPassantSquare(): string
    {
        return $this->enPassantSquare;
    }

    public function setEnPassantSquare(string $enPassantSquare): Position
    {
        $this->enPassantSquare = $enPassantSquare;
        return $this;
    }

    public function getHalfMoveClock(): int
    {
        return $this->halfMoveClock;
    }

    public function setHalfMoveClock(int $halfMoveClock): Position
    {
        $this->halfMoveClock = $halfMoveClock;
        return $this;
    }

    public function getFullMoveNumber(): int
    {
        return $this->fullMoveNumber;
    }

    public function setFullMoveNumber(int $fullMoveNumber): Position
    {
        $this->fullMoveNumber = $fullMoveNumber;
        return $this;
    }

    public function setBitboard(string $piece, Bitboard $bitboard): self
    {
        Assert::assertInstanceOf(Pieces::class, Pieces::tryFrom($piece));
        $this->bitboards->offsetSet($piece, $bitboard);

        return $this;
    }

    public function getBitboards(): BitboardCollection
    {
        return $this->bitboards;
    }
}