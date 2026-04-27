<?php 

class Ticket{
    public $event_name;
    private $ticket_info;

    function __construct($event_name, $ticket_info){
        $this->event_name = $event_name;
        $this->ticket_info = $ticket_info;
    }
    
    public function getTicketinfo(){
        return $this->ticket_info;
    }
    
    public function setTicketinfo($ticket_info){
        $this->ticket_info = $ticket_info;
    }
}
?>
