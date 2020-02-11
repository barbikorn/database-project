<?php
include("../connect.php");
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="home.php">BBGallery</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <? if(isset($_SESSION["auth"])){?>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">profile</a>
      </li>
      <?}?>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        
    <?php
        if(isset($_SESSION["auth"])){
            ?>
        <div class="user-navbar">
        <label>Hi,<?echo $_SESSION["fname"]?> ! </label>
        </div>
        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" onClick="logout()">Log out</button>
            <?
        }else{
            ?>
            <a href="" 
                data-toggle="modal" 
                data-target="#modalLoginForm">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log in</button>
            </a>

            <?
        }
    ?>
    </form>
  </div>
</nav>

<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
          <form name="login-form" id="login-form">
            <div class="md-form mb-5">
            <i class="fas fa-envelope prefix grey-text"></i>
            <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
            <input type="email" id="email" name="email" class="form-control validate">
            </div>

            <div class="md-form mb-4">
            <i class="fas fa-lock prefix grey-text"></i>
            <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>

            <input type="password" id="password" name="password" class="form-control validate">
            </div>
            </form>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" style="width:100%;" onClick="checkParam()">Login</button>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <a href="register.php"><b>Don't have an account ? </b></a>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    function checkParam(){
        const email = $("#email").val();
        const password = $("#password").val();
        $.ajax({
            method:"POST",
            data:$("#login-form").serialize(),
            url:"../login.php",
            success:function(data){
                const status=JSON.parse(data).status;
                if(status)window.location.replace("../page/home.php");
            }
        })
    }
    function logout(){
        $.ajax({
            method:"POST",
            url:"../logout.php",
            success:function(data){
                window.location.reload();
            }
        })
    }
</script>
