<?php 
$var = "Hello World";
echo $var;

class Ticked{
    public $event_name;
    public $event_type;
    public $user;

  function set_details($event_name, $event_type, $user) {
    $this->event_name = $event_name;
    $this->event_type = $event_type;
    $this->user = $user;
  }

  function get_details() {
    echo "Event: " . $this->event_name . ". Color: " . $this->color .".<br>";
  }
}

$t1 = new Fruit();
$t1->set_details('nirvanaaa', 'Koncert', 'une');
$t1->get_details();



?>

