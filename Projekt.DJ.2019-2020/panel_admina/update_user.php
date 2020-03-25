<?php
if(!empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['typ'])){
  $login = $_POST['login'];
  $email = $_POST['email'];
  $typ = $_POST['typ'];
  $id = $_POST['id'];
  echo $id;
  include_once('../connection.php');
  $connection = mysqli_connect($host, $root, $password_database, $database_name);
  mysqli_set_charset($connection, "utf8");
  $sql = "UPDATE `użytkownicy` SET `login`='$login',`email`='$email', `Typ`='$typ' WHERE `użytkownicy`.`Id_użytkownika`=$id";
  mysqli_query($connection, $sql);
  mysqli_close($connection);
  header('Location: panel_admina.php');


}

 ?>
