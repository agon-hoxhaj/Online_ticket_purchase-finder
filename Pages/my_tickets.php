<!DOCTYPE html>
<html>
<head>
    <style>
  body {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
  }
  main { flex: 1; }

  .clipped-div 
  {
    mask-image: url('../Public/Ticket/ticket3.png');
    mask-size: 100% 100%; 
    -webkit-mask-size: 100% 100%;
    mask-repeat: no-repeat;
    -webkit-mask-image: url('../Public/Ticket/ticket3.png');

    
    /* Optional: add text or other elements inside */
    display: flex;
    align-items: center;
    color: white;
    display: flex;
    font-weight: bold;
  }
.clipped-div:hover {
    transform: scale(1.2);
}
.small-text {
  font-size: 0.7em;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script></head>
<body>
<?php 
  require '../Classes/Event_Class.php';
  require '../Classes/Ticket_Class.php';
  session_start(); 


  $cssColors = [
    'red', 'deepskyblue', 'green', 'orange', 'brown',
    'coral', 'navy', 'firebrick','gold',
  ];
  $alpha = 0.5;
?>

<?php include_once __DIR__ . '/../Components/nav.php';?>

<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="../Pages/landing.php">Home</a></li>
            <li class="breadcrumb-item"><a href="../Pages/profile.php">User Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Tickets</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4 d-flex">
        <div class="card mb-4 flex-fill">
          <div class="card-body text-center">
            <br>
            <img src="../Public/kanye.jpg" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px; position: sticky;top: 0;z-index: 1000;">
              <br><br>
            <h5 class="my-3"><?= $_SESSION["username"] ?></h5>
            <div class="d-flex justify-content-center mb-2">
              <a href="../Pages/profile.php"><button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary m-1">My Profile</button></a>
              <a href="../Handlers/logout_handler.php"><button type="button" class="btn btn-outline-primary m-1">Log Out</button></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8 d-flex">
        <?php
            if (empty($_SESSION['user_tickets']) || !is_array($_SESSION['user_tickets'])) { 
                echo '<div class="alert alert-warning text-center p-5 m-3" style="width:100%;height:100px;">No tickets available</div>';
            } else {
        ?>      
        <div class="d-flex flex-row flex-wrap">
            <?php
                usort($_SESSION['user_tickets'], function($a, $b) {
                    return strcmp($a->event_name, $b->event_name);
                });
                foreach($_SESSION['user_tickets'] as $index => $Ticket) { ?>
                  <?php $randomColor = $cssColors[array_rand($cssColors)]; ?>
                      <div class="d-flex flex-column clipped-div" 
                          style="width: 200px; height: 120px; margin: 20px; background-color: <?=$randomColor?>; cursor: pointer;"
                          onclick="window.location.href = '../Pages/events.php?id=<?=$Ticket->event_name?>';">
                        <div class="d-flex flex-row h-100 w-100">

                            <div class="d-flex col-lg-3"
                                style="
                                    
                                    background:url('../Public/Temp_Event_Banner/Nirvana.jpeg');
                                    
                                    background-color: <?= $randomColor ?>;
                                    background-size: cover;
                                    background-position: center;
                                    background-blend-mode: multiply;
                                ">
                            </div>
                            <div style="width: 1px; border-left: 2px dashed <?= $randomColor ?>; margin: 0 3px; filter: brightness(0.6);"></div>
                            <div class="col-lg-8 d-flex flex-column p-2">
                                <?php $info = explode("|",$Ticket->getTicketinfo());?>
                                <h6><?= $info[0]?></h6>
                                <h6 class="small-text"><?= $info[1] ?></h6>
                                <h6 class="small-text"></h6>
                                <h6 style="margin-top: auto; margin-bottom: auto;"><?= $info[2]. " | "?> <?= $info[3] ?>$</h6>
                            </div>
                        </div>
                    </div>
                <?php }}?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include_once __DIR__ . '/../Components/footer.php';?>
</body>
</html>