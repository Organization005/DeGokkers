<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['password'] !== ' ') {
        //two passwords are equal to each other
        if ($_POST['password'] === $_POST['confirmpassword']) {
            if ($_POST['password'] > 7){

                //define other variables with submitted values from $_POST
                $email = $mysqli->real_escape_string($_POST['email']);

                $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);


                //insert user data into database
                $sql = "INSERT INTO users (email, password) "
                    . "VALUES ('$email', '$hashed_password')";

                //check if mysql query is successful
                if ($mysqli->query($sql) === true) {
                    $_SESSION['message'] = "Registration succesful!";
                } else {
                    $_SESSION['message'] = 'User could not be added to the database!';
                }
                $mysqli->close();

            }
            else {
                $_SESSION['message'] = "you password needs to be longer than 7 characters";
            }




        }
        else {
            $_SESSION['message'] = 'Two passwords do not match!';
        }

    }
}
