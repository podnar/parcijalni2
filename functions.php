<?php

function brojacZnakova($word)
{
    $word = strtolower($word); #prebacuje string u mala slova
    $word = str_split($word); #podijeli riječ (string) na slova, tj. u niz

    $suglasnik = 0;
    $samoglasnik = 0;

    foreach ($word as $character) {
        switch ($character) {
            case "a":
            case "e":
            case "i":
            case "o":
            case "u":
                $samoglasnik++;
                break;

            default:
                $suglasnik++;
                break;
        }
    }
    return array($samoglasnik, $suglasnik);
}
