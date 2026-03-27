<?php 

class Event{
    public $event_name;
    public $event_type;
    public $description;
    public $location;
    public $date;

    function __construct($event_name, $event_type, $location, $date) {
    $this->event_name = $event_name;
    $this->event_type = $event_type;
    $this->location = $location;
    $this->date = $date;
  }
  function set_details($event_name, $event_type, $location, $date) {
    $this->event_name = $event_name;
    $this->event_type = $event_type;
    $this->location = $location;
    $this->date = $date;
  }

  function get_details() {
    return [
      "event_name" => $this->event_name,
      "event_type" => $this->event_type,
      "location" => $this->location,
      "date" => $this->date
    ];
  }
}
?>
