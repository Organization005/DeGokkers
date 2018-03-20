<?php

    $login = $_POST['register'];
$dsn = 'mysql:dbname=accounts;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed:' . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($login){

    if ($_POST['password'] !== ' ') {

        //two passwords are equal to each other
        if ($_POST['password'] === $_POST['confirmpassword']) {

            $passwordlenght = strlen($_POST['password']);
            // change the 1 back to 7 when done testing
            if ($passwordlenght > 7) {

                $email = $_POST['email'];

                $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $query = $dbh->prepare("SELECT email FROM users WHERE email = :email");
                $query->bindValue( ":email", $email);
                $query->execute();

                if ($query->rowCount() > 0) {
                    $_SESSION['message'] = "the email is already in use";

                } else {
                    $sql = "INSERT INTO users (email, password) " . "VALUES ('$email', '$hashed_password')";

                    if ($dbh->query($sql) == true) {
                        $_SESSION['message'] = "Registration succesful!";
                    } else {
                        $_SESSION['message'] = 'User could not be added to the database!';
                    }



                }
            } else {
                $_SESSION['message'] = "you password needs to be longer than 7 characters";
            }


        } else {
            $_SESSION['message'] = 'Two passwords do not match!';
        }

    } else{
        $_SESSION['message'] = 'fill in a password';
    }
}
if ($login == false ){

    $query = $dbh->prepare("SELECT email FROM users WHERE email = :email");
    $query->bindValue( ":email", $email);
    $query->execute();

    $query = $dbh->prepare("SELECT password FROM users WHERE password = :password");
    $query->bindValue( ":password", $email);
    $query->execute();

    if ($_POST['logemail'] === $email){
        if ($_POST['logpassword']){
            $_SESSION['logmessage'] = 'your login in';
        }
    }
}
    }


