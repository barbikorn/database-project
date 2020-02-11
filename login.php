<?php
    include("connect.php");
    $query="SELECT * FROM user WHERE email='$_POST[email]'AND password='$_POST[password]'";
    $result = mysqli_query($conn,$query);
    if($result){
        // echo json_encode(array("status"=>"1","message"=>"Success"));
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $_SESSION["auth"] = true;
            $_SESSION["fname"] = $row["fname"];
            $_SESSION["email"] = $row["email"];
            $_SESSION['userINFO'] =  $row ;
            echo json_encode(array("status"=>"1","message"=>"Success","fname"=>$row["fname"],"userInfo"=>$row));
        }
    }else{
        echo json_encode(array("status"=>"0","message"=>"Failed"));
    }
?>