<?php

function number_of_divisors($Num) {
    if ($Num == 0) return 0;
    //prüfung auf 1 und Num selbst überspringen
    $count = 0;
    $sqrtNum = sqrt($Num);
    if ($Num % 2 != 0) {
        for ($i = 1; $i <= $sqrtNum; $i+=2) {
            if ($Num % $i == 0) {
                if ($Num/$i == $sqrtNum) {
                    $count++;
                } else {
                    $count += 2;
                }
            }
        }
    } else {
        for ($i = 1; $i <= $sqrtNum; $i++) {
            if ($Num % $i == 0) {
                if ($Num/$i == $sqrtNum) {
                    $count++;
                } else {
                    $count += 2;
                }
            }
        }
    }
    return $count;
}

function getDivisors($to) {
    $divisors = new SplFixedArray($to+1);
    $divisors = array_fill(0, $to+1, 0);

    for($divisor = 1; $divisor <= $to; $divisor++){

        for($i = $divisor; $i <= $to; $i += $divisor){
            $divisors[$i]++;
        }
    }
    return $divisors;
}


$range = 10;
$size = 1000;

$giantArray = getDivisors($size);
$rangeArray = array_slice($giantArray, 1, $range);
$currentMax = max($rangeArray);
$sum = $currentMax;
$durability = array_pop(array_keys($rangeArray, $currentMax))+1;

for ($i = $range+1; $i <= $size; $i++) {
    $current = $giantArray[$i];
    if ($current >= $currentMax) {
        $durability = $range;
        $currentMax = $current;
    }  else {
        $durability--;
    }
    if (0 === $durability) {
        $rangeArray = array_slice($giantArray, $i-$range+1, $range);
        $currentMax = max($rangeArray);
        $durability = array_pop(array_keys($rangeArray, $currentMax))+1;
    }
    $sum += $currentMax;
}

var_dump($sum);
