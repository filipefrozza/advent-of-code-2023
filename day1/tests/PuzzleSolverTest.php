<?php
declare(strict_types=1);
namespace tests;

use PHPUnit\Framework\TestCase;
use PuzzleSolver;

class PuzzleSolverTest extends TestCase {
    public function providePuzzleCasesWithExpectedResult(): array {
        return [
            'case1' => [
                "1abc2".PHP_EOL.
                "pqr3stu8vwx".PHP_EOL.
                "a1b2c3d4e5f".PHP_EOL.
                "treb7uchet",
                "142",
            ],

            'case2' => [
                "5dsf4fsdf3".PHP_EOL.
                "xvv1as2asd4sad5".PHP_EOL.
                "77dasd74asd4vcx1".PHP_EOL.
                "8976545634",
                "223",
            ],

            'case3' => [
                "çkjdfsg33".PHP_EOL.
                "77hgfd77dfg77".PHP_EOL.
                "897446sdf864asd98f4".PHP_EOL.
                "s354dsf83",
                "227",
            ],
        ];
    }

    /** @dataProvider providePuzzleCasesWithExpectedResult */
    public function testPuzzle_puzzleShouldPassWithExpectedResult(
        String $document,
        String $expectedResult,
    ): void {
        /*$document = "1abc2".PHP_EOL.
                    "pqr3stu8vwx".PHP_EOL.
                    "a1b2c3d4e5f".PHP_EOL.
                    "treb7uchet";
        $expectedResult = "142";*/

        $actualResult = PuzzleSolver::solve($document);

        $this->assertEquals($expectedResult, $actualResult);
    }
}