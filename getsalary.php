<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header('location: login.php');
    exit();
}
include 'dbconfig.php';
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Slip | Employee Management System</title>
    <link rel="stylesheet" href="../login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   
<?php

$empid = $_SESSION['empid']; 
$query = "SELECT * FROM salary WHERE empid = '$empid'"; 
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $basicpay = $row['basicpay'];
    $housingallowance = $row['housingallowance'];
    $transportallowance = $row['transportallowance'];
    $medicalallowance = $row['medicalallowance'];

    // Calculate net salary
    $netsalary = $basicpay + $housingallowance + $transportallowance + $medicalallowance;

    // Display salary slip table
    echo '<div class="container mt-5">
            <h2 class="mb-4">Salary Slip</h2>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">Employee ID</th>
                        <td>' . $empid . '</td>
                    </tr>
                    <tr>
                        <th scope="row">Basic Pay</th>
                        <td>₹' . $basicpay . '</td>
                    </tr>
                    <tr>
                        <th scope="row">Housing Allowance</th>
                        <td>₹' . $housingallowance . '</td>
                    </tr>
                    <tr>
                        <th scope="row">Transport Allowance</th>
                        <td>₹' . $transportallowance . '</td>
                    </tr>
                    <tr>
                        <th scope="row">Medical Allowance</th>
                        <td>₹' . $medicalallowance . '</td>
                    </tr>
                    <tr>
                        <th scope="row">Net Salary</th>
                        <td>₹' . $netsalary . '</td>
                    </tr>
                </tbody>
            </table>
          </div>';
} else {
    echo '<div class="container mt-5">
            <div class="alert alert-warning" role="alert">
                Error: Failed to fetch salary data or no salary data available for the employee.
            </div>
          </div>';
}

?>
</body>
</html>
