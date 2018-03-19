<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['password'] !== ' ') {
        //two passwords are equal to each other
        if ($_POST['password'] === $_POST['confirmpassword']) {

            $passwordlenght = strlen($_POST['password']);
            if ($passwordlenght > 7){

                //define other variables with submitted values from $_POST
                $email = $mysqli->real_escape_string($_POST['email']);

                $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $dsn = 'mysql:accounts=users;host=127.0.0.1';
                $user = 'root';
                $password = '';

                try{
                    $dbh = new PDO($dsn, $user , $password);
                }catch (PDOException $e){
                    echo 'Connection failed:' . $e->getMessage;
                }


                //insert user data into database
               $sql = "INSERT INTO users (email, password) "
                    . "VALUES ('$email', '$hashed_password')";

                if ($mysqli->query($sql) === true) {
                    $_SESSION['message'] = "Registration succesful!";
                } else {
                    $_SESSION['message'] = 'User could not be added to the database!';
                }

//
//                //check if mysql query is successful
//                if ($mysqli->query($sql) === true) {
//                    $_SESSION['message'] = "Registration succesful!";
//                } else {
//                    $_SESSION['message'] = 'User could not be added to the database!';
//                }
//                $mysqli->close();

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
