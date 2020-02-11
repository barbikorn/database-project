<?php
    include("connect.php");
    $email = $_POST["email"];
    $q = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn,$q);
    if($result){
        echo json_encode(array("status"=>"1","message"=>"Success","rows"=>mysqli_num_rows($result)));
    }else{
        echo json_encode(array("status"=>"0","message"=>"Failed","Query"=>$q));
    }
?>