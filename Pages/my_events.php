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
</style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script></head>
<body>
<?php include_once __DIR__ . '/../Components/nav.php';?>
<div class="d-flex flex-row justify"> 
    <?php foreach($_SESSION['user_tickets'] as $Ticket) { ?>
        <div class="d-flex flex-column">

            <img src="../Public/Ticket/ticket_outline.png" alt="Description">
            <?=$Ticket;?>
        </div>
    <?php } ?>
</div>

<?php include_once __DIR__ . '/../Components/footer.php';?>
</body>
</html>