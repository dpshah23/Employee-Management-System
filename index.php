<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header('location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Employee Management System</title>
    <script src="https://unpkg.com/@trevoreyre/autocomplete-js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

<?php
include 'navbaradmin.php';
?>
<br>
<br>
<br>
<div id='autocomplete' class="autocomplete">
    <form action="" method="get" class="d-flex" role="search">
        <input class="form-control me-2" type="search" name="name" placeholder="Search" id="autosearch" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</div>
<br>
<br>
<br>
<script>
    new autocomplete('#autocomplete',{
        search :input=>
        {
            console.log(input)
            const url=`http://127.0.0.1:5000/getname?name=${input}`
            return new Promise(resolve=>
                fetch(url)
                    .then(response=>response.json())
                    .then(data=>{
                        resolve(data.data)
                    })

            )

        },
        renderResult:(result,props)=>
        {
            console.log(props)
            let group=''
            if(result.index%3==0){
                group=`<li class="group">Group</li>`
            }
            return `
            ${group}
            <li ${props}>
            <div class="wiki-title">
            ${result.name}
            </div>
            </li>
            `
        }

    })
</script>

<?php
include 'dbconfig.php';

if(isset($_GET['name']))
{
    $name=$_GET['name'];

    $data=mysqli_query($conn,"SELECT * FROM users WHERE fname='$name'");
}
else
{
    $data=mysqli_query($conn,"SELECT * FROM users");
}
?>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Employee ID</th>
            <th>Email ID</th>
            <th>Phone Number</th>
            <th>Attendance</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
    while($row = mysqli_fetch_assoc($data)) {
    ?>
        <tr>
        <form action="" method="post">
            <td><?php echo $i++; ?></td>
            <td><input type="text" name="empid" value="<?php echo $row['empid'];  ?>"></td>
            <td><input type="text" name="email" value="<?php echo $row['email']; ?>"></td>
            <td><input type="text" name="mobile" value"<?php echo $row['mobile']; ?>"></td>
            <td>
                
                    <select class="form-select" name="option" aria-label="Default select example">
                        <option selected>Select attendance</option>
                        <option value="Present">Present</option>
                        <option value="Absent">Absent</option>
                        <option value="Late">Late</option>
                    </select>
                    <button type="submit" class="btn btn-success">Submit Attendance</button>
                </form>
            </td>
        </tr>
    <?php
    }
    ?>

<?php
include 'dbconfig.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $option = $_POST['option'];
    $empid = $_POST['empid'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $cdate = date('Y-m-d');

    // Check if attendance for the employee and current date already exists
    $checkAttendanceQuery = "SELECT * FROM `attendence` WHERE `empid` = '$empid' AND `cdate` = '$cdate'";
    $existingAttendanceResult = mysqli_query($conn, $checkAttendanceQuery);

    if(mysqli_num_rows($existingAttendanceResult) > 0) {
        echo "<script>";
        echo "alert(\"Attendance already marked for today\")";
        echo "</script>";
    } else {
        // Using prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO attendence (empid, cdate, ctime, cstatus) VALUES (?, ?, ?, ?)");
        $cdate = date('Y-m-d'); // Use MySQL format for date
        date_default_timezone_set('Asia/Kolkata');
        $ctime = date('H:i:s');

        $stmt->bind_param("ssss", $empid, $cdate, $ctime, $option);

        $stmt->execute();

        echo "<script>";
        echo "alert(\"Attendance Marked\")";
        echo "</script>";
    }
}
?>

    </tbody>
</table>

</body>
</html>
