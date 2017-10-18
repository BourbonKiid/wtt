<?php
include($_SERVER['DOCUMENT_ROOT'].'/wtt/db/database.php');

if (isset($_POST['email'])&&isset($_POST['username'])&&isset($_POST['password'])) {
    $firstname = $_POST['firstname'];
    $lastname =  $_POST['lastname'];
    $email =  $_POST['email'];
    $username =  $_POST['username'];
    $password =  $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $country =  $_POST['country'];
    $bday =  $_POST['bday'];

    $statement_login = 'INSERT INTO login (username, password) VALUES ("'.$username.'", "'.$hash.'");';

    echo $statement_login;

    $sql = $db->prepare($statement_login);
        if ($sql->execute() === TRUE) {
            echo "succses <br>";
        }else{
            echo "Addin login did not work<br>";
            $db->close();
        }

    $logininfoinfo = $db->query('SELECT idlogin FROM login WHERE username="'.$username.'" AND password="'.$hash.'";');
    $getlogin = mysqli_fetch_assoc($logininfoinfo);
    $idlogin = $getlogin['idlogin'];

    

    $statement_user = 'INSERT INTO user (firstname, lastname, email, idlogin, country, bday) VALUES ("'.$firstname.'", "'.$lastname.'", "'.$email.'", "'.$idlogin.'", "'.$country.'", "'.$bday.'");';
    echo $statement_user;
}

$sql = $db->prepare($statement_user);
        if ($sql->execute() === TRUE) {
            echo '<script type="text/javascript">window.alert("Registration erfolgreich");location.replace("/wtt/login/userlogin.php?id=1");</script>';
            $db->close();
        }else{
            echo "Adding user did not work<br>";
            $db->close();
        }


?>