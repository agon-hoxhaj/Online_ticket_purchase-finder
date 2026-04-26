<?php 

class Ticket {
    public $event;
    public $ticket_info;

    function __construct($event, $ticket_info){
        $this->event = $event;
        $this->ticket_info =$ticket_info;
    }
}
?>
