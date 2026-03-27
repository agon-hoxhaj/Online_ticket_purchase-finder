<?php 

require 'Classes/Event_Class.php';
class Ticket {
    public $event;
    private $user;
    public $price;

    function set_details_from_values($event_name, $event_type, $location, $date, $user, $price) {
        $this->event = new Event($event_name, $event_type, $location, $date);
        $this->user = $user;
        $this->price = $price;
    }

    function set_details_from_event($event, $user, $price) {
        $this->event = $event;
        $this->user = $user;
        $this->price = $price;
    }

    function get_details() {
        echo "Event: " . $this->event->event_name . "<br>" .
            "user: " . $this->user .
            "Type: " . $this->event->event_type . "<br>";
    }
}

?>

