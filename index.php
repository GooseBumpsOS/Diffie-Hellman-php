<?php

define("iterCountOfFermCheck", 1000);

do {

    $simpleNumber = mt_rand(2049, 10_000_000);
    $isSimple = getSimpleNumber($simpleNumber);

} while (!$isSimple);

var_dump($simpleNumber);


function getSimpleNumber($rndNumberSimple)
{
    if ($rndNumberSimple % 2 == 0)
        return false;

    $i = 3;
    while ($i * $i <= $rndNumberSimple){

        if ($rndNumberSimple % $i === 0)
            return false;
        else
            $i += 2;

    }

    return true;

}
