<?php

class Solder {
    protected $name;

    public function __construct($_name) {
        $this->name = $_name;
    }

    public function attack() {
        echo 'Attack!! </br>';
    }
}

class LannisterSoldier extends Solder {
    private $money;

    public function __construct($_name, $_money) {
        parent::__construct($_name);
        $this->money = $_money;
    }

    public function attack() {
        echo 'Lannister always pays his debts </br>';
    }

    public function my_money() {
        echo "I have $this->money coins </br>";
    }

}

class TargaryenSoldier  extends Solder {
    private $fire;

    public function __construct($_name, $_fire) {
        parent::__construct($_name);
        $this->fire = $_fire;
    }

    public function attack() {
        echo 'Fire and blond </br>';
    }

    public function do_fire() {
        echo "I spew the $this->fire flame </br>";
    }

}

class Spawn {

    public function __construct() {
        echo 'spawn created </br>';
    }

    public function create_object($type, $name, $option=null) {
        if ($type == 'Lannister') {
            return new LannisterSoldier($name, $option);
        }

        else if ($type == 'Targaryen') {
            return new TargaryenSoldier($name, $option);
        }
        else {
            return new Solder($name);
        }
    }
}





?>
