<?php 

require 'Event_class.php';

class Ticket {
    public $event;
    private $user;
    public $price;

    function __construct($event_name, $event_type, $location, $date, $time, $user) {
        $this->event = new Event($event_name, $event_type, $location, $date, $time);
        $this->user = $user;
    }

    function set_details_from_values($event_name, $event_type, $location, $date, $time, $user, $price) {
        $this->event = new Event($event_name, $event_type, $location, $date, $time);
        $this->user = $user;
        $this->price = $price;
    }

    function set_details_from_event($event, $user, $price) {
        $this->event = $event;
        $this->user = $user;
        $this->price = $price;
    }

    function get_details() {
        return [
          "event" => $this->event,
          "user" => $this->user,
          "price" => $this->price
        ];
    }
}

?>

