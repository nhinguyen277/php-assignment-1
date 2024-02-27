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
       


        <?php
        $id=$_GET['id'];
        $connect = mysqli_connect('sql311.infinityfree.com','if0_35758280','sIRTwFNr6Ii','if0_35758280_HTTP5225');

        $query="SELECT * FROM rooms WHERE `id`='$id'";
         $query2 = "SELECT r.*, m.*
         FROM rooms as r 
         JOIN manager as m ON r.manager_id = m.id 
         WHERE r.`id`='$id'";
         $rooms = mysqli_query($connect,$query);
         $result = $rooms -> fetch_assoc();
         $managers = mysqli_query($connect,$query2);

        ?>
         <div class="row">
                    <div class="col">
                <h1 class="display-5 mt-4 mb-4">
                    <?php
                    echo $result['name'];
                    ?>
                </h1>
            </div>
        </div>
        
        <div class="container">
            <div class = "row">
                <?php
                    echo '
                    <div class="col-md-5">
                        <div class="single-product-img">
                            <img src="'.$result['imgURL'].'" style="width:455px;height:350px;"alt="'.$result['name'].'">
                        </div>

				    </div>
                    <div class="col-md-4" style="margin-left: 20px">
                        <div class="block">
                            <div class="product-des">
                                
                                <h3 name="price" style="font-weght:500">Price: $'.$result['price'].'</h3>
                                <h4>Capacity: '.$result['capacity'].'</h4>
                                <p>Description: '.$result['description'].'</p>
                            </div>

                            
                          
                          
                        <h5>Manager</h5>  
                        <div class="row">';
                        foreach($managers as $manager){ 
                                echo '
                                <div class="col-md-5">
                                    <p>'.$manager['fname'].' '.$manager['lname'].'</p>
                                    <p>'.$manager['phone'].'</p>
                                </div>';
                            } 

                        echo '

                        </div>
                        </div>
                        <div class="row"> 
                        <div class="col-md-2">                              
                        <form method="GET" action="update.php">
                        <input type="hidden" name="id" value="'.$result['id'].'">
                        <button type="submit" name="edit" class="btn btn-sm btn-info">Edit</button>
                        </form>
                        </div>
                        <div class="col-md-2">
                        <form method="GET" action="includes/deleteRoom.php">
                        <input type="hidden" name="id" value="'.$result['id'].'">
                        <button type="submit" name="delete" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                        </div>
                        </div>
                    </div>	
                    ';
                        
                ?>
            </div>
        </div>
    </div>
    </div>
</body>
</html>