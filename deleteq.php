<?php
include 'dbconfig.php';
$sql=mysqli_query($conn,"delete from attendence");
if($sql){
    echo "deleted ";
}
?>