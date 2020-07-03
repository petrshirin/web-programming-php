<html>
<head>
<title>Tаблица умножения функциональный способ</title>
<link rel="stylesheet" href="/static/table_mult_2/style.css">
</head>
<body>

<?php
function generate_table($n=10, $m=10) {
    # Для генерации 1 столбаца и 1 колонки
    $n += 1;
    $m += 1;
    $str_table = "<table class='table_m' border='1'>";
    for ($i = 0; $i < $n; $i++) {
        $str_table = $str_table . "<tr class='row row_$i'>";
        if ($i == 0) {
            $str_table = $str_table . "<td class='col col_$i"."_0'></td>";
            for ($j = 1; $j < $n; $j++) {
                $str_table = $str_table . "<td class='col col_$i"."_$j'>$j</td>";
            }
            continue;
        }
        for ($j = 0; $j < $n; $j++) {
            if ($j == 0){
                $str_table = $str_table . "<td class='col col_$i"."_$j' style='background-color: darkolivegreen'>$i</td>";
                continue;
            }
            if ($i == $j)
                $str_table = $str_table . "<td class='col col_$i"."_$j' style='background-color: chartreuse'>".$i*$j."</td>";
            else
                $str_table = $str_table . "<td class='col col_$i"."_$j' style='background-color: darkkhaki'>".$i*$j."</td>";
        }
        $str_table = $str_table .  "</tr>";
    }
    $str_table = $str_table . "</table>";
    return $str_table;
}

$rows = isset($_POST["rows"]) ? $_POST["rows"] : 10;
$cols = isset($_POST["cols"]) ? $_POST["cols"] : 10;
echo generate_table($rows, $cols);
echo "<form class='formData' method='POST' action='index.php'>
<label for='rows'>Кол-во строк</label>
<input type='numeric', value='$rows' name='rows'>
<label for='cols'>Кол-во столбцов</label>
<input type='numeric', value='$cols' name='cols'>
<input id='submit' type='submit' value='Перестроить'>
</form>"

?>

</body>
