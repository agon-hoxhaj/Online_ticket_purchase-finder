<?php
require "Ticket_Class.php";
class User{

    private $id;
    private $username;
    private $email; 
    private $passwordHash; 
    private $user_type; 
    private array $tickets = [];
    
    
    function __construct($id, $username, $email, $password, $user_type){
        $this->id = $id; 
        $this->username = $username;
        $this->email =$email;
        $this->passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $this->user_type = $user_type;
    }

    function add_ticket(Ticket $ticket){
        $this->tickets[] = $ticket;
    }

    function get_tickets(){
        return $this->tickets;
    }

    function get_UserDetails(){
       echo "Username: " . $this->username . "<br> Email: " . $this->email .".<br> ";
       echo "Tickets: " . $this->get_tickets();
    }
}


?>