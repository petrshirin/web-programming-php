<?php


class Order{

    private $tableName = 'orders';
    public $id = NULL;
    public $firstName = '';
    public $lastName = '';
    public $email = '';
    public $phone = '';
    public $interest = '';
    public $paySystem = '';
    public $isSendAdv = FALSE;
    public $is_deleted = FALSE;



    public function __construct($_firstName='', $_lastName='', $_email='', $_phone='', $_interest='', $_paySystem='', $_isSendAdv=FALSE) {
        $this->firstName = $_firstName;
        $this->lastName = $_lastName;
        $this->email = $_email;
        $this->phone = $_phone;
        $this->interest = $_interest;
        $this->paySystem = $_paySystem;
        $this->isSendAdv = $_isSendAdv;
    }

    public function get($db, $id) {
        $result = $db->query("SELECT * FROM $this->$tableName WHERE id=$id");
        while( $row = $result->fetch_assoc() ){ 
            $this->firstName = $row['firstName'];
            $this->lastName = $row['lastName'];
            $this->email = $row['email'];
            $this->phone = $row['phone'];
            $this->interest = $row['interest'];
            $this->paySystem = $row['paySystem'];
            $this->isSendAdv = $row['isSendAdv'];
        }
    }

    public function save() {
        $result = $db->query("INSERT INTO $this->$tableName (firstName, lastname, email, phone, interest, paySystem, isSendAdv) VALUES (
            $this->firstName,
            $this->lastName,
            $this->email, 
            $this->phone,
            $this->interest,
            $this->paySystem,
            $this->isSendAdv
            $this->
        )");
        $result->close();
        return TRUE;
    }

    public function save_in_file() {
        $fd = fopen("form.txt", 'a');
        fwrite($fd, "$this->firstName|$this->lastName|$this->email|$this->phone|$this->interest|$this->paySystem|$this->isSendAdv" . PHP_EOL);
        fclose($fd);
    }


}


?>
