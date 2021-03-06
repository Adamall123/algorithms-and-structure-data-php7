<?php 

$totalVertices = 5; 
$graph = []; 
for ($i = 0; $i < $totalVertices; $i++) {
    for ($j = 0; $j < $totalVertices; $j++){
        $graph[$i][$j] = $i == $j ? 0 : PHP_INT_MAX;
    }
}


$graph[0][1] = $graph[1][0] = 10;
$graph[2][1] = $graph[1][2] = 5;
$graph[0][3] = $graph[3][0] = 5;
$graph[3][1] = $graph[1][3] = 5;
$graph[4][1] = $graph[1][4] = 10;
$graph[3][4] = $graph[4][3] = 20;

function floydWarshall(array $graph): array {

    $dist = [];
    $dist = $graph; 
    $size = count($dist);

    for ($k = 0; $k < $size; $k++)
        for($i = 0; $i < $size; $i++)
            for ($j = 0; $j < $size; $j++)
                $dist[$i][$j] = min($dist[$i][$j], 
            $dist[$i][$k] + $dist[$k][$j]);

            return $dist; 
}

$distance = floydWarshall($graph); 

echo "Najmniejsza odległość pomiędzy A i E to " . $distance[0][4] . "\n";
echo "Najmniejsza odległość pomiędzy D i C to " . $distance[3][2] . "\n";