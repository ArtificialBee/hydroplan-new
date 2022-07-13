<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php
$user = $_POST['user'];
$password = $_POST['password'];
$permission = $_POST['permission'];
$folder = $_POST['user-folder'];

$myfile = fopen('user-credentials.txt','r+');
$fileAsArray = array();
$alreadyExist = false;
while($line = fgets($myfile)){
    array_push($fileAsArray,$line);
    $oneUser = explode(' ',$line);
    if($oneUser[0] == $user){
        $alreadyExist = true;
        break;
    }
}

if($alreadyExist){ 
    echo "<div class='alert alert-danger' role='alert'>
    This user is already existing. Please create new with different username.
            </div>";
}
else{
    $newUser = $user . ' ' . $password .' ' . $permission . ' ' . $folder . PHP_EOL;
    fwrite($myfile,$newUser);
    echo "<div id='success' class='alert alert-success d-flex justify-content-center' role='alert'>
                You have successfully added new user!
            </div>" . '<br>';
    echo "<p class='text-success ml-3'>Username: $user </p>" . '<br>';
    echo "<p class='text-success ml-3'>Password: $password </p>" . '<br>';
    echo "<p class='text-success ml-3'>Permission: $permission </p>" . '<br>';
    echo "<p class='text-success ml-3'>User folder: $folder </p>" . '<br>';
}
?>


<button onclick="backToHomepage()" class="ml-3">Back to settings</button>

<script>
    function backToHomepage(){
        window.location.replace('/hydroplan/file-manager/index.php?p=&settings=1')
    }
    // document.getElementById('success').classList.add('alert alert-success')
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</body>
</html>


