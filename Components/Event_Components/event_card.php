<?php 
$tickets_array = [];

$ticked_db = fopen("../Server_data/ticked_database.txt","r") or die("Unable to open file!");

while(!feof($ticked_db)){
    $ticked = fgets($ticked_db);
    $ticked_info = explode(";" , $ticked);
    $t10 = new Ticket($ticked_info[0], $ticked_info[1], $ticked_info[2], $ticked_info[3], $ticked_info[4], $ticked_info[5], $ticked_info[6]);
    array_push($tickets_array,$t10);
}


$base_path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

function renderEventItem($Ticket, $base_path) {
    
    $image_url = $base_path . '/../Public/Temp_Event_Img/' . $Ticket->event_name . '.jpeg';
    
    $search_name = strtolower($Ticket->event_name);
    $search_type = strtolower($Ticket->event_type);
    $search_location = strtolower($Ticket->location);
    ?>
    
    <div class="container my-1 event-item" 
        name="<?= htmlspecialchars($search_name) ?>"
        type="<?= htmlspecialchars($search_type) ?>"
        date="<?= $Ticket->date ?>">

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
                    <h6><?= date('D', strtotime($Ticket->date)) ?> · <?= $Ticket->time ?></h6>
                    <h5><?= htmlspecialchars($Ticket->event_type) ?> / <strong><?= htmlspecialchars($Ticket->event_name) ?></strong></h5>
                    <h6>Prishtine · <?= htmlspecialchars($Ticket->location) ?></h6>
                </div>
            </div>

            <div class="d-flex align-items-center mr-3">
                <button id="<?= $Ticket->event_name ?>" class="btn btn-success">Get ticket</button>
            </div>

        </div>
    </div>
    <?php
}
?>