<?php
// カレンダー
$d = isset($_GET['d']) ? $_GET['d'] : date("Y-m-d");

list($year, $month, $date) = explode("-", $d);

if(!checkdate($month, $date, $year)) {
    echo "不正な日付です";
    exit;
}


$prev = date("Y-m-d", mktime(0,0,0, $month -1, 1, $year));
$next = date("Y-m-d", mktime(0,0,0, $month +1, 1, $year));



$fd = date("w", strtotime("$year-$month-1"));
$ld = date("t", strtotime("$year-$month-1"));


$s = '<tr>';

$y = 0;

while ($fd--) {
    $y++;
    $s .= '<td></td>';
}

for ($i = 1; $i <= $ld; $i++) {
    if ($y % 7 == 0) {
        $s .= "</tr><tr>";
        $y = 0;
    }
    switch ($y) {
        case 0:
            $s .= "<td class=\"sun\">$i</td>";
            break;
        case 6:
            $s .= "<td class=\"sat\">$i</td>";
            break;
        default:
            $s .= "<td>$i</td>";

            break;
    }
    $y++;
}

$r = 7 - $y;

while ($r--) {
    $s .= "</tr><tr>";
}

$s .= "</tr></table>";
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <title>PHPの練習</title>
        <style>
            td{
                padding: 5px;
                border: 1px solid #ccc;
                text-align: right
            }
            th.sun, td.sun{
                color:  red;
                font-weight: bold;
            }
            th.sat, td.sat{
                color:  blue;
                font-weight: bold;

            }
            th{
                padding: 5px;
                border: 1px solid #ccc;
                text-align: center;
                background-color: #eee;
            }

        </style>
    </head>
    <body>
        <h1>PHPの練習</h1>
        <table>
            <tr><th><a href="?d=<?php echo $prev ?>">←</th><th colspan="5"><?php echo htmlspecialchars($year); ?>年<?php echo htmlspecialchars($month); ?>月</th><th><a href="?d=<?php echo $next ?>">→</th></tr>

            <tr><th class="sun">日</th><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th class="sat">土</th></tr>
            <?php echo $s; ?>
    </body>
</html>