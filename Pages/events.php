<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<title>Page Title</title>
<style>
    .no-results {
        text-align: center;
        padding: 40px;
        color: #666;
        font-size: 18px;
        background: black;
        border-radius: 8px;
        margin: 20px;
    }
    .item {
        transition: all 0.3s ease;
    }
    .hidden-item {
        display: none !important;
    }
</style>
</head>
<body>

<?php
session_start();
include_once __DIR__ . '/../Components/nav.php';
require '../Classes/Ticket_Class.php';

$t1 = new Ticket('Nirvana', 'Koncert', 'Te Ukshin Hoti', '2026-01-05', '7:00PM', 'Prishtina');
$t2 = new Ticket('Metallica', 'Koncert', 'Pallati i Rinisë', '2026-01-12', '8:30PM', 'Prishtina');
$t3 = new Ticket('Shpella e Përrallave', 'Teater', 'Teatri Kombëtar', '2026-01-19', '6:00PM', 'Prishtina');
$t4 = new Ticket('The Weeknd', 'Koncert', 'Sport Hall', '2026-02-02', '9:00PM', 'Prishtina');
$t5 = new Ticket('In Flames', 'Festival', 'Parku i Qytetit', '2026-02-09', '4:00PM', 'Prishtina');
$t6 = new Ticket('Romeo & Juliet', 'Teater', 'Oda Teatri', '2026-02-16', '7:30PM', 'Prishtina');
$t7 = new Ticket('Pathogen', 'Koncert', 'Te Ukshin Hoti', '2026-01-05', '7:00PM', 'Prishtina');
$t8 = new Ticket('Comedy Night', 'Stand Up', 'Salla e Kuqe', '2026-03-09', '9:00PM', 'Prishtina');
$t9 = new Ticket('Jazz Festival', 'Festival', 'Amfiteatri', '2026-03-16', '7:00PM', 'Prishtina');

