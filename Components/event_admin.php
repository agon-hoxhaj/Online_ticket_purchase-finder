<div class="card shadow">
  <div class="card-header bg-dark text-white">
    <h4 class="mb-0">Manage Events</h4>
  </div>
  <div class="card-body">
    <h5>Add New Event</h5>
    <form method="POST" action="">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="event_name">Event Name</label>
          <input type="text" class="form-control" id="event_name" name="event_name" required>
        </div>
        <div class="form-group col-md-6">
          <label for="event_type">Event Type</label>
          <select class="form-control" id="event_type" name="event_type" required>
            <option value="Koncert">Koncert</option>
            <option value="Festival">Festival</option>
            <option value="Teater">Teater</option>
            <option value="Stand Up">Stand Up</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="location">Location</label>
          <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <div class="form-group col-md-6">
          <label for="city">City</label>
          <input type="text" class="form-control" id="city" name="city" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="date">Date</label>
          <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group col-md-4">
          <label for="time">Time</label>
          <input type="time" class="form-control" id="time" name="time" required>
        </div>
        <div class="form-group col-md-4">
          <label for="price">Price (€)</label>
          <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Add Event</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $event_name = trim($_POST['event_name']);
      $event_type = trim($_POST['event_type']);
      $description = trim($_POST['description']);
      $location = trim($_POST['location']);
      $date = trim($_POST['date']);
      $time = trim($_POST['time']);
      $price = trim($_POST['price']);
      $city = trim($_POST['city']);

      $line = "\n$event_name;$event_type;$description;$location;$date;$time;$price;$city" . PHP_EOL;
      file_put_contents(__DIR__ . '/../Server_data/ticked_database.txt', $line, FILE_APPEND);
      echo '<div class="alert alert-success mt-3">Event added successfully!</div>';
    }
    ?>

    <hr>
    <h5>Existing Events</h5>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Type</th>
          <th>Location</th>
          <th>Date</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $file = __DIR__ . '/../Server_data/ticked_database.txt';
        if (file_exists($file)) {
          $lines = file($file);
          foreach ($lines as $line) {
            $parts = explode(';', trim($line));
            if (count($parts) >= 8) {
              echo '<tr>';
              echo '<td>' . htmlspecialchars($parts[0]) . '</td>';
              echo '<td>' . htmlspecialchars($parts[1]) . '</td>';
              echo '<td>' . htmlspecialchars($parts[3]) . '</td>';
              echo '<td>' . htmlspecialchars($parts[4]) . '</td>';
              echo '<td>' . htmlspecialchars($parts[6]) . '€</td>';
              echo '</tr>';
            }
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</div>