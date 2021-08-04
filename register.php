<?php
ob_start();
session_start();
include('db/connectionDB.php');
$user = $_POST['form-username'];
$pass = $_POST['form-password1'];

$sql = "SELECT idUser,username, password FROM Users WHERE username='$user'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($result->num_rows == 1) {
    echo "Esse username já existe";
    header("Refresh:2; url=index.php");
   
} else {
    $sql = "INSERT INTO Users (username, password) VALUES ('$user', '$pass')";
    $conn->query($sql);
     echo "Utilizador criado com sucesso";
    header("Refresh:2; url=index.php");
}
$conn->close();
