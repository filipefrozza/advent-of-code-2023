<?php /** @noinspection PhpMultipleClassDeclarationsInspection */
declare(strict_types=1);
namespace tests;

use PHPUnit\Framework\TestCase;
use PuzzleSolver;

class PuzzleSolverTest extends TestCase {
    public function providePuzzleCasesWithExpectedResult(): array {
        return [
            'case1' => [
                "467..114..".PHP_EOL.
                "...*......".PHP_EOL.
                "..35..633.".PHP_EOL.
                "......#...".PHP_EOL.
                "617*......".PHP_EOL.
                ".....+.58.".PHP_EOL.
                "..592.....".PHP_EOL.
                "......755.".PHP_EOL.
                "...$.*....".PHP_EOL.
                ".664.598..",
                4361
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