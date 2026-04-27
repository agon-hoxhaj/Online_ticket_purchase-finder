<?php 
$event_array = [];

$event_db = fopen("../Server_data/ticked_database.txt","r") or die("Unable to open file!");

while(!feof($event_db)){
    $event = fgets($event_db);
    $event_info = explode(";" , $event);
    $t10 = new Event($event_info[0], $event_info[1], $event_info[2], $event_info[3], $event_info[4], $event_info[5], $event_info[6], $event_info[7]);
    array_push($event_array,$t10);
}


$base_path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

function renderEventItem($Event, $base_path) {
    
    $image_url = $base_path . '/../Public/Temp_Event_Img/' . $Event->event_name . '.jpeg';
    
    $search_name = strtolower($Event->event_name);
    $search_type = strtolower($Event->event_type);
    $search_location = strtolower($Event->location);
    ?>
    
    <div class="container my-1 event-item" 
        name="<?= htmlspecialchars($search_name) ?>"
        type="<?= htmlspecialchars($search_type) ?>"
        date="<?= $Event->date ?>">

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
                    <h6><?= date('D', strtotime($Event->date)) ?> · <?= $Event->time ?></h6>
                    <h5><?= htmlspecialchars($Event->event_type) ?> / <strong><?= htmlspecialchars($Event->event_name) ?></strong></h5>
                    <h6>Prishtine · <?= htmlspecialchars($Event->location) ?></h6>
                </div>
            </div>

            <div class="d-flex align-items-center mr-3">
                <button id="<?= $Event->event_name ?>" class="btn btn-success get_ticked">Get ticket</button>
            </div>

        </div>
    </div>
    <?php
}
?>