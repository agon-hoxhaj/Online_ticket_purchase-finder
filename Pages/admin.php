<?php
require_once __DIR__ . "/../Components/auth.php";

if (!isset($_SESSION["user-id"]) || $_SESSION["user-type"] !== "admin") {
    header("Location: ../Pages/landing.php");
    exit();
}

require_once __DIR__ . "/../Classes/Admin_User.php";

$page = $_GET['page'] ?? 'users';
$users = ($page === 'users') ? Admin::get_all_users() : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Panel</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>

  <?php include_once __DIR__ . '/../Components/nav.php'; ?>

  <div style="display:flex; min-height: calc(100vh - 56px);">
    <?php include_once __DIR__ . '/../Components/side_bar_admin.php'; ?>
    <div class="main-content">
      <?php
        if ($page === 'users') {
          include_once __DIR__ . '/../Components/user_admin.php';
        } elseif ($page === 'events') {
          include_once __DIR__ . '/../Components/event_admin.php';
        } else {
          echo '<h2>Welcome to Admin Panel</h2>';
        }
      ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>