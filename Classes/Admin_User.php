<?php
require_once "User_Class.php";

class Admin extends User {
    /*static function delete_user($id) {
        $file = __DIR__ . "/../Server_data/Users.txt";
        if (!file_exists($file)) return false;

        $lines = file($file);
        $updated = array_filter($lines, function($line) use ($id) {
            $parts = explode(";", trim($line), 7);
            return $parts[0] !== $id;
        });

        file_put_contents($file, implode("", $updated));
        return true;
    }
    static function update_user_type($id, $new_type) {
        $file = __DIR__ . "/../Server_data/Users.txt";
        if (!file_exists($file)) return false;

        $lines = file($file);
        $updated = array_map(function($line) use ($id, $new_type) {
            $parts = explode(";", trim($line), 7);
            if ($parts[0] === $id) {
                $parts[6] = $new_type;
                return implode(";", $parts) . PHP_EOL;
            }
            return $line;
        }, $lines);

        file_put_contents($file, implode("", $updated));
        return true;
    }
        */
}
?>