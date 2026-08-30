<?php

namespace piotrbaczek\ChessEngine\Dictionaries;

enum Pieces: string
{
    case WHITE_KING = 'K';
    case WHITE_QUEEN = 'Q';
    case WHITE_ROOK = 'R';
    case WHITE_KNIGHT = 'N';
    case WHITE_BISHOP = 'B';
    case WHITE_PAWN = 'P';
    case BLACK_KING = 'k';
    case BLACK_QUEEN = 'q';
    case BLACK_ROOK = 'r';
    case BLACK_KNIGHT = 'n';
    case BLACK_BISHOP = 'b';
    case BLACK_PAWN = 'p';
}
