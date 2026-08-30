<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use piotrbaczek\ChessEngine\Engine;
use piotrbaczek\ChessEngine\FENReader;
use piotrbaczek\ChessEngine\Search;
use piotrbaczek\ChessEngine\UCI\CommandParser;

class EngineTest extends TestCase
{
    public function testEngineWorks()
    {
        $this->markTestSkipped('skipped because in progress');
        //$result = fputs(STDIN, 'uci');
        //var_dump($result);

        //$something = fgets(STDIN);

        //var_dump($something);die();

        $engine = new Engine(new CommandParser(), new FENReader(), new Search());
        $engine->run();
    }
}