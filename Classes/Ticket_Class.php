<?php 

class Ticket{
    public $event_name;
    public $ticket_info;

    function __construct($event_name, $ticket_info){
        $this->event_name = $event_name;
        $this->ticket_info = $ticket_info;
    }
}
?>
