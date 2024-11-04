<?php
declare(strict_types=1);

final class PuzzleSolver {
    public static function solve(String $document): int {
        $document = explode(PHP_EOL, $document);
        $lineNumbers = [];
        foreach ($document as $index => $line) {
            $numbers = preg_replace('/[^0-9]/', '', $line);
            $firstNumber = substr($numbers, 0, 1);
            $lastNumber = substr($numbers, strlen($numbers) - 1, 1);
            $lineNumbers[$index] = intval($firstNumber . $lastNumber);
        }
        return array_sum($lineNumbers);
    }
}