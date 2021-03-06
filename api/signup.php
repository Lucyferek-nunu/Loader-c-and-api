<?php

include 'database.php';

if (isset($_GET['username'])) { $user = mysqli_real_escape_string($link, $_GET['username']); }
if (isset($_GET['password'])) { $password = mysqli_real_escape_string($link, $_GET['password']); }

$table = "user";

$sql = "SELECT * FROM " . $table . " WHERE username=?;";
$stmt = mysqli_stmt_init($link);

if (!mysqli_stmt_prepare($stmt, $sql))
{
    echo "SQL failed";
} else {

    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result->num_rows >= 1)
    {
        echo "User juz jest";
    }
    else {
      SignupUser($user, $password, $table, $link);
    }
}

function SignupUser($user, $password, $table, $link)
{
  $options = ['cost' =>11];

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);

    $sql = "INSERT INTO `" . $table . "` (username, password) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($link);

    if (!mysqli_stmt_prepare($stmt, $sql))
    {
    echo "SQL failed2";
    } else {

    mysqli_stmt_bind_param($stmt, "ss", $user, $hashedPassword);
    mysqli_stmt_execute($stmt);

    echo "Account created";
  }
}

?>
