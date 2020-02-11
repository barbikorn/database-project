<?php  
    include("connect.php");
    $query = "UPDATE gallery SET status='inactive' WHERE id=$_POST[id] ";
    
    $result = mysqli_query($conn,$query);
    if($result){
        echo json_encode(array("status"=>1,"message"=>"Successfully deleted image"));
    }else{
        echo json_encode(array("status"=>0,"message"=>"Failed to delete image","query"=>$query));
    }
?>