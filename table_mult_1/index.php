<html>
<head>
<title>Tаблица умножения линейный способ</title>
<link rel="stylesheet" href="/static/table_mult_1/style.css">
</head>
<body>

<table class="table_m" border="1">
<?php
$n = 11;
$m = 11;
for ($i = 0; $i < $n; $i++) {
    echo "<tr class='row row_$i'>";
    if ($i == 0) {
        echo "<td class='col col_$i"."_0'></td>";
        for ($j = 1; $j < $n; $j++) {
            echo "<td class='col col_$i"."_$j'>$j</td>";
        }
        continue;
    }
    for ($j = 0; $j < $n; $j++) {
        if ($j == 0){
            echo "<td class='col col_$i"."_$j' style='background-color: darkolivegreen'>$i</td>";
            continue;
        }
        if ($i == $j)
            echo "<td class='col col_$i"."_$j' style='background-color: chartreuse'>".$i*$j."</td>";
        else
            echo "<td class='col col_$i"."_$j' style='background-color: darkkhaki'>".$i*$j."</td>";
    }
    echo "</tr>";
}
?>

</table>

</body>