<?php

namespace piotrbaczek\ChessEngine\Dictionaries;

enum Files: int implements CountsEnumCases
{
    case FILE_A = 0;
    case FILE_B = 1;
    case FILE_C = 2;
    case FILE_D = 3;
    case FILE_E = 4;
    case FILE_F = 5;
    case FILE_G = 6;
    case FILE_H = 7;

    public static function getCasesCount(): int
    {
        return count(Files::cases());
    }
}
