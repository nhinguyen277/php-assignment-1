<?php
if(isset($_GET['delete'])){
//print_r($_POST);
$id = $_GET['id'];


include('../includes/connect.php');
$query = "DELETE FROM rooms WHERE `id`='$id'";

$room = mysqli_query($connect,$query);

if($room){
 header("Location: ../index.php");
}else{
    echo "Failed:" .mysqli_error($connect);
}
}
else{
    echo "You should not be here";
}




?>
