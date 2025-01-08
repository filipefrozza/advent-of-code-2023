<?php
declare(strict_types=1);

final class PuzzleSolver {
    public static function solve(String $document): int {
        $lines = explode(PHP_EOL, $document);

        $cards = array();

        $sum = 0;

        foreach($lines as $k => $line) {
            $cards[$k] = [
                'copies'=> 1,
                'score'=> 0,
                'matches'=>0
            ];
        }

        foreach ($lines as $line) {
            $line = trim(substr($line,4));
            $line = str_replace('  ',' ',$line);
            $parts = explode('|',$line);
            $n_win = explode(' ',trim($parts[0]));
            $n_all = explode(' ',trim($parts[1]));
            $card = intval($n_win[0]);
            $numbers_win = array();
            foreach ($n_win as $idx=>$value) { if ($idx!=0) $numbers_win[$value] = 1; }
            $score = 0;
            $matches = 0;
            foreach ($n_all as $value) {
                if (isset($numbers_win[$value])) {
                    $score = ($score==0) ? 1 : ($score*2); $matches++;
                }
            }
            $sum += $score;

            $cards[$card]['score'] = $score;
            $cards[$card]['matches'] = $matches;
            if ($matches>0) {
                for ($i=1;$i<=$matches;$i++) $cards[$card+$i]['copies'] = $cards[$card+$i]['copies'] + $cards[$card]['copies'];
            }
        }

        return $sum;
    }
}