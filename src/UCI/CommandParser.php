<?php

namespace piotrbaczek\ChessEngine\UCI;

final class CommandParser
{
    public function parse(string $line): Command
    {
        $parts = preg_split('/\s+/', trim($line));

        if ($parts === false || $parts === []) {
            return new Command('');
        }

        return new Command(
            array_shift($parts),
            $parts,
        );
    }
}