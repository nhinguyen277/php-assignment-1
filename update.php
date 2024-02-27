<!doctype html>
<html>
<head>

   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Workplace Renting</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
    <?php
    include('reusables/nav.php');
    ?>

    <div class="container">
    <div class="row">
            <div class="col">
                <h1 class="display-5 mt-4 mb-4">Update Rooms</h1>
            </div>
        </div>
        <?php
        $id=$_GET['id'];
        $connect = mysqli_connect('sql311.infinityfree.com','if0_35758280','sIRTwFNr6Ii','if0_35758280_HTTP5225');
        $query = "SELECT r.*,m.id as mid,m.fname,m.lname
         FROM rooms as r 
         JOIN manager as m ON r.manager_id = m.id 
         WHERE r.`id`='$id'";
        $room = mysqli_query($connect,$query);
        $result = $room -> fetch_assoc();
        $query2 = 'SELECT m.id as mid,m.fname,m.lname  FROM manager as m ';
        $managers=mysqli_query($connect,$query2);
        

       if(mysqli_connect_error()){
           die("Connection error: " .mysqli_connect_error());
       }

        ?>

    
        <div class="row">
            <div class="col">
            <form action="includes/updateRoom.php" method="POST">
                    <input type="hidden" id="id" name="id" value="<?php echo $result['id'];?>">
                    <div class="col">
                        <div class="mb-3">
                            <label for="nname" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="Name" value="<?php echo $result['name'];?>">
                        </div>  
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" aria-describedby="Price" value="<?php echo $result['price'];?>">
                        </div>
                        <div class="mb-3">
                            <label for="capacity" class="form-label">Capacity</label>
                            <input type="number" class="form-control" id="capacity" name="capacity" aria-describedby="Capacity" value="<?php echo $result['capacity'];?>">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description" aria-describedby="Description" value="<?php echo $result['description'];?>">
                        </div>
                        <div class="mb-3">
                            <label for="imgURL" class="form-label">Image URL</label>
                            <input type="text" class="form-control" id="imgURL" name="imgURL" aria-describedby="Image URL" value="<?php echo $result['imgURL'];?>">
                        </div>
                        <div class="mb-3">
                        <label for="mid" class="form-label"></label>
                            <select name="mid" class="form-select" aria-label="Default select example">
                            <?php
                            if($result['manager_id']){
                                echo '<option value="'.$result['manager_id'].'" selected>'.$result['fname'].' '.$result['lname'].'</option>
                                ';
                            }else{
                                echo '<option selected>choose a manager</option>
                                ';
                            }
                           
                            foreach($managers as $manager)
                            echo'
                            <option value="'.$manager['mid'].'">'.$manager['fname'].' '.$manager['lname'].'</option>
                            ';
                            ?>
                            </select>                       
                        </div> 
                    </div> 
                   
                    <button type="submit" name="updateRoom" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>