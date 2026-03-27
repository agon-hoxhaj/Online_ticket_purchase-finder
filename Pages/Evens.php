<?php 
require 'Classes/Ticked_Class.php';

$var = "Ky o file jem. MOS E PREK";
echo $var. "<br>";

$test_ticked = new Ticked();
$test_ticked->set_details_from_values('nirvanaaa', 'Koncert','te ukshin hoti','one day', 'une');
$test_ticked->get_details();
?>
