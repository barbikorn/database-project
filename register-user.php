<?php
    include("connect.php");
    $query = "INSERT INTO user(email,password,addr1,addr2,fname,lname)VALUES('$_POST[inputEmail]','$_POST[inputPassword]','$_POST[inputAddress1]','$_POST[inputAddress2]','$_POST[inputFname]','$_POST[inputLname]')";
    $result=mysqli_query($conn,$query);
    if($query){
        echo json_encode(array("status"=>"1","message"=>"Success","query"=>$query));
    }else{
        echo json_encode(array("status"=>"0","message"=>"Failed","query"=>$query));
    }
?>