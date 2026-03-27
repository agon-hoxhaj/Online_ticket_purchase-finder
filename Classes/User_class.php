<?php

require "Ticket_Class.php";

class User{

    private $id;
    private $name;
    private $email; 
    private $passwordHash; 
    private $user_type; 
    private array $tickets = [];
    
    
    public function __construct($id, $name, $email, $password, $user_type){
        $this->id = $id; 
        $this->name = $name;
        $this->email =$email;
        $this->passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $this->user_type = $user_type;
    }

    public function add_ticket(Ticket $ticket){
        $this->tickets[] = $ticket;
    }

    public function get_tickets(){
        return $this->tickets;
    }
}


?>