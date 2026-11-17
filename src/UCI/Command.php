<?php

namespace piotrbaczek\ChessEngine\UCI;

final readonly class Command
{
    public function __construct(
        public string $name,
        public array $arguments = [],
    ) {
    }
}