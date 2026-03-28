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

        private $file = __DIR__ . "/../Handlers/Users.txt";
        
        function register($full_name, $username, $email, $password, $user_type){
            $this->id = uniqid(); 
            $this->full_name = $full_name;
            $this->username = $username;
            $this->email =$email;
            $this->password = password_hash($password, PASSWORD_DEFAULT);
            $this->user_type = $user_type;

            $register = "{$this->id};{$this->full_name};{$this->username};{$this->email};{$this->password};{$this->user_type}\n";
            file_put_contents($this->file, $register, FILE_APPEND);
        }
        
        static function login($email, $password){
            $file = __DIR__ . "/../Handlers/Users.txt";
            if(!file_exists($file)) return false;

            $lines = file($file);
            foreach($lines as $line){
                $line_split = explode(";", $line);

                if($line_split[3] == $email && password_verify($password, $line_split[4])){
                    session_start();
                    $_SESSION["user-id"] = $line_split[0];
                    $_SESSION["username"] = $line_split[2];
                    $_SESSION["user-type"] = $line_split[5];
                    return true;
                }
            }
            return false;
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