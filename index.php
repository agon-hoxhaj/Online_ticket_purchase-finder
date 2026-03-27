<?php 

require 'Classes/Ticked_Class.php';

$var = "Hello World";
echo $var. "<br>";

$test_ticked = new Ticked();
$test_ticked->set_details_from_values('nirvanaaa', 'Koncert','te ukshin hoti','one day', 'une');
$test_ticked->get_details();
?>

