<?php 

class Event{
    public $event_name;
    public $event_type;
    public $desription;
    public $location;
    public $date;

  function set_details($event_name, $event_type, $location, $date,) {
    $this->event_name = $event_name;
    $this->event_type = $event_type;
    $this->location = $location;
    $this->date = $date;
  }

  function get_details() {
    echo "Event: " . $this->event_name . ". Type: " . $this->event_type .".<br>";
  }
}
?>
