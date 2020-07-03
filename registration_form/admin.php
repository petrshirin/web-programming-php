<html>
<head>
<title>Панель администратора</title>
</head>
<body>
<?php

if ($_POST) {
    $fd = fopen("form_admin.txt", 'w');
    foreach($_POST as $name => $value) {
        print($name . " Добавлена");
        fwrite($fd, $name . PHP_EOL);
    }
    
    fclose($fd);
    exit;
}

$fd = fopen("form.txt", 'r');
echo "<form class='formData' method='POST' action='admin.php' name='myadmin'>";
$i = 0;
while(!feof($fd))
{
    $str = htmlentities(fgets($fd));
    if (strlen ($str))
        echo "<input type='checkbox' name='order_$i'> <span>" . $str . "</span><br/>";
    $i++;
}
fclose($fd);

echo "<input id='submit' type='submit' value='Отправить'>
</form>";
?>



</body>