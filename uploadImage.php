<?php
    include("connect.php");
    $file = $_FILES["file"]["name"];
    echo $file;
    $filetype = explode(".",$file)[1];
    $filetype = strtolower(strval($filetype));
    echo $filetype;
    // CHECK IF FILE TYPE IS IMAGE FILE
    // if($filetype!=="jpg"||$filetype!=="jpeg"||$filetype!=="png")return;
    echo $filetype;
    $new_file = $_SESSION["email"]."-".time().".".$filetype;
    $dst = "./gallery/".$new_file;
    echo $dst;
    // IF SUCCESSFULLY UPLOADED THE FILE
    if(move_uploaded_file($_FILES["file"]["tmp_name"],$dst)){
        $query = "INSERT INTO gallery (url,email,title,description)
        VALUES('$dst',
        '$_SESSION[email]',
        '$_POST[title]',
        '$_POST[description]'
        )";
        $result = mysqli_query($conn,$query);
    }
    header("location:./page/home.php");
?>