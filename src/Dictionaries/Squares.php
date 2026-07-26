<?php

namespace piotrbaczek\ChessEngine\Dictionaries;

enum Squares: int implements CountsEnumCases
{
    case A1 = 0;
    case B1 = 1;
    case C1 = 2;
    case D1 = 3;
    case E1 = 4;
    case F1 = 5;
    case G1 = 6;
    case H1 = 7;

    case A2 = 8;
    case B2 = 9;
    case C2 = 10;
    case D2 = 11;
    case E2 = 12;
    case F2 = 13;
    case G2 = 14;
    case H2 = 15;

    case A3 = 16;
    case B3 = 17;
    case C3 = 18;
    case D3 = 19;
    case E3 = 20;
    case F3 = 21;
    case G3 = 22;
    case H3 = 23;

    case A4 = 24;
    case B4 = 25;
    case C4 = 26;
    case D4 = 27;
    case E4 = 28;
    case F4 = 29;
    case G4 = 30;
    case H4 = 31;

    case A5 = 32;
    case B5 = 33;
    case C5 = 34;
    case D5 = 35;
    case E5 = 36;
    case F5 = 37;
    case G5 = 38;
    case H5 = 39;

    case A6 = 40;
    case B6 = 41;
    case C6 = 42;
    case D6 = 43;
    case E6 = 44;
    case F6 = 45;
    case G6 = 46;
    case H6 = 47;

    case A7 = 48;
    case B7 = 49;
    case C7 = 50;
    case D7 = 51;
    case E7 = 52;
    case F7 = 53;
    case G7 = 54;
    case H7 = 55;

    case A8 = 56;
    case B8 = 57;
    case C8 = 58;
    case D8 = 59;
    case E8 = 60;
    case F8 = 61;
    case G8 = 62;
    case H8 = 63;

    case NONE = 64;

    public const ZERO = self::A1;

    public static function getCasesCount(): int
    {
        return 64;
    }
}
