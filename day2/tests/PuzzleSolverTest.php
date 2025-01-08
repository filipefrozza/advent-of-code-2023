<?php
declare(strict_types=1);
namespace tests;

use PHPUnit\Framework\TestCase;
use PuzzleSolver;

class PuzzleSolverTest extends TestCase {
    public function providePuzzleCasesWithExpectedResult(): array {
        return [
            'case1' => [
                "Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green".PHP_EOL.
                "Game 2: 1 blue, 2 green; 3 green, 4 blue, 1 red; 1 green, 1 blue".PHP_EOL.
                "Game 3: 8 green, 6 blue, 20 red; 5 blue, 4 red, 13 green; 5 green, 1 red".PHP_EOL.
                "Game 4: 1 green, 3 red, 6 blue; 3 green, 6 red; 3 green, 15 blue, 14 red".PHP_EOL.
                "Game 5: 6 red, 1 blue, 3 green; 2 blue, 1 red, 2 green",
                8
            ],
        ];
    }

    /** @dataProvider providePuzzleCasesWithExpectedResult */
    public function testPuzzle_puzzleShouldPassWithExpectedResult(
        String $document,
        int $expectedResult,
    ): void {

        $actualResult = PuzzleSolver::solve($document);

        $this->assertEquals($expectedResult, $actualResult);
    }
}