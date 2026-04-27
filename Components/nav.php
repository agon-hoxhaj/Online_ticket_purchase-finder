
<?php
require_once __DIR__ . "/auth.php";

?>
<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body style="background-color : black" >

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Navbar</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="../Pages/landing.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item" id="events_link">
        <a class="nav-link" href="../Pages/events.php">Events</a>
      </li>
    </ul>
    <a href="../Pages/profile.php" style="padding-right: 10px; color: white;"><?php echo $_SESSION['username'];?></a>
    <a href="../Pages/my_tickets.php" style="padding-right: 10px; color: white;">🎟️</a>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2 bg-dark text-white border-secondary" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>
</body>
</html>