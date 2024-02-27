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
                <h1 class="display-5 mt-4 mb-4">Add Rooms</h1>
            </div>
        </div>
        <?php
        $connect = mysqli_connect('sql311.infinityfree.com','if0_35758280','sIRTwFNr6Ii','room-renting');
        $query = 'SELECT * FROM manager 
         ';
        $managers = mysqli_query($connect,$query);

        if(mysqli_connect_error()){
            die("Connection error: " .mysqli_connect_error());
        }

        ?>
        <div class="row">
            <div class="col">
                <form action="includes/addRoom.php" method="POST">
                    <div class="col">
                        <div class="mb-3">
                            <label for="nname" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="Name">
                        </div>  
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" aria-describedby="Price">
                        </div>
                        <div class="mb-3">
                            <label for="capacity" class="form-label">Capacity</label>
                            <input type="number" class="form-control" id="capacity" name="capacity" aria-describedby="Capacity">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description" aria-describedby="Description">
                        </div>
                        <div class="mb-3">
                            <label for="imgURL" class="form-label">Image URL</label>
                            <input type="text" class="form-control" id="imgURL" name="imgURL" aria-describedby="Image URL">
                        </div>
                        <div class="mb-3">
                            <label for="manager" class="form-label"></label>
                            <select name="manager" class="form-select" aria-label="Default select example">
                            <option selected>Choose manager</option>
                            <?php
                            foreach($managers as $manager)
                            echo'
                            <option value="'.$manager['id'].'">'.$manager['fname'].' '.$manager['lname'].'</option>
                            ';
                            ?>
                            </select>                       
                        </div> 
                    </div> 
                   
                    <button type="submit" name="room" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>