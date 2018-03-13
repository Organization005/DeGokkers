<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['password'] !== ' ') {
        //two passwords are equal to each other
        if ($_POST['password'] === $_POST['confirmpassword']) {


            //define other variables with submitted values from $_POST
            $username = $mysqli->real_escape_string($_POST['username']);
            $email = $mysqli->real_escape_string($_POST['email']);

            //md5 hash password for security
            $password = md5($_POST['password']);


            //insert user data into database
            $sql = "INSERT INTO users (username, email, password) "
                . "VALUES ('$username', '$email', '$password')";

            //check if mysql query is successful
            if ($mysqli->query($sql) === true) {
                $_SESSION['message'] = "Registration succesful!" . "<br>"
                    . " Added $username to the database!";
            } else {
                $_SESSION['message'] = 'User could not be added to the database!';
            }
            $mysqli->close();


        }
        else {
            $_SESSION['message'] = 'Two passwords do not match!';
        }

    }
}