$tickets_array = [$t1, $t2, $t3, $t4, $t5, $t6, $t7, $t8, $t9];
$base_path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
?>
<div class="d-flex flex-row">
    <div class="d-flex flex-column" style="width: 49%;background-color: rgb(22, 22, 22)">
        <div c style="width: 100%;padding: 20px;padding-top: 20px;"> 

            <div class="container my-3">
                <div class="form-inline my-2 my-lg-0">
                    <input id="searchInput" class="d-flex flex-grow-1 form-control mr-sm-2 bg-dark text-white border-secondary" type="search" placeholder="Search by event name, type, or location..." aria-label="Search">
                    
                    <select id="typeFilter" class="d-flex ml-2 mr-2 bg-dark form-control text-white border-secondary">
                        <option value="all">All Types</option>
                        <option value="koncert">Concert</option>
                        <option value="teater">Theater</option>
                        <option value="festival">Festival</option>
                        <option value="stand up">Stand Up</option>
                    </select>

                    <select id="timeFilter" class="d-flex ml-2 mr-2 bg-dark form-control text-white border-secondary">
                        <option value="all">Any Time</option>
                        <option value="month">This Month</option>
                        <option value="year">This Year</option>
                    </select>
                    <button id="searchButton" class="btn btn-outline-light m-2 my-sm-0" type="button">Search</button>
                </div>
            </div>

            <div id="itemsContainer">
            <?php foreach($tickets_array as $index => $Event): ?>
            <?php 
            $image_url = $base_path . '/../Public/Temp_Event_Img/' . $Event->event->event_name . '.jpeg';
            // Prepare searchable data
            $search_name = strtolower($Event->event->event_name);
            $search_type = strtolower($Event->event->event_type);
            $search_location = strtolower($Event->event->location);
            ?>
            
                <div class="container my-1 event-item" 
                    name="<?= htmlspecialchars($search_name) ?>"
                    type="<?= htmlspecialchars($search_type) ?>"
                    date="<?= $Event->event->date ?>">

                    <div class="card text-white d-flex flex-row" style="background-color: black;">

                        <div style="
                            width: 40%;
                            min-height: 100px;
                            background: linear-gradient(to right, rgba(0,0,0,0.1), rgba(0,0,0,1)), url('<?= $image_url ?>');
                            background-size: cover;
                            background-position: center;
                        "></div>

                        <div class="d-flex flex-grow-1 ps-3">
                            <div class="card-body">
                                <h6><?= date('D', strtotime($Event->event->date)) ?> · <?= $Event->event->time ?></h6>
                                <h5><?= htmlspecialchars($Event->event->event_type) ?> / <strong><?= htmlspecialchars($Event->event->event_name) ?></strong></h5>
                                <h6>Prishtine · <?= htmlspecialchars($Event->event->location) ?></h6>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mr-3">
                            <button class="btn btn-success">Get ticket</button>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
            </div>

        </div>
    </div>
    <div class="d-flex flex-column" style="width: 49%;background-color: rgb(22, 22, 22)">
    <?php
    $chairs = [
        [1 => "occupied", 2 => "occupied", 3 => "occupied", 4 => "occupied"],
        [5 => "occupied", 6 => "occupied", 7 => "occupied", 8 => "occupied"],
        [9 => "occupied", 10 => "occupied", 11 => "free", 12 => "free"],
        [13 => "free", 14 => "occupied", 15 => "free", 16 => "occupied"],
        [17 => "occupied", 18 => "free", 19 => "occupied", 20 => "free"]
    ];

    ?>
    <?php
    function seet_1($chairs)
    {
    echo '<div type="Teater/Koncert" class="d-flex flex-row m-3 seet_container col-auto">';
        foreach ($chairs as $row) {
        echo '<div class="d-flex flex-column">';

        $i = 1;
        $max_r = 30;
        $rot_amount = ($max_r * 2) / count($chairs);
        
        foreach ($row as $id => $status) {
            $rotation = -($max_r - $i * $rot_amount);
            $margin_left = round(($max_r - abs($rotation)) * 0.2);
            $isfree = ($status == "free") ? "btn-outline-primary" : "btn-danger";
            
            echo '<button 
                    class="chair btn my-1 ' . $isfree . '"
                    data-bs-toggle="button"
                    autocomplete="off"
                    style="
                        transform: rotate(' . $rotation . 'deg);
                        margin-left: ' . $margin_left . 'px;
                    ">'. $id .'
                    </button>';
            $i++;
        }
        echo '</div>';}
    echo '</div>';
    };

    function seet_2($chairs)
    {
    echo '<div type="Teater/Koncert" class="d-flex flex-column m-3 seet_container">';
    $i = 0;
    $max_r = 20;
    $rot_amount = ($max_r * 2) / count($chairs);
    foreach ($chairs as $row) {
        $rotation = -($max_r - $i * $rot_amount);
        $margin_left = round(($max_r - abs($rotation)));
        echo '<div class="d-flex-inline flex-row" 
                style="
                    transform-origin: left center;
                    transform: rotate(' . $rotation . 'deg);
                    margin-left: ' . $margin_left . 'px;
                    width: fit-content;
                ">';      
        foreach ($row as $id => $status) {
            $isfree = ($status == "free") ? "btn-outline-primary" : "btn-danger";
            echo '<button class="chair btn my-1 ' . $isfree . '" data-bs-toggle="button" autocomplete="off">'. $id .'</button>';
        }
        $i++;
        echo '</div>';}
    echo '</div>';
    }


    function seet_3($chairs)
    {
    echo '<div type="Kinema" class="d-flex flex-row m-3 seet_container">';
    $j = 1;
    foreach ($chairs as $row) {
        $m_right = 0;
        if ($j % 2 == 0){$m_right = 20;}
        echo '<div class="d-flex flex-column" style=" margin-right: ' . $m_right . 'px;">';
        foreach ($row as $id => $status) {
            $isfree = ($status == "free") ? "btn-outline-primary" : "btn-danger";
            echo '<button class="chair btn m-1 ' . $isfree . '" data-bs-toggle="button"autocomplete="off">'. $id .'</button>';
        }
        echo '</div>';
        $j ++;
        }
    echo '</div>';
    }

    seet_1($chairs);
    seet_2($chairs);
    seet_3($chairs);

    ?>  
    </div>
</div>

<?php include_once __DIR__ . '/../Components/footer.php'; ?>

</body>
</html>


<script>
    const searchInput = document.getElementById('searchInput');
    const typeFilter = document.getElementById('typeFilter');
    const timeFilter = document.getElementById('timeFilter');
    const searchButton = document.getElementById('searchButton');
    const itemsContainer = document.getElementById('itemsContainer');
    
    const allItems = Array.from(document.querySelectorAll('.event-item'));

    function doSearch() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        const selectedType = typeFilter.value;
        const selectedTime = timeFilter.value;
        
        allItems.forEach(item => {

            const name = item.getAttribute('name');
            const type = item.getAttribute('type');
            const date = item.getAttribute('date');
            
            var matchesSearch = true;
            if (searchTerm !== '') {
                matchesSearch = name.includes(searchTerm);
            }
            
            var SameType = true;
            if (selectedType !== 'all') {
                SameType = type === selectedType;
            }
            
            var SameTime = true;
            if (selectedTime === 'month') {
                SameTime = new Date(date).getMonth() === new Date().getMonth();
            } else if (selectedTime === 'year') {
                SameTime = new Date(date).getFullYear() === new Date().getFullYear();
            } 
            
            if (matchesSearch && SameType && SameTime) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    }
    
    searchInput.addEventListener('input', doSearch);
    searchButton.addEventListener('click', doSearch);
    typeFilter.addEventListener('change', doSearch);
    timeFilter.addEventListener('change', doSearch);
</script>
<style>
  .chair {
    padding: 0px;
    width: 25px;
    height: 35px;
    margin: 1px;
  }
  .seet_container{
    width: 50%;
    aspect-ratio: 1 / 1;

    margin: 3px;

    display: flex;
    justify-content: center;
    align-items: center; 
    
    background-color: rgb(16, 28, 118);

  }

</style>