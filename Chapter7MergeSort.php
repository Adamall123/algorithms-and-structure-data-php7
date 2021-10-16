<?php 

/*
    MERGE SORT 

    Wykorzystuje metodę dziel i zwyciężaj do rozwiązywania problemu sortowania elementów.
    Pierwszą rzeczą to podział zbioru problemu na częśći na tyle niewielkie, aby dało się
    łatwo je rozwiązać. Druga polega na takim połączeniu cząstkowych wyników, aby otrzymać
    wynik końcowy. W osiągnięciu celu tutaj pomoże rekurencja. 
*/

function mergeSort(array $arr): array {
    $len = count($arr); 
    $mid = (int) $len/2; 
    if($len == 1) 
        return $arr; 
    $left = mergeSort(array_slice($arr, 0, $mid));
    $right = mergeSort(array_slice($arr, $mid));

    return merge($left, $right);
}

function merge(array $left, array $right): array {
    $combined = [];
    $countLeft = count($left);
    $countRight = count($right);
    $leftIndex = $rightIndex = 0;

    while($leftIndex < $countLeft && $rightIndex < $countRight) {
        if($left[$leftIndex] > $right[$rightIndex]) {
            $combined[] = $right[$rightIndex];
            $rightIndex++;
        } else {
            $combined[] = $left[$leftIndex];
            $leftIndex++;
        }
    }
    while($leftIndex < $countLeft) {
        $combined[] = $left[$leftIndex];
        $leftIndex++;
    }
    while($rightIndex < $countRight) {
        $combined[] = $right[$rightIndex];
        $rightIndex++;
    }
    return $combined;
}

$arr = [20, 45, 93, 67, 10, 97, 52, 88, 33, 92];
$arr = mergeSort($arr);
echo implode(",",$arr);

//https://www.youtube.com/watch?v=iJyUFvvdfUg