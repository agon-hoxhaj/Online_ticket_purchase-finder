<?php 
function renderEventDetails($tickets_array, $chairs) {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $found = false;
        foreach($tickets_array as $index => $Ticket):
            $base_path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
            $image_url = $base_path . '/../Public/Temp_Event_Img/' . $Ticket->event_name . '.jpeg';
            $banner_url = $base_path . '/../Public/Temp_Event_Banner/' . $Ticket->event_name . '.jpeg';
    ?>
        <?php
            if ($Ticket->event_name == $id):
        ?>
                <div style="color:white; background-color:#333; border-radius:10px;">
                    
                    <div style="
                        width: 100%;
                        min-height: 200px;
                        background: url('<?= $banner_url ?>');
                        background-size: cover;
                        background-position: center;
                    "></div>
                    <div style = "padding:20px">
                        

                        <div class="d-flex flex-row justify-content-between">
                            <h4><?= htmlspecialchars($Ticket->event_name) ?></h4>
                        </div>

                        <div class="d-flex flex-row my-3">
                            <div class="d-flex flex-column pr-3 my-3" style="width:50%;">
                                <p><?= $Ticket->description ?></p>
                                <h6>
                                <?= htmlspecialchars($Ticket->location) ?> · <?= $Ticket->date ?> · <?= $Ticket->time ?>
                                </h6>

                                <h2 id="price_label" class="display-5 fw-bold mt-3"></h2>
                            </div>
                            <div class="seet_container flex-column">
                                <?php seet_type($Ticket->event_type,$id,$Ticket->price) ?>
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