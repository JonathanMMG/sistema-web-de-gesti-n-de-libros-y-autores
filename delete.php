<?php
session_start();
if (!isset($_SESSION['books'])) {
    $_SESSION['books'] = array();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_SESSION['books'][$id])) {
        unset($_SESSION['books'][$id]);
    }
}
header("Location: list.php");
exit();
?>
