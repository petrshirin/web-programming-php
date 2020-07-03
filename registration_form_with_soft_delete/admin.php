<html>
<head>
<title>Панель администратора</title>
</head>
<body>
<?php

if ($_POST) {
    include 'models.php';
    $fd = fopen("form.txt", 'r');
    $orders_list = [];


    while(!feof($fd)) {
        $str = htmlentities(fgets($fd));
        $str_arr = split('|', $str);
        $order = new Order($str_arr[0], $str_arr[1], $str_arr[2], $str_arr[3], $str_arr[4], $str_arr[5], $str_arr[6], $str_arr[7]);
        array_push($orders_list, $order);
    }
    fclose($fd);
    foreach($_POST as $name => $value) {
        $id = int()(split("_", $name))[1];
        $orders_list[$id]->is_deleted = 1;

    }
    $fd = fopen("form.txt", 'w');
    for ($i = 0; i < count($orders_list); i++) {
        $orders_list[$i]->save_in_file($fd);
    }
    fclose($fd);

}

$fd = fopen("form.txt", 'r');
echo "<form class='formData' method='POST' action='admin.php' name='myadmin'>";
$i = 0;
while(!feof($fd))
{
    $str = htmlentities(fgets($fd));
    $str_arr = split('|', $str);

    if (strlen ($str) && $str_arr[count($str_arr) - 1] == 0)
        echo "<input type='checkbox' name='order_$i'> <span>" . $str . "</span><br/>";
    $i++;
}
fclose($fd);

echo "<input id='submit' type='submit' value='Отправить'>
</form>";
?>



</body>