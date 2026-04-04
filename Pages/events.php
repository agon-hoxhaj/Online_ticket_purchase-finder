<?php 
session_start();
require '../Classes/Ticket_Class.php';

$var = "Ky o file jem. MOS E PREK. une misoji(une) jom une(misoji)";
echo $var. "<br>";

$t1 = new Ticket('Nirvana', 'Koncert', 'Te Ukshin Hoti', '2026-01-05', '7:00PM', 'Prishtina');
$t2 = new Ticket('Metallica', 'Koncert', 'Pallati i Rinisë', '2026-01-12', '8:30PM', 'Prishtina');
$t3 = new Ticket('Shpella e Përrallave', 'Teater', 'Teatri Kombëtar', '2026-01-19', '6:00PM', 'Prishtina');
$t4 = new Ticket('The Weeknd', 'Koncert', 'Sport Hall', '2026-02-02', '9:00PM', 'Prishtina');
$t5 = new Ticket('In Flames', 'Festival', 'Parku i Qytetit', '2026-02-09', '4:00PM', 'Prishtina');
$t6 = new Ticket('Romeo & Juliet', 'Teater', 'Oda Teatri', '2026-02-16', '7:30PM', 'Prishtina');
$t7 = new Ticket('Pathogen', 'Koncert', 'Te Ukshin Ukshin Hoti', '2026-01-05', '7:00PM', 'Prishtina');
$t8 = new Ticket('Comedy Night', 'Stand Up', 'Salla e Kuqe', '2026-03-09', '9:00PM', 'Prishtina');
$t9 = new Ticket('Jazz Festival', 'Festival', 'Amfiteatri', '2026-03-16', '7:00PM', 'Prishtina');

$tickets_array = [$t1, $t2, $t3, $t4, $t5, $t6, $t7, $t8, $t9];
for ($i = 0; $i < count($tickets_array); $i++) {
    $Event = $tickets_array[$i];

    $base_path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    $image_urll = $base_path . '/../Public/Temp_Event_Img/';

    $image_url = $image_urll . $Event->event->event_name . '.jpeg';

    echo '
        <div class="container mb-2">
            <div class="card ticket text-white d-flex flex-row" style="background-color: black;">

                <div style="
                    width: 40%;
                    min-height: 100px;
                    background: linear-gradient(to right, rgba(0,0,0,0.1), rgba(0,0,0,1)),
                                url(\'' . $image_url . '\');
                    background-size: cover;
                    background-position: center;
                "></div>

                <div class="ps-3">
                    <div class="card-body">
                        <h6>' . date('D', strtotime($Event->event->date)) . ' · ' . $Event->event->time . '</h6>
                        <h5>' . $Event->event->event_type .' / <strong>' . $Event->event->event_name .'</strong></h5>
                        <h6>Prishtine · ' . $Event->event->location .'</h6>
                    </div>
                </div>
                
                <div class="d-flex align-items-center ms-auto">
                    <button class="btn btn-success">Get ticket</button>
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