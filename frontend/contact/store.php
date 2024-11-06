<?php

session_start();
require "../../db.php";

if(isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['message']) &&
!empty($_POST['name']) && !empty($_POST['email'])&& !empty($_POST['phone']) && !empty($_POST['message'])) {

    $stmt = $conn->prepare("INSERT INTO contact (name, email, phone, message)
    VALUES (:name, :email, :phone, :message)");
    $stmt->execute($_POST);

    $_SESSION['scssmsg'] = "Your message has sent successfully";

    header("Location: ./contact.php");
}

?>