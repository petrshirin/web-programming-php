<?php
include 'solders.php';

$spawn = new Spawn();

$first_solder = $spawn->create_object('Simple', 'solder1');
$second_solder = $spawn->create_object('Lannister', 'solder2', 500);
$third_solder = $spawn->create_object('Targaryen', 'solder3', 200);

$first_solder->attack();
$second_solder->attack();
$third_solder->attack();

$second_solder->my_money();
$third_solder->do_fire();

?>
