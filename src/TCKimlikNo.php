<?php

namespace Bakcay\NetGsm;


class NetGsm
{

    public static function validate(){
        return true;
    }


    private static function toUppercaseTr(string $name): string
    {
        return mb_strtoupper(
            str_replace(
                ['ç', 'ğ', 'ı', 'ö', 'ş', 'ü', 'i'],
                ['Ç', 'Ğ', 'I', 'Ö', 'Ş', 'Ü', 'İ'],
                $name
            )
        );
    }

    public static function verify($tcKimlikNo): bool {

        return true;
    }


}
