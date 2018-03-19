<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['password'] !== ' ') {
        //two passwords are equal to each other
        if ($_POST['password'] === $_POST['confirmpassword']) {

            $passwordlenght = strlen($_POST['password']);
            // change the 1 back to 7 when done testing
            if ($passwordlenght > 1) {

                $email = $_POST['email'];

                $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $dsn = 'mysql:accounts=users;host=127.0.0.1';
                $user = 'root';
                $password = '';

                    try {
                    $dbh = new PDO($dsn, $user, $password);
            } catch (PDOException $e) {
                echo 'Connection failed:' . $e->getMessage;
            }



                $query = $dbh->prepare("SELECT email FROM users WHERE email = ?");
                $query->bindValue(1, $email);
                $query->execute();

                if ($query->rowCount() > 0) {

//                    $sql = "INSERT INTO users (email, password) " . "VALUES ('$email', '$hashed_password')";
//
//                    if ($mysqli->query($sql) === true) {
//                        $_SESSION['message'] = "Registration succesful!";
//                    } else {
//                        $_SESSION['message'] = 'User could not be added to the database!';
//                    }
                    $_SESSION['message'] = "it works now";
                } else {

                    $_SESSION['message'] = "the email is already in use";

                }
            } else {
                $_SESSION['message'] = "you password needs to be longer than 7 characters";
            }


        } else {
            $_SESSION['message'] = 'Two passwords do not match!';
        }

    }
}
