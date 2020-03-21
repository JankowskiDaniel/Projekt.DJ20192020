<?php
  session_start();
  if((!isset($_POST['login'])) || (!isset($_POST['password'])))
  {
    header('Location: logowanie.php');
    exit();
  }
  include_once("connection.php");
  $connection = mysqli_connect($host, $root, $password_database, $database_name);
  if($connection->connect_errno!=0)
  {
    echo "blad";
  }
  else {
mysqli_set_charset($connection, "utf8");
  $login = $_POST['login'];
  $password = $_POST['password'];
  $login = htmlentities($login, ENT_QUOTES, "UTF-8");
  //$sql = sprintf("SELECT * FROM użytkownicy WHERE login='$%s'",
//  mysqli_real_escape_string($connection,$login));
  if($result = @$connection->query(sprintf("SELECT * FROM `użytkownicy` WHERE login='%s'",
  mysqli_real_escape_string($connection,$login)
)));
  {
      if($result->num_rows>0){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['hasło'])){
            $_SESSION['iflogin'] = true; //jesli uzytkownik zaloguje sie przypisze true;
            $_SESSION['user'] = $row['login'];
            $_SESSION['id_user'] = $row['Id_użytkownika'];
            $_SESSION['date'] = $row['data_utworzenia'];
            $_SESSION['user_type'] = $row['Typ'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['hasło']; //pobiera zahashowane haslo
            header('Location: panel_usera/index_user.php');
            } else {
              //gdy zle haslo
              $_SESSION['e_logging']="Błędne hasło.";
              header('Location: logowanie_error.php');
              exit();
            }
      } else {
        $_SESSION['e_logging']="Błędny login.";
//co robic gdy nie rozpoznano konta uzytkownika
      header('Location: logowanie_error.php');

  }
  mysqli_close($connection);
    }
  }
 ?>
