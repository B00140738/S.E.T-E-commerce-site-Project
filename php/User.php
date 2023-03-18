<?php
//NOTE: Variables marked as protected so that they are not accessed or changed by any other class
class User {

    protected $username;
    protected $name;
    protected $email;
    protected $phone_number;
    protected $password;

    protected $address;

    protected $type;

    //User Constructor
    public function __construct($username, $name, $email, $phone_number, $password, $address, $type) {
        $this->username = $username;
        $this->name = $name;
        $this->email = $email;
        $this->phone_number = $phone_number;
        $this->password = $password;
        $this->address = $address;
        $this->type = $type;
    }

    //Get User information
    public function getUsername() {
        return $this->username;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhoneNumber() {
        return $this->phone_number;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getAddress() {
        return $this->address;
    }
}