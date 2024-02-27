<?php
  if(isset($_POST['room'])){
    // print_r($_POST);  
    $name = $_POST["name"];
    $capacity = $_POST["capacity"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $imgURL = $_POST['imgURL'];
    $manager = $_POST['manager'];
    // $fid= $_POST['id'];
    include('connect.php');
    if (!$connect) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $query = "INSERT INTO rooms (name, price, capacity, description, imgURL,manager_id) VALUES (
      '".mysqli_real_escape_string($connect,$name)."',
      '".mysqli_real_escape_string($connect,$price)."',
      '".mysqli_real_escape_string($connect,$capacity)."',
      '".mysqli_real_escape_string($connect,$description)."',
      '".mysqli_real_escape_string($connect,$imgURL)."',
      '".mysqli_real_escape_string($connect,$manager)."')";

    $rooms = mysqli_query($connect, $query);
    // $id = mysqli_insert_id($connect);
    // // print_r("Insert ID: ".$id);
    // // exit();

    // $query2 = "INSERT INTO room_facility (room_id,facility_id) VALUES (
    //     '".mysqli_real_escape_string($connect,$id)."',
    //     '".mysqli_real_escape_string($connect,$fid)."')
    //     ";
    // $amenity = mysqli_query($connect, $query2);

    if($rooms){
      header('Location: ../index.php');
    }else
    {
      echo "Error" . mysqli_error($connect);
    }
  }else{
    echo "You shouldn't be here!";
  }





?>
