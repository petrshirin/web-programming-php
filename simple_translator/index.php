<html>
<head>
<title>Переводчик</title>
</head>
<body>

<?php
    $dict = [
        'en' => [
            'hello' => 'привет',
            'apple' => 'яблоко',
            'red' => 'красный',
            'compilation' => 'компиляция',
            'shit' => 'дерьмо',
            ],
        'ru' => [
            'привет' => 'hello',
            'яблоко' => 'apple',
            'красный' => 'red',
            'компиляция' => 'compilation',
            'shit' => 'дерьмо, дрянь, гадость',
            ]

        ];


    $lang = isset($_POST["lang"]) ? $_POST["lang"] : 'en';
    $phrase = isset($_POST["phrase"]) ? $_POST["phrase"] : 'hello';  
    $form =  "<form class='formData' method='POST' action='index.php'>
        <label for='rows'>Выберите язык</label>
        <select name='lang'>" ;
        
        $form = $form . ($lang == 'en' ? "<option selected='selected'>en</option>" : "<option>en</option>");
        $form = $form . ($lang == 'ru' ? "<option selected='selected'>ru</option>" : "<option>ru</option>");
        $form = $form . "</select>
        <label for='phrase'>Введите фразу</label>
        <input type='text', value='$phrase' name='phrase'>
        <input id='submit' type='submit' value='Перевести'>
        </form>";
    function translate($lang, $phrase, $dict) {
        $result = (isset($dict[$lang][$phrase]) ? $dict[$lang][$phrase] : "Я не знаю такую фразу");
        return $result;
    };

    echo $form;
    echo "Перевод: " . translate($lang, $phrase, $dict);

?>

</body>
