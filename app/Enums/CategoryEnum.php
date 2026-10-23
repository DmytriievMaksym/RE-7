<?php

namespace App\Enums;

enum CategoryEnum:string
{
    case AFV = 'Бронетехніка';
    case AVIATION = 'Авіація';
    case FLEET = 'Флот';
    case DIORAMA = 'Діорами';
    case UKRAINE = 'Україна';
    case USA = 'США';
    case GERMANY = 'Німеччина';
    case USSR = 'СРСР';
    case GREAT_BRITAIN = 'Велика Британія';
    case FRANCE = 'Франція';
    case JAPAN = 'Японія';
    case WWI = 'Перша світова';
    case MIDWAR = 'Міжвоєнний період';
    case WWII = 'Друга світова';
    case COLD_WAR = 'Холодна війна';
    case MODERN = 'Сучасність';
    case FICTION = 'Фентезі';

    public function label():string{
        return match ($this){
            self::AFV => 'Бронетехніка та інша наземна техніка',
            self::AVIATION => 'Авіація',
            self::FLEET => 'Флот та судна',
            self::DIORAMA => 'Діорами',
            self::UKRAINE => 'Українська техніка',
            self::USA => 'Техніка США',
            self::GERMANY => 'Німецька техніка',
            self::USSR => 'Техніка СРСР',
            self::GREAT_BRITAIN => 'Техніка Великої Британії',
            self::FRANCE => 'Французька техніка',
            self::JAPAN => 'Японська техніка',
            self::WWI => 'Перша світова війна',
            self::MIDWAR => 'Міжвоєнний період',
            self::WWII => 'Друга світова війна',
            self::COLD_WAR => 'Холодна війна',
            self::MODERN => 'Сучасність',
            self::FICTION => 'Фентезі, фантастика',
        };
    }
}
