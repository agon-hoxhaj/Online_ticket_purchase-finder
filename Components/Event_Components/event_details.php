<?php 
function renderEventDetails($tickets_array, $chairs) {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $found = false;
        foreach($tickets_array as $index => $Ticket):
            $base_path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
            $image_url = $base_path . '/../Public/Temp_Event_Img/' . $Ticket->event_name . '.jpeg';
    ?>
        <?php
            if ($Ticket->event_name == $id):
        ?>
                <div style="color:white; background-color:#333; border-radius:10px;">
                    
                    <div style="
                        width: 100%;
                        min-height: 200px;
                        background: url('<?= $image_url ?>');
                        background-size: cover;
                        background-position: center;
                    "></div>
                    <div style = "padding:20px">
                        <h4><?= htmlspecialchars($Ticket->event_name) ?></h4>

                        <div class="d-flex flex-row justify-content-between">
                            <p>Location: <?= htmlspecialchars($Ticket->location) ?></p>
                            <p><?= $Ticket->date ?> at <?= $Ticket->time ?></p>
                        </div>

                        <div class="d-flex flex-row justify-content-between">
                            <div class="d-flex flex-column">
                                <p><?= $Ticket->description ?></p>
                            </div>
                            <div class="d-flex flex-column" style="width: 50%;">
                                <div type="Kinema" class="d-flex flex-row m-3 seet_container">
                                    <?php seet_3($chairs); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php 
                $found = true;
                break;
            endif;
        endforeach; 
        ?>
        <?php if (!$found): ?>
            <h3 style="color:white; padding:20px;">No event found with ID: <?= htmlspecialchars($id) ?></h3>
            <h3 style="color:white; padding:20px;">No event found with ID: <?= $Ticket->event_id ?></h3>
        <?php endif; ?>
    <?php 
    } 
    else {
        echo '<h3 style="color:white; padding:20px;">Click on any "Get ticket" button to see event details here</h3>';
    }
}
?>