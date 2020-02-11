<?php
include("../connect.php");
?>

<div class="bd-example">
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">

    <?if(isset($_SESSION['auth'])){
        $query = "SELECT * FROM gallery WHERE email='$_SESSION[email]'AND status='active'";
        $result = mysqli_query($conn,$query);
        $num_rows = mysqli_num_rows($result);
    ?>
        <ol class="carousel-indicators">
    <?
        for($i=0;$i<$num_rows;$i++){
            if($i==0){
            ?>
                <li data-target="#carouselExampleCaptions" data-slide-to=<?echo$i;?> class="active"></li>
            <?
            }else{
                ?>
                <li data-target="#carouselExampleCaptions" data-slide-to=<?echo$i;?> ></li>
                <?
            }
        }
    ?>
        </ol>
        <div class="carousel-inner">
            <?
            $index = 0;
            while($row = $result->fetch_assoc())
            {
                if($index == 0 ){
                ?>
                <div class="carousel-item active">
                    <img src=<?echo".".$row["url"]?> class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    <h2><?echo$row["title"]?></h2>
                    <p><?echo$row["description"]?></p>
                    </div>
                </div>
                <?} else {?>
                    <div class="carousel-item">
                        <img src=<?echo".".$row["url"]?> class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h2><?echo$row["title"]?></h2>
                        <p><?echo$row["description"]?></p>
                        </div>
                    </div>
                <?}
                $index ++ ;
            }
            ?>
        </div>
    <?
    ?>
    <?}else{?>
    <!-- IF THE USER IS NOT LOGGED IN ; SHOW SAMPLE IMAGE INSTEAD -->
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../gallery/rcover1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
            <h2>Store your picture</h2>
            <p>Free space for store your picture</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../gallery/rcover2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
            <h2>Create Memory</h2>
            <p>Let's collect the memory</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../gallery/rcover3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
            <h2>Diary</h2>
            <p>Let's picture tell the story</p>
            </div>
        </div>
        </div>
        
    <?}?>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>