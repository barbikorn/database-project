<?php
include("connect.php");
$fname = $_POST["inputFname"];
$lname = $_POST["inputLname"];
$addr1 = $_POST["inputAddress1"];
$addr2 = $_POST["inputAddress2"];
$uid = $_SESSION["userINFO"]["id"]; // USER ID
$QUERY = "UPDATE user SET fname='$fname',lname='$lname',addr1='$addr1',addr1='$addr2' WHERE id='$uid' ";
$result = mysqli_query($conn,$QUERY);
if($result){
    echo json_encode(array("status"=>1));
}else {
    echo json_encode(array("status"=>0));
}

?>