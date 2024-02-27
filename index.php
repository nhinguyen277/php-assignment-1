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
                <h1 class="display-5 mt-4 mb-4">Rooms</h1>
            </div>
            <div class="col" style="margin:50px 0 0 800px">
            <a href="room.php" >Add a new room</a>
            </div>
        </div>

        <?php
        $connect = mysqli_connect('sql311.infinityfree.com','if0_35758280','sIRTwFNr6Ii','if0_35758280_HTTP5225');
        $query = 'SELECT * FROM rooms 
         ';
        $rooms = mysqli_query($connect,$query);

        if(mysqli_connect_error()){
            die("Connection error: " .mysqli_connect_error());
        }

        ?>
        
        <div class="container">
            <div class = "row">
                <?php
                    foreach($rooms as $room){

                        echo '
                        <div class="col-md-4" style="margin-top:20px">
                            <div class="card" style="width: 18rem;">
                                <img src="'.$room['imgURL'].'" class="card-img-top" alt="'.$room['name'].'">
                                <div class="card-body">
                                    <h5 class="card-title">'.$room['name'].'</h5>
                                    <div class="row">
                                        <div class="col">
                                            <p> <img src="img/people.png" style="wdth:20px; height:20px; margin-right:5px" alt="people icon"/> '.$room['capacity'].'</p>
                                        </div>
                                        <div class="col">
                                            <p>Price: $'.$room['price'].'</p>
                                        </div>
                                    </div>
                                </div>                       

                                <div class="card-footer">
                                    <div class="row">
                                        <form method="GET" action="view.php">
                                            <input type="hidden" name="id" value="'.$room['id'].'">
                                            <button type="submit" name="view" class="btn btn-dark">View</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                    }
           
                ?>
            </div>
        </div>
    </div>
    </div>
</body>
</html>