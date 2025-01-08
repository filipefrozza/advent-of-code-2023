<?php
declare(strict_types=1);

final class PuzzleSolver {
    public static function solve(String $document): int {
        $lines = explode(PHP_EOL, $document);
        $numbersMap = [];
        $adjacentNumbers = [];

        foreach ($lines as $lineIndex => $line) {
            $numbersMap[$lineIndex] = [];

            $lineChars = str_split($line);
            $prev = "";
            $prevPos = [];
            foreach ($lineChars as $charIndex => $lineChar) {
                if ($lineChar === '.') {
                    if ($prev !== "") {
                        foreach ($prevPos as $prevPo) {
                            $numbersMap[$lineIndex][$prevPo] = $prev;
                        }
                        $prev = "";
                        $prevPos = [];
                    }
                } else if (is_numeric($lineChar)) {
                    $prev .= $lineChar;
                    $prevPos[] = $charIndex;
                }
            }
            if ($prev !== "") {
                foreach ($prevPos as $prevPo) {
                    $numbersMap[$lineIndex][$prevPo] = $prev;
                }
            }
        }

        foreach ($lines as $lineIndex => $line) {
            $lineChars = str_split($line);
            foreach ($lineChars as $index => $lineChar) {
                if ($lineChar !== '.' && !is_numeric($lineChar)) {
                    $found = false;
                    for ($i = -1; $i <= 1; $i++) {
                        for ($j = -1; $j <= 1; $j++){
                            if (!$found && isset($numbersMap[$lineIndex + $i][$index + $j])) {
                                $adjacentNumbers[] = $numbersMap[$lineIndex + $i][$index + $j];
                                break;
                            }
                        }
                    }
                }
            }
        }

        return array_sum($adjacentNumbers);
    }
}