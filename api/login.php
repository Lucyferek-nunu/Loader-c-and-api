<?php

include 'database.php';

if (isset($_GET['username'])) { $username = mysqli_real_escape_string($link, $_GET['username']); }
if (isset($_GET['password'])) { $username = mysqli_real_escape_string($link, $_GET['password']); }

$table = "user";

$sql = "SELECT * FORM " . $table . " WHERE username=?;";
$smt = mysqli_stmt_init($link);

if (!mysqli_stmt_prepare($stmt, $sql)) {
  echo "SQL failed";
} else {

  mysqli_stmt_bind_param($stmt, "s", $username);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($result)) {

    if (password_verify($password, $row['password'])) {
      echo "TRUE";
    } else {
      echo "FALSE";
    }
  }
}
?>
