<?php
$insert=false;
if(isset($_POST['name'])){
$server = "localhost";
$username = "root";
$password = "";
$con= mysqli_connect($server,$username,$password);
if(!$con){
    die("connection to this database failed due to ".mysqli_connect_error());
}
// echo "Success Connecting to the Database";
$name = $_POST['name'];
$branch = $_POST['branch'];
$semester = $_POST['semester'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$description = $_POST['description'];
$sql = "INSERT INTO `trip1`.`trip1` (`name`, `branch`, `semester`, `email`, `phone`, `address`, `other`, `date`) VALUES ('$name', '$branch', '$semester', '$email', '$phone', '$address', '$description', current_timestamp());";
//echo $sql;

if($con->query($sql)== TRUE){
    //echo "successfully inserted";
    $insert = true;
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <img src="IIIT Sonepat.png" alt="IIIT Sonepat" class="iiit">
    <div class="container">
        <h2>Welcome to IIIT Sonepat US Travel Form</h2>
        <p>Enter your details and Submit this form to confirm your participation in the trip </p>
        <?php
        if($insert==true){
            echo "<p class='submitmsg'> Thanks For Submitting Form</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="branch" id="Branch" placeholder="Enter Your Branch">
            <input type="text" name="semester" id="Semester" placeholder="Enter Your Semester">
            <input type="Email" name="email" id="Email" placeholder="Enter Your Email">
            <input type="Phone" name="phone" id="phone" placeholder="Enter Your phone">
            <textarea name="address" id="address" cols="5" rows="2"
                placeholder="Enter your parmanent Address"></textarea>
            <textarea name="description" id="description" cols="30" rows="10"
                placeholder="Enter any other information here"></textarea>
            <button class="btn"   >Submit</button>
            <!-- <button class="btn">reset</button> -->
        </form>
    </div>
    <script>
    function submit(){
        //document.write("Thanks For Submitting Form");
    }
    </script>
</body>

</html>