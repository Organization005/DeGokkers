<?php




        $dsn = 'mysql:dbname=accounts;host=127.0.0.1';
        $user = 'root';
        $password = '';
        error_reporting(~E_NOTICE);
        try {
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed:' . $e->getMessage();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


                if ($_POST['password'] !== ' ') {
                    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                        //two passwords are equal to each other
                        if ($_POST['password'] === $_POST['confirmpassword']) {

                            $passwordlenght = strlen($_POST['password']);
                            if ($passwordlenght >= 7) {

                                $email = trim($_POST['email']);
                                $password = trim($_POST['password']);
                                if( preg_match('/[0-9]/', $password) ) {
                                    if (preg_match('/[A-Z]/', $password)) {

                                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                                        $query = $dbh->prepare("SELECT email FROM users WHERE email = :email");
                                        $query->bindValue(":email", $email);
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
                                    }else{
                                        $_SESSION['message'] = "your password is invalid (needs at least 1 capital letter)";
                                    }
                                }else{
                                    $_SESSION['message'] = "your password is invalid (needs at least 1 figure)";
                                }
                            } else {
                                $_SESSION['message'] = "your password needs to be longer than 7 characters";
                            }


                        } else {
                            $_SESSION['message'] = 'Two passwords do not match!';
                        }


                } else {
                    $_SESSION['message'] = 'fill in a password';
                }
            }

                $logemail = $_POST['logemail'];
                $logpassword = $_POST['logpassword'];
                $logincheck = false;
                $loogpassword = ' ';

                $query = $dbh->prepare("SELECT email FROM users WHERE email = :email");
                $query->bindValue(":email", $logemail);
                $query->execute();
                if ($query->rowCount() > 0) {

                    $query2 = $dbh->prepare("SELECT password FROM users WHERE email = :email");
                    $query2->bindValue(":email", $logemail);
                    $query2->execute();
                    $hash = $query2->fetch();

                    if (password_verify($logpassword, $hash['password'])) {
                        $logincheck = true;

                    }
                } else {
                    $logincheck = false;
                    
                }

                if ($logincheck === false) {
                    $_SESSION['logmessage'] = "your password or email is not correct";


                } else {
                    $_SESSION['logmessage'] = "you are login now";
                }
            }



