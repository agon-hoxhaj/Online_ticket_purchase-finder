<?php require_once __DIR__ . "/auth.php"; ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"><strong style="color:coral;">Ticket</strong>Surge </a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="../Pages/landing.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Pages/events.php">Events</a>
      </li>
    </ul>
    <a href="../Pages/profile.php" style="padding-right:10px; color:white;"><?php echo $_SESSION['username'] ?? ''; ?></a>
    <a href="../Pages/my_tickets.php" style="padding-right:10px; color:white;">🎟️</a>
    <?php if (isset($_SESSION['user-type']) && $_SESSION['user-type'] === 'admin'): ?>
      <a href="../Pages/admin.php" style="padding-right:10px; color:white;">Admin</a>
    <?php endif; ?>
  </div>
</nav>