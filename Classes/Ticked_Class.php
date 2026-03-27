<?php 

class Ticked{
    public $event_name;
    public $event_type;

    public $location;
    public $date;

    private $user;

  function set_details($event_name, $event_type, $location, $date, $user) {
    $this->event_name = $event_name;
    $this->event_type = $event_type;
    $this->location = $location;
    $this->date = $date;
    $this->user = $user;
  }

  function get_details() {
    echo "Event: " . $this->event_name . ". Type: " . $this->event_type .".<br>";
  }
}

$t1 = new Ticked();
$t1->set_details('nirvanaaa', 'Koncert',"te ukshin hoti","one day", 'une');
$t1->get_details();



?>

