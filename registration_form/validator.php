<?php
include 'models.php';


function get_item($array, $key) {
    if (isset($array[$key])) {
        return $array[$key];
    }
    else
        return 0;
}

class OrderValidator {


    public function validate($data) {
        $order = new Order();
        $validated_data = [];
        $errors = [];
        if (get_item($data, 'firstName')) {
            $order->firstName = $data['firstName'];
        }
        else {
            $errors['firstName'] = "Имя пользователя не заполнено";
        }
        if (get_item($data, 'lastName')) {
            $order->lastName = $data['lastName'];
        }
        else {
            $errors['lastName'] = "Фамилия пользователя не заполнена";
        }
        if (get_item($data, 'email')) {
            $order->email = $data['email'];
        }
        else {
            $errors['email'] = "Email не заполнен";
        }
        if (get_item($data, 'phone')) {
            $order->phone = $data['phone'];
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
