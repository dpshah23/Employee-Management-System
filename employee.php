<?php
if(!$_SESSION['login']==true){
    header('location: login.php');
}
include 'navbar.php';

?>