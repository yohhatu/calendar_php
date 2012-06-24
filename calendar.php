<?php

// カレンダー
$d = date("Y-m-d");

list($year, $month, $date) = explode("-", $d);

$fd = date("w", strtotime("$year-$month-1"));
$ld = date("t");


$s = '<table><tr>';

$y = 0;

while ($fd--) {
    $y++;
    $s .= '<td></td>';
}

for ($i = 0; $i <= $ld; $i++) {
    if( $y % 7 == 0 ) {
        $s .= "</tr><tr>";
        $y = 0;
    }
    $s .= "<td>$i</td>";
    $y ++;
}

echo $s;

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