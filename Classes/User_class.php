    <?php

    require "Ticket_Class.php";

    class User{

        private $id;
        private $full_name;
        private $username;
        private $email; 
        private $password; 
        private $country;
        private $user_type; 
        private array $tickets = [];

        private $file = __DIR__ . "/../Server_data/Users.txt";
        
        function register($full_name, $username, $email, $password, $country, $user_type){
            $this->id = uniqid(); 
            $this->full_name = $full_name;
            $this->username = $username;
            $this->email =$email;
            $this->country = $country ;
            $this->password = password_hash($password, PASSWORD_DEFAULT);
            $this->user_type = $user_type;

            $register = "{$this->id};{$this->full_name};{$this->username};{$this->email};{$this->password};{$this->country};{$this->user_type}\n";
            file_put_contents($this->file, $register, FILE_APPEND);
        }
        
        static function login($email, $password){
            $file = __DIR__ . "/../Server_data/Users.txt";
            if(!file_exists($file)) return false;

            $lines = file($file);
            foreach($lines as $line){
                $line_split = explode(";", $line);

                if($line_split[3] == $email && password_verify($password, $line_split[4])){
                    session_start();
                    $_SESSION["user-id"] = $line_split[0];
                    $_SESSION["full-name"] = $line_split[1];
                    $_SESSION["username"] = $line_split[2];
                    $_SESSION["email"] = $line_split[3];
                    $_SESSION["country"] = $line_split[5];
                    $_SESSION["user-type"] = $line_split[6];
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