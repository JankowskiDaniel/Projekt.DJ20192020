<?php
  if(isset($_GET['id'])) {
    include_once('../connection.php');
    $connection = mysqli_connect($host, $root, $password_database, $database_name);
    mysqli_set_charset($connection, "utf8");
    $id = $_GET['id'];
    $sql_delete = "DELETE FROM `użytkownicy_słowa` WHERE `Id_użytkownika`=$id";
    mysqli_query($connection, $sql_delete);
    $sql_delete_course = "DELETE FROM `użytkownicy_kursy` WHERE `Id_użytkownika`=$id";
    mysqli_query($connection, $sql_delete_course);
    $sql = "DELETE FROM `użytkownicy` WHERE `użytkownicy`.`Id_użytkownika`=$id";
    mysqli_query($connection, $sql);
    mysqli_close($connection);
    header('Location: panel_admina.php');
  } else {
    echo "błąd";
  }


 ?>
