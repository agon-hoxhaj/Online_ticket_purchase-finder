
<?php 

function renderEventDetails($tickets_array, $chairs) {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $found = false;
        foreach($tickets_array as $index => $Event):
            $base_path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
            $image_url = $base_path . '/../Public/Temp_Event_Img/' . $Event->event_name . '.jpeg';
            $banner_url = $base_path . '/../Public/Temp_Event_Banner/' . $Event->event_name . '.jpeg';
    ?>
        <?php
            if ($Event->event_name == $id):
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
                            <h4><?= htmlspecialchars($Event->event_name) ?></h4>
                        </div>

                        <div class="d-flex flex-row my-3">
                            <div class="d-flex flex-column pr-3 my-3" style="width:80%;">
                                <p><?= $Event->description ?></p>
                                <h6>
                                <?= htmlspecialchars($Event->location) ?> · <?= $Event->date ?> · <?= $Event->time ?>
                                </h6>


                            </div>
                            <div class="seet_container flex-column">
                                <?php seet_type($Event,$id)?>
                            </div>
                        </div>
                        <div class="dropdown-divider my-3"></div>
                        <form action="" method="POST">
                            <div class="d-flex flex-row justify-content-between">
                                
                                <input type="hidden" name="event_name" value="<?= $id?>">
                                <input type="hidden" name="ticket_info" id="ticket_info" value="">

                                <h3 id="price_label" class="display-5 fw-bold my-3"><i class="text-secondary">ST · $PRICE <?= $Event->price ?> </i></h3>
                                <button type="submit" class="btn btn-success my-auto">Buy</button>
                            </div>
                        </form>
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
            <h3 style="color:white; padding:20px;">No event found with ID: <?= $Event->event_id ?></h3>
        <?php endif; ?>
    <?php 
    } 
    // else {
    //     echo '<h3 style="color:white; padding:20px;">Click any event</h3>';
    // }
}
?>
<?php
if (isset($_SESSION['user_tickets']) && !is_array($_SESSION['user_tickets'])) {
    $_SESSION['user_tickets'] = [];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_name = $_POST['event_name'] ?? '';
    $ticket_info = $_POST['ticket_info'] ?? '';

    if (empty($event_name) || empty($ticket_info)) {
        echo "<div id='c' style='position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);background:red;color:white;padding:20px;border-radius:10px;z-index:9999;font-size:24px;text-align:center;transition:opacity 0.5s;'>NO SEAT SELECTED</div>
        <script>setTimeout(()=>{let c=document.getElementById('c');if(c)c.style.opacity=0},1500);setTimeout(()=>document.getElementById('c')?.remove(),3000)</script>";
        return;
    }
    echo "<div id='c' style='position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);background:#4CAF50;color:white;padding:20px;border-radius:10px;z-index:9999;font-size:24px;text-align:center;transition:opacity 0.5s;'>Bought {$ticket_info}</div>
    <script>setTimeout(()=>{let c=document.getElementById('c');if(c)c.style.opacity=0},1500);setTimeout(()=>document.getElementById('c')?.remove(),3000)</script>";
    
    if (!isset($_SESSION['user_tickets'])) {
        $_SESSION['user_tickets'] = [];
    }
    
    array_push($_SESSION['user_tickets'], new Ticket($event_name, $ticket_info));
}

?>