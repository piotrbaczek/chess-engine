<?php

namespace piotrbaczek\ChessEngine;

use piotrbaczek\ChessEngine\UCI\Command;
use piotrbaczek\ChessEngine\UCI\CommandParser;

class Engine
{
    private bool $running = true;

    public function __construct(
        private readonly CommandParser $commandParser,
        private readonly FENReader     $FENReader,
        private readonly Search        $search)
    {
    }

    public function run(): void
    {
        while ($this->running && ($line = fgets(STDIN)) !== false) {
            $line = trim($line);

            if ($line === '') {
                continue;
            }

            $command = $this->commandParser->parse($line);

            $this->handleCommand($command);
        }
    }

    private function handleCommand(Command $command): void
    {
        match ($command->name) {
            'uci' => $this->uci(),
            'isready' => $this->isReady(),
            'ucinewgame' => $this->newGame(),
            'position' => $this->position($command->arguments),
            'go' => $this->go($command->arguments),
            'stop' => $this->stop(),
            'quit' => $this->quit(),
            default => null,
        };
    }

    private function uci(): void
    {
        $this->send('id name PBChess 0.1');
        $this->send('id author Piotr Bączek');

        $this->send(
            'option name Hash type spin default 64 min 1 max 1024'
        );

        $this->send('uciok');
    }

    private function isReady(): void
    {
        $this->send('readyok');
    }

    private function newGame(): void
    {
        $this->search->newGame();
    }

    private function position(array $arguments): void
    {
        $position = $this->FENReader::fromFEN(join('', $arguments));
        $this->search->setPosition($position);
    }

    private function go(array $arguments): void
    {
        // We'll implement this below.
    }

    private function stop(): void
    {
        $this->search->stop();
    }

    private function quit(): void
    {
        $this->search->stop();
        $this->running = false;
    }

    private function send(string $message): void
    {
        fwrite(STDOUT, $message . PHP_EOL);
        fflush(STDOUT);
    }
}