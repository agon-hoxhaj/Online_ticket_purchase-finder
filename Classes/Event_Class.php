<?php 

class Event {
    public $event_name;
    public $event_type;
    public $description;
    public $location;
    public $date;
    public $time;
    public $price;
    public $user;

    function __construct($event_name, $event_type, $description,$location, $date, $time, $price, $user) {
        $this->event_name = $event_name;
        $this->event_type = $event_type;
        $this->description = $description;
        $this->location = $location;
        $this->date = $date;
        $this->time = $time;
        $this->price = $price;
        $this->user = $user;
    }

    function set_details_from_values($user, $price) {
        $this->user = $user;
        $this->price = $price;
    }

    function set_details_from_event($user, $price) {
        $this->user = $user;
        $this->price = $price;
    }

    function get_details() {
        return [
          "user" => $this->user,
          "price" => $this->price
        ];
    }
}

?>

