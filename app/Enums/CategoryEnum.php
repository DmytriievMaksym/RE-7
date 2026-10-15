<?php

namespace App\Enums;

enum CategoryEnum:string
{
    case AFV = 'Бронетехніка';
    case AVIATION = 'Авіація';
    case FLEET = 'Флот';
    case DIORAMA = 'Діорами';

    public function label():string{
        return match ($this){
            self::AFV => 'Бронетехніка та інша наземна техніка',
            self::AVIATION => 'Авіація',
            self::FLEET => 'Флот та судна',
            self::DIORAMA => 'Діорами',
        };
    }
}
