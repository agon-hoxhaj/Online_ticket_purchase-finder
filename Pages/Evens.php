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
    echo 
    '<div class="container mt-5">
        <div class="card ticket bg-dark text-white p-3">
            
            <div class="card-header d-flex justify-content-between">
            <h4>Nirvana</h4>
            <span class="badge bg-warning text-dark">VIP</span>
            </div>

            <div class="card-body">
            <p><strong>Type:</strong> Concert</p>
            <p><strong>Location:</strong> Te Ukshin</p>
            <p><strong>Date:</strong> 27 March 2026</p>
            </div>

            <div class="card-footer d-flex justify-content-between">
            <span>Seat: A12</span>
            <button class="btn btn-success">Buy</button>
            </div>

        </div>
    </div>';
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