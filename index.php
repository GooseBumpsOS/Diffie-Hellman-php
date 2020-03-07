<?php

//define("iterCountOfFermCheck", 1000);
do {

//    $simpleNumber = mt_rand(2049, 10000000);
    $simpleNumber = mt_rand(3, 2049);
    $isSimple = isSimpleNumber($simpleNumber);

} while (!$isSimple);

echo getPrimRoot(101);

function _nod($a, $b)
{

    if ($b == 0)
        return $a;
    else
        return _nod($b, $a % $b);

}

function _phi($n)//функция эйлера
{

    $resArr = [];
    for ($i = 1; $i < $n; $i++) {

        if (_nod($i, $n) == 1)
            array_push($resArr, $i);
    }

//    var_dump($resArr);

    return count($resArr);

}

function getPrimRoot($m)//они есть, теорема гауса
{
    $flag = 0;
    $g = 0;
    for (; ;) {
        $g++;
        $phi = _phi($m);

        if (bcpowmod($g, $phi, $m))
            for ($i = 1; $i < $phi; $i++)
                if (bcpowmod($g, $i, $m) == 1)
                    continue 2;
                else
                    $flag = 1;

        if ($flag)
            return $g;

    }

}

function isSimpleNumber($rndNumberSimple)//пытался сделать на тесте ферма
{
    if ($rndNumberSimple % 2 == 0)
        return false;

    $i = 3;
    while ($i * $i <= $rndNumberSimple) {

        if ($rndNumberSimple % $i === 0)
            return false;
        else
            $i += 2;

    }

    return true;

}
