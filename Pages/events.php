<?php 
session_start();
require '../Classes/Ticket_Class.php';

$var = "Ky o file jem. MOS E PREK. une misoji(une) jom une(misoji)";
echo $var. "<br>";

$t1 = new Ticket('Nirvana', 'Koncert', 'Te Ukshin Hoti', '2026-01-05', '7:00PM', 'Prishtina');
$t2 = new Ticket('Metallica', 'Koncert', 'Pallati i Rinisë', '2026-01-12', '8:30PM', 'Prishtina');
$t3 = new Ticket('Shpella e Përrallave', 'Teater', 'Teatri Kombëtar', '2026-01-19', '6:00PM', 'Prishtina');

// Shkurt 2026
$t4 = new Ticket('The Weeknd', 'Koncert', 'Sport Hall', '2026-02-02', '9:00PM', 'Prishtina');
$t5 = new Ticket('In Flames', 'Festival', 'Parku i Qytetit', '2026-02-09', '4:00PM', 'Prishtina');
$t6 = new Ticket('Romeo & Juliet', 'Teater', 'Oda Teatri', '2026-02-16', '7:30PM', 'Prishtina');

// Mars 2026
$t7 = new Ticket('Imagine Dragons', 'Koncert', 'Stadiumi Fadil Vokrri', '2026-03-02', '8:00PM', 'Prishtina');
$t8 = new Ticket('Comedy Night', 'Stand Up', 'Salla e Kuqe', '2026-03-09', '9:00PM', 'Prishtina');
$t9 = new Ticket('Jazz Festival', 'Festival', 'Amfiteatri', '2026-03-16', '7:00PM', 'Prishtina');

// Prill 2026 (Java aktuale)
$t10 = new Ticket('Nirvana Tribute', 'Koncert', 'Te Ukshin Hoti', '2026-04-06', '5:40PM', 'Prishtina');
$t11 = new Ticket('DJ Snake', 'Party', 'Zone Club', '2026-04-07', '11:00PM', 'Prishtina');
$t12 = new Ticket('Art Exhibition', 'Ekspozitë', 'Galeria Qendrore', '2026-04-08', '6:00PM', 'Prishtina');
$t13 = new Ticket('Film Screening', 'Film', 'Kino ABC', '2026-04-09', '8:00PM', 'Prishtina');
$t14 = new Ticket('Rock Night', 'Koncert', 'Rock Bar', '2026-04-10', '10:00PM', 'Prishtina');
$t15 = new Ticket('Poetry Slam', 'Poetry', 'Biblioteka Kombëtare', '2026-04-11', '7:00PM', 'Prishtina');
$t16 = new Ticket('Charity Gala', 'Gala', 'Hotel Grand', '2026-04-12', '8:30PM', 'Prishtina');

// Maj 2026
$t17 = new Ticket('Coldplay', 'Koncert', 'Stadiumi Qytetit', '2026-05-04', '7:30PM', 'Prishtina');
$t18 = new Ticket('Ballet Show', 'Balet', 'Teatri Kombëtar', '2026-05-11', '7:00PM', 'Prishtina');
$t19 = new Ticket('Tech Conference', 'Konferencë', 'Emerald Hotel', '2026-05-18', '9:00AM', 'Prishtina');
$t20 = new Ticket('Food Festival', 'Festival', 'Sheshi Nëna Terezë', '2026-05-25', '12:00PM', 'Prishtina');

// Vendosi në array
$tickets_array = [$t1, $t2, $t3, $t4, $t5, $t6, $t7, $t8, $t9, $t10, $t11, $t12, $t13, $t14, $t15, $t16, $t17, $t18, $t19, $t20];
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
                    background: linear-gradient(to right, rgba(0,0,0,0.2), rgba(0,0,0,1)),
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