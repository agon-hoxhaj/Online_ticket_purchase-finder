<?php 

class Event {
    public $event_name;
    public $event_type;
    public $description;
    public $location;
    public $date;
    public $time;
    public $price;

    function __construct($event_name, $event_type, $description,$location, $date, $time, $price) {
        $this->event_name = $event_name;
        $this->event_type = $event_type;
        $this->description = $description;
        $this->location = $location;
        $this->date = $date;
        $this->time = $time;
        $this->price = $price;
    }
}
?>

