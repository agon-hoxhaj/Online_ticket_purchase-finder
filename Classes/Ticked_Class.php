<?php 

class Ticked{
    public $event;
    private $user;

  function set_details($event_name, $event_type, $location, $date, $user) {
    $this->event = new Event($event_name, $event_type, $location, $date,);
    $this->user = $user;
  }
  function set_details($event) {
    $this->event = $event;
    $this->user = $user;
  }
  function get_details() {
    echo "Event: " . $this->event_name . ". Type: " . $this->event_type .".<br>";
  }
}

?>

