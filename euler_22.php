<?php

//Datei einlesen, Anführungszeichen entfernen und dann in ein Array packen
$data = explode(",", file_get_contents(__DIR__ . '/p022_names.txt'));
sort($data);
$sum = 0;
foreach ($data as $key => $name) {
    //Wert des Names brechnen
    for ($i = 1; $i < strlen($name)-1; $i++) {
        $sum += (ord($name[$i]) - 64) * ($key + 1);
    }
}
echo "Total score for all names: " . $sum . PHP_EOL;

