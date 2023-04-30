<?php

class User {
    public $user_name;
    public $password;
    public $name;

    public function __construct($uname, $pass, $name) {
        $this->user_name = $uname;
        // hashing the password
        $this->password = md5($pass);
        $this->name = $name;
    }

    public function getUserName() {
        return $this->user_name;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getName() {
        return $this->name;
    }

    public function addUser($pdo) {
        $stmt = $pdo->prepare("SELECT * FROM User WHERE user_name=:uname");
        $stmt->bindParam(':uname', $this->user_name);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return false; // username is taken
        } else {
            $stmt = $pdo->prepare("INSERT INTO User(user_name, password, name) VALUES(:uname, :pass, :name)");
            $stmt->bindParam(':uname', $this->user_name);
            $stmt->bindParam(':pass', $this->password);
            $stmt->bindParam(':name', $this->name);
            $result = $stmt->execute();
            return $result;
        }
    }
}
