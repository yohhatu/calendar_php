<?php

// カレンダー
$d = date("Y-m-d");

list($year, $month, $date) = explode("-", $d);

$fd = date("w", strtotime("$year-$month-1"));
$ld = date("t");

var_dump($fd);
var_dump($ld);

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <title>PHPの練習</title>
    </head>
    <body>
        <h1>PHPの練習</h1>
        <p>こんにちは。</p>
    </body>
</html>