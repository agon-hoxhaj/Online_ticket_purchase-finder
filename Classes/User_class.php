<?php

require "Ticket_Class.php";

class User{

    private $id;
    private $full_name;
    private $username;
    private $email; 
    private $password; 
    private $user_type; 
    private array $tickets = [];
    
    
    function __construct($id, $full_name, $username, $email, $password, $user_type){
        $this->id = $id; 
        $this->full_name = $full_name;
        $this->username = $username;
        $this->email =$email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->user_type = $user_type;
    }

    function add_ticket(Ticket $ticket){
        $this->tickets[] = $ticket;
    }

    function get_tickets(){
        return $this->tickets;
    }

    function get_UserDetails(){
       return [
        "id" => $this->id, 
        "username" => $this->username, 
        "email" =>   $this->email,
       ];
    }
}


?>