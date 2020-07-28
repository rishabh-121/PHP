<?php
$insert=false; //declaring
if(isset($_POST['name'])){ //isset beacuse if somebody doesnt enter his name so form will not get submit.
    $server="localhost";
    $username="root";
    $password="";
    $con=mysqli_connect($server, $username, $password);
    if(!$con)
    {
        die("connection to this database failed due to". mysqli_connect_error());
    }
    //echo "Successfully connected to database";
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $desc=$_POST['desc'];


    $sql="INSERT INTO `trip`.`trip` ( `Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `Dt`) VALUES
    ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

     
     if($con->query($sql)==true)
     {
         //echo "Successfully Inserted";
         $insert=true;

     }
     else{
         echo "ERROR: $sql <br> $con->error";
     }
     $con->close();
    }
     
    ?>
        





    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Php</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="IISc" src="bg.jpg" alt="IIsc" width=100% position=absolute z-index=-1>
    <div class="container">
        <h1>Welcome to IISc US trip form.</h1>
        
    <p>Enter your details and submit this form to confirm your participation in the trip.</p>
    
    <?php
    if($insert==true)
    {
   echo" <p class='Submsg'>Thanks for submitting your form. We are happy to see you joining us. </p>";
    }
    else{

    }
    ?>
    <form action="index.php" method="POST">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <input type="text" name="age" id="age" placeholder="Enter your age">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
        <input type="email" name="email" id="email" placeholder="Enter your email">
        <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information"></textarea>
        <button class="btn">Submit</button>
        
    </form>

    </div>
    
    <script src="index.js"></script>
    
!
    </body>
</html>
