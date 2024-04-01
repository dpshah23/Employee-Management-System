<?php
if(!$_SESSION['login']==true){
    header('location:../login.php');
}
else{
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
<div id='autocomplete' class="autocomplete">
<form action="" method="get" class="d-flex" role="search">
    <input class="form-control me-2" type="search" placeholder="Search" id="autosearch" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>

</form>
</div>

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
if($_SERVER['REQUEST_METHOD']=="GET")
{
    $name=$_GET['name'];

    include '../dbconfig.php';

    $data=mysqli_query($conn,"SELECT * FROM users WHERE name=$name");


}
else{
    include 'dbconfig.php';
    
    $data=mysqli_query($conn,"SELECT * FROM users");
}
}
?>
<table class="table">
<thead>#</thead>
<thead>Employee ID</thead>
<thead>Email ID</thead>
<thead>Phone Number</thead>
<thead>Attendence</thead>
<?php for($i=0;$i<count($data);$i++){?>

    <tr>
      <th scope="row"><?php echo "($i+1)"; ?></th>
      <td><?php echo $data['empid']; ?></td>
      <td><?php echo $data['email']; ?></td>
      <td><?php echo $data['mobile']; ?></td>
      <form action="" method="post">
      <td>
      
      <select class="form-select" aria-label="Default select example">
      <option selected name="option">Open this select menu</option>
      <option value="Present">Present</option>
      <option value="Absent">Absent</option>
      <option value="Late">Late</option>
      </select>
    
      </td>
      <td>
        <button type="submit" class="btn btn-success">Submit Attendence</button>
      </form>
    </tr>
    <?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $option=$_POST['option'];

    $sqlq=mysqli_query($conn,"INSERT INTO attendence (empid,cdate,ctime,cstatus) VALUES ('$_SESSION['empid']',date('D-m-Y'),date('H:i:s'),$option)")
    
    echo "<script>";
    echo "alert(\"Attendence Marked\")";
    echo "</script>";
}
?>

<?php } ?>


</table>

</body>
</html>