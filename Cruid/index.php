<?php
    include "Connect.php";
    $db = new Connect();
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <div class="sec">
    <h1>Phone Book</h1>

    <?php
    
        if(isset($_POST['submit'])){
            if(!empty($_POST['user_name']) &&  !empty($_POST['phone']) && !empty($_POST['address'])){
               $db->addNote($_POST['user_name'],$_POST['phone'],$_POST['address']);
            }
            else{
                echo "<h3>All filed must be filled!!</h3>";
            }    
        }
        
    
    ?>

    <form action="" method="POST">
    <input type="text" name="user_name" placeholder="Name"><br>  
    <input type="number" name="phone" placeholder="Phone Number"><br>
    <input type="text" name="address" placeholder="Address"><br>
    <input type="submit" class="submit" name="submit" value="Add">
    
    </form>
    </div>


    <table border=2px>
        <?php
            $result=$db->showNote();
        ?>    

        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Action</th>

        </tr>
            
        <?php
            foreach($result as $data){
        ?>

        <tr>
            <td><?php echo $data['user_name'] ?></td>
            <td><?php echo $data['phone']?></td>
            <td><?php echo $data['address']?></td>
            <td> <a href="Update.php?id=<?php echo $data['id'];?>">view</a> | <a onclick="return confirm('are you sure?');" href="delete.php?id=<?php echo $data['id']; ?>">Delete</a></td>

        </tr>

        <?php
            }
        ?>

    </table>
  
    

</body>
</html>