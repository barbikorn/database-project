<?php
include("../connect.php");
?>
<br>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
        Do you really want to delete this picture?
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <div class="modal-body">
      </div> -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger"  onClick="confirmDelete()">Yes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL -->



<div class="row">
    <div class="col-lg-12">
        <div class="card gallery-card-wrapper">
            <div class="card-title">
                <b><h1 class="display-1">Gallery</h1></b>
            </div>
            <?
            if(isset($_SESSION["auth"])){?>
            <div class="row">
                <?
                    $query="SELECT * FROM gallery WHERE email='$_SESSION[email]'AND status='active'";
                    $result=mysqli_query($conn,$query);
                    while($row = mysqli_fetch_assoc($result)){
                        $url = $row["url"];
                        $title = $row["title"];
                        $description = $row["description"];
                        $id = $row["id"];
                    ?>
                    <div class="col-lg-4">
                        <div class="card card-img">
                            <div class="card-header">
                                <button type="button" 
                                id=<?echo"pic-".$id?> 
                                onClick="deletePic(event)" 
                                class="btn btn-outline-danger my-2 my-sm-0" 
                                data-toggle="modal" 
                                data-target="#exampleModal">x</button>
                            </div>
                            <img class="card-img" src=<?echo".".$url;?> >
                            <div class="card-title"><?echo$title;?></div>
                            <div class="card-text"><?echo$description;?></div>
                            <div class="card-body"></div>
                        </div>
                    </div>
                    <!-- END CARD -->
                    <?
                    }// END WHILE LOOP          
                ?>

                <!-- UPLOAD IMAGE CARD -->
                <div class="col-lg-4">
                <!-- UPLOAD IMAGE FORM -->
                <form method=POST action="../uploadImage.php" enctype="multipart/form-data">
                    <div class="card gallery-card card-img">
                        <div class="form-group">
                            <b><label for="exampleFormControlFile1">Select image file</label></b>
                            <input 
                                type="file" 
                                class="form-control-file" 
                                id="file"
                                name="file"
                            >
                            <!-- END INPUT TYPE FILE -->
                        </div>
                        <div class="card-title">
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                        </div>
                        <input 
                            id="title"
                            name="title"
                            type="text" 
                            class="form-control" 
                            aria-label="Sizing example input" 
                            aria-describedby="inputGroup-sizing-default">
                        <!-- END INPUT -->
                        </div>
                        </div>
                        <div class="card-text"><div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
                        </div>
                        <input 
                            id="description"
                            name="description"
                            type="text" 
                            class="form-control" 
                            aria-label="Sizing example input" 
                            aria-describedby="inputGroup-sizing-default">
                            <!-- END INPUT -->
                            </div></div>
                            <button class="btn btn-success" id="uploadPic" name="uploadPic" onClick="uploadPic()">Upload</button>
                    </div>
                </div>
                </form>
            </div>
            <?}else{
            ?>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <img src="../gallery/pic.jpg" >
                        <div class="card-title">First slide label</div>
                        <div class="card-text">Nulla vitae elit libero, a pharetra augue mollis interdum.</div>
                        <div class="card-body"></div>
                    </div>
                </div>
                <!-- END CARD -->
                <div class="col-lg-4">
                    <div class="card">
                        <img src="../gallery/pic.jpg" >
                        <div class="card-title">First slide label</div>
                        <div class="card-text">Nulla vitae elit libero, a pharetra augue mollis interdum.</div>
                        <div class="card-body"></div>
                    </div>
                </div>
                <!-- END CARD -->
                <div class="col-lg-4">
                    <div class="card">
                        <img src="../gallery/pic.jpg" >
                        <div class="card-title">First slide label</div>
                        <div class="card-text">Nulla vitae elit libero, a pharetra augue mollis interdum.</div>
                        <div class="card-body"></div>
                    </div>
                </div>
                <!-- END CARD -->
            <?}?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
// target to be deleted 
var delete_target_id = null;
function deletePic(event){
    return delete_target_id = event.target.id.split("-")[1];
}
function confirmDelete(){
    const dataString = `id=${delete_target_id}`;
    $.ajax({
        method:"POST",
        url:"../deletePic.php",
        data:dataString,
        success:function(data){
            const response=JSON.parse(data);
            console.log(response);
            const status=data.status;
            window.location.reload();
        }
    })
}
</script>