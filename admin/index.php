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
}
?>

</body>
</html>