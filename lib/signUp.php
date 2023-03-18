<?php
function signUp(){

    //Get information from sign up form and set it as object attributes to be used by constructor
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $type = $_POST['type'];

        // Validate input (in case of empty values)
        $errors = [];
        if (empty($username)){
            $errors[] = "Username is required";
        }

        if (empty($name)){
            $errors[] = "Please enter your name";
        }

        if (empty($email)){
            $errors[] = "Email is required";
        }

        if (empty($phone_number)){
            $errors[] = "Please enter your phone number";
        }

        if (empty($address)){
            $errors[] = "Address is required";
        }

        if (empty($password)){
            $errors[] = "Password is required";
        }

        if (empty($type)){
            $errors[] = "please select your user type";
        }

        //if errors are present, print them out.
        if ($errors != null){
            // Display errors
            foreach ($errors as $error){
                echo "<p>$error</p>";
            }
        }

        //If no errors are present, then continue.

        else if (empty($errors)){
            // Connect to database
            $servername = "localhost";
            $dbusername = "root";
            $dbpassword = "";
            $dbname = "ecommerce";
            $dbconnection = new mysqli($servername, $dbusername, $dbpassword, $dbname);
        }

        // Check connection
        if ($dbconnection->connect_error) {
            die("Connection failed: " . $dbconnection->connect_error);
        }

        // Prepare mySQL query statement and tell database what information is to be stored and of what type it is
        $stmt = $dbconnection->prepare("INSERT INTO users (username, email,  password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);

        // Execute statement
        if ($stmt->execute()) {
            echo "User created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement and connection
        $stmt->close();
        $dbconnection->close();
    }
}
?>