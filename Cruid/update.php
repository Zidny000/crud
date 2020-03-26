<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

    include "Connect.php";
    $db = new Connect();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $getNote=$db->getNote($_GET['id']);
        
    }

    if(isset($_POST['update'])){
        $db->update($_POST['user_name'],$_POST['phone'],$_POST['address'],$id);
        header("location: index.php");
    }

?>

<?php
    foreach($getNote as $data){
?>

    <form action="" method="POST">
        <input type="text" name="user_name" placeholder="Name" value="<?php echo $data['user_name']?>"><br>  
        <input type="number" name="phone" placeholder="Phone Number" value="<?php echo $data['phone']?>"><br>
        <input type="text" name="address" placeholder="Address" value="<?php echo $data['address']?>"><br>
        <input type="submit" class="submit" name="update" value="ubdate">
    
    </form>

<?php
    }
?>    
</body>
</html>