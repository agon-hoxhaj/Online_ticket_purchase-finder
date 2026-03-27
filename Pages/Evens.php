<?php 

require '../Classes/Ticket_Class.php';

$var = "Ky o file jem. MOS E PREK. une misoji(une) jom une(misoji)";
echo $var. "<br>";
$t = new Ticket('nirvanaaa', 'Koncert','te ukshin hoti','one day', 'une');
$t_array = [];

for ($x = 0; $x <= 10; $x++) {
    $t = new Ticket('nirvanaaa', 'Koncert','te ukshin hoti','one day', 'une');
    $t_array[] = $t;
    echo $t_array[$x]->event->event_name;
}


?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<title>Page Title</title>
</head>
<body>



</body>
</html>