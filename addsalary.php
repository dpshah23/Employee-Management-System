<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
       
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="" method="POST">
            <div class="form-group" action="" method="post">
                <label for="empid">Employee ID:</label>
                <input type="text" id="empid" name="empid" required>
            </div>
            <div class="form-group">
                <label for="basicpay">Basic Pay:</label>
                <input type="text" id="basicpay" name="basicpay" required>
            </div>
            <div class="form-group">
                <label for="housingallowance">Housing Allowance:</label>
                <input type="text" id="housingallowance" name="housingallowance" required>
            </div>
            <div class="form-group">
                <label for="transportallowance">Transport Allowance:</label>
                <input type="text" id="transportallowance" name="transportallowance" required>
            </div>
            <div class="form-group">
                <label for="medicalallowance">Medical Allowance:</label>
                <input type="text" id="medicalallowance" name="medicalallowance" required>
            </div>
            <div class="form-group">
                <label for="netsalary">Net Salary:</label>
                <input type="text" id="netsalary" name="netsalary" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
    </div>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $empid=$_POST['empid'];
    $basicpay=$_POST['basicpay'];
    $housingallowance=$_POST['housingallowance'];
    $transportallowance=$_POST['transportallowance'];
    $medicalallowance=$_POST['medicalallowance'];
    $netsalary=$_POST['netsalary'];

    include 'dbconfig.php';

    $sql="INSERT INTO salary(empid,basicpay,housingallowance,transportallowance,medicalallowance,netsalary) VALUES('$empid','$basicpay','$housingallowance','$transportallowance','$medicalallowance','$netsalary')";

    $result=mysqli_query($conn,$sql);

    if($result){
        echo "<script>";
        echo "alert('Salary added successfully');";
        echo "</script>";
        header("Location: index.php");
        exit();
    }
    else{
        echo "<script>";
        echo "alert('Failed to add salary');";
        echo "</script>";
    }
}
?>
</body>
</html>