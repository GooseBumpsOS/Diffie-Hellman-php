<?php

//define("iterCountOfFermCheck", 1000);


function getSimpleNumber()
{

    do {

//            $simpleNumber = mt_rand(2049, 10000000);
        $simpleNumber = mt_rand(3, 2049);
        $isSimple = _isSimpleNumber($simpleNumber);

    } while (!$isSimple);

    return $simpleNumber;

}


$a = mt_rand();
$b = mt_rand();
$p = getSimpleNumber();
$g = getPrimRoot($p);

$A = bcpowmod($g, $a, $p);
$B = bcpowmod($g, $b, $p);

$K_A = bcpowmod($B, $a, $p);
$K_B = bcpowmod($A, $b, $p);

echo "Ключ у Алисы: $K_A\nКлюч у Боба: " . $K_B . PHP_EOL;


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

function _isSimpleNumber($rndNumberSimple)//пытался сделать на тесте ферма
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
