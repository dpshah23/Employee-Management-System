<?php
session_start();
if (isset($_SESSION['email'])){
session_destroy();
echo "session";
header('Location: login.php');
exit();

}

?>