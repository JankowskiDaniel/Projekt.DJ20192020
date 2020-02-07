<?php
session_start();
//echo $_SESSION['alert_password'];
if(isset($_POST['old_password']) && isset($_POST['new_password'])){
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$old_password_hash = password_hash($old_password, PASSWORD_DEFAULT);
echo $_SESSION['password'];
if(password_verify($old_password, $_SESSION['password'])){
  include_once("../connection.php");
  $connection = mysqli_connect($host, $root, $password_database, $database_name);
  if($connection->connect_errno!=0)
  {
    echo "blad";
  }
  else {
mysqli_set_charset($connection, "utf8");
$id_usera = $_SESSION['id_user'];
$new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
//$sql = "UPDATE `użytkownicy` SET `hasło` ='$new_password_hash' WHERE `użytkownicy`.`Id_użytkownika`='$id_usera'";
$result = @mysqli_query($connection, sprintf("UPDATE `użytkownicy` SET `hasło` ='%s' WHERE `użytkownicy`.`Id_użytkownika`='$id_usera'",
                                              mysqli_real_escape_string($connection, $new_password_hash)
                                              ));
header('Location: password_changed.php');
mysqli_close($connection);



}
} else {
  echo $_SESSION['password'];

  //header('Location: change_password.php');

}
}
?>
