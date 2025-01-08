<?php
declare(strict_types=1);

final class PuzzleSolver {
    public static function solve(String $document): int {
        $document = explode(PHP_EOL, $document);

        $bag = [
            'red' => 12,
            'green' => 13,
            'blue' => 14,
        ];

        $possibles = [];

        foreach ($document as $index => $line) {
            $line = explode(':', $line);
            $gameId = explode(' ',$line[0])[1];
            $line = $line[1];
            $games = explode(';', $line);
            $games_possible = 0;
            foreach ($games as $game) {
                $cubes = explode(', ', trim($game));
                $cubes_possibles = 0;
                foreach ($cubes as $cube) {
                    $cube = explode(' ', $cube);
                    $color = $cube[1];
                    $quantity = $cube[0];
                    if( $bag[$color] >= $quantity ) {
                        $cubes_possibles++;
                    }
                }

                if( $cubes_possibles == count($cubes) ){
                    $games_possible++;
                }
            }

            if( $games_possible == count($games) ){
                $possibles[] = $gameId;
            }
        }

        return array_sum($possibles);
    }
}