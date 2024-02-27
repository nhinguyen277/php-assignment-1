<?php
if(isset($_POST["updateRoom"])){
//print_r($_POST);
    $id = $_POST['id'];
    $name = $_POST["name"];
    $capacity = $_POST["capacity"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $imgURL = $_POST['imgURL'];
    $manager = $_POST['mid'];
    // $fid= $_POST['fid'];

include('../includes/connect.php');
$query = "UPDATE rooms SET name='$name', capacity ='$capacity',price='$price',description='$description',imgURL='$imgURL',manager_id='$manager' WHERE `id`='$id'";

$room = mysqli_query($connect,$query);

// $query2 = "UPDATE room_facility SET facility_id ='$fid' WHERE room_id='$id'";
// $amenity = mysqli_query($connect, $query2);
if($room){
    header('Location: ../view.php?id='.$id.'&view=');
}else{
    echo "Failed:" .mysqli_error($connect);
}
}
else{
    echo "You should not be here";
}




?>
