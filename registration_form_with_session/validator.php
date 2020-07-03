<?php
include 'models.php';


function get_item($array, $key) {
    if (isset($array[$key])) {
        return $array[$key];
    }
    else
        return null;
}

class OrderValidator {


    public function validate($data) {
        $order = new Order();
        $validated_data = [];
        $errors = [];
        if (get_item($data, 'firstName')) {
            preg_match('/(^[А-Я][а-я]*)/', $data['firstName'], $match);
            if ($match[0])
                $order->firstName = $match[0];
            else {
            $errors['firstName'] = "Имя пользователя не заполнено";
            }
        }
        else {
            $errors['firstName'] = "Имя пользователя не заполнено";
        }
        if (get_item($data, 'lastName')) {
            preg_match('/(^[А-Я][а-я]*)/', $data['lastName'], $match);
            if ($match[0])
                $order->lastName = $match[0];
            else {
            $errors['lastName'] = "Фамилия пользователя не заполнена";
            }
        }
        else {
            $errors['lastName'] = "Фамилия пользователя не заполнена";
        }
        if (get_item($data, 'email')) {
            preg_match('/(.+@.+\..+)/i', $data['email'], $match);
            if ($match[0])
                $order->email = $match[0];
            else {
            $errors['email'] = "Email не заполнен";
            }
        }
        else {
            $errors['email'] = "Email не заполнен";
        }
        if (get_item($data, 'phone')) {
            preg_match('/^(\+7[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/', $data['phone'], $match);
            if ($match[0])
                $order->phone = $match[0];
            else {
            $errors['phone'] = "Телефно не заполнен";
            }
        }
        else {
            $errors['phone'] = "Телефно не заполнен";
        }
        if (get_item($data, 'interest')) {
            $order->interest = $data['interest'];
        }
        else {
            $errors['interest'] = "Вы не выбрали интерес";
        }
        if (get_item($data, 'paySystem')) {
            $order->paySystem = $data['paySystem'];
        }
        else {
            $errors['paySystem'] = "Вы не выбрали платежную систему";
        }
        if (get_item($data, 'isSendAdv')) {
            $order->isSendAdv = 1;
        }
        else {
            $order->isSendAdv = 0;
        }


        if (!count($errors)){
            return ['data' => $order];
        }
        else {
            return ['errors' => $errors];
        }
    }
}


?>
