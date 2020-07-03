<html>
<head>
<title>Форма регистрации</title>
</head>
<body>


<?php
    include 'validator.php';
    $order = new Order();
    if ($_POST) {

        $validator = new OrderValidator();
        $result = $validator->validate($_POST);

        if (isset($result['errors'])) {
            foreach($result['errors'] as $name => $value) {
                echo "$value" . PHP_EOL;
            }
        }
        else {
            $order = $result['data'];

            $fd = fopen("form.txt", 'a');
            $order->save_in_file($fd);
            fclose($fd);
            echo "Вы успешно зарегистрированы";
            exit;
        }

    }


    $form =  "<form class='formData' method='POST' action='index.php'>
    <label for='firstName'>Ваше имя</label>
    <input type='text', value='$order->firstName' name='firstName'>
    <label for='lastName'>Ваше фамилиямя</label>
    <input type='text', value='$order->lastName' name='lastName'>
    <label for='email'>Email</label>
    <input type='text', value='$order->email' name='email'>
    <label for='phone'>Телефон</label>
    <input type='text', value='$order->phone' name='phone'>";
    $form = $form . "<select name='interest'>" ;
        
        $form = $form . ($order->interest == 'Бизнес' ? "<option selected='selected'>Бизнес</option>" : "<option>Бизнес</option>");
        $form = $form . ($order->interest == 'Технологии' ? "<option selected='selected'>Технологии</option>" : "<option>Технологии</option>");
        $form = $form . ($order->interest == 'Реклама и Маркетинг' ? "<option selected='selected'>Реклама и Маркетинг</option>" : "<option>Реклама и Маркетинг</option>");
        $form = $form . "</select>";

    $form = $form . "<select name='paySystem'>" ;

        $form = $form . ($order->paySystem == 'WebMoney' ? "<option selected='selected'>WebMoney</option>" : "<option>WebMoney</option>");
        $form = $form . ($order->paySystem == 'Яндекс.Деньги' ? "<option selected='selected'>Яндекс.Деньги</option>" : "<option>Яндекс.Деньги</option>");
        $form = $form . ($order->paySystem == 'PayPal' ? "<option selected='selected'>PayPal</option>" : "<option>PayPal</option>");
        $form = $form . ($order->paySystem == 'Кредитная карта' ? "<option selected='selected'>Кредитная карта</option>" : "<option>Кредитная карта</option>");
        $form = $form . "</select>";

    $form = $form . "<label for='isSendAdv'>Get adv</label>
        <input type='checkbox', value='$order->isSendAdv' name='isSendAdv'>

        <input id='submit' type='submit' value='Отправить'>
        </form>";
    
    echo $form;

?>



</body>