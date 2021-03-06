<?php
include("../connect.php");
$userInfo = $_SESSION["userINFO"];
// echo $userInfo["id"]
?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<style>
    label {
        font-weight: bold;
    }
</style>

<body>
    <div id="my-navbar"></div>
    <div clsas="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card register-card">
                    <div class="card-body">
                        <h1 class="card-title">Registeration</h1>
                        <p class="card-text">Please fill in the information</p>
                        <form id="profile-form" name="profile-form">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" value=<? echo $userInfo["email"] ?>>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">First name</label>
                                    <input type="email" class="form-control" id="inputFname" name="inputFname" placeholder="First name" value=<? echo $userInfo["fname"] ?>>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Last name</label>
                                    <input type="email" class="form-control" id="inputLname" name="inputLname" placeholder="Last name" value=<? echo $userInfo["lname"] ?>>
                                </div>

                            </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress1" name="inputAddress1" placeholder="1234 Main St" value=<? echo $userInfo["addr1"] ?>>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address 2</label>
                            <input type="text" class="form-control" id="inputAddress2" name="inputAddress2" placeholder="Apartment, studio, or floor" value=<? echo $userInfo["addr2"] ?>>
                        </div>
                    </div>
                    </form>
                    <button class="btn btn-primary" onClick="update();">Save change</button>
                </div>
            </div>
            <!-- END COLUMN -->
        </div>
        <!-- END ROW -->
    </div>
    <!-- END CONTAINER    -->
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $("#my-navbar").load("../component/navbar.php");
    $.ajax({
        method:"POST",
    })
    function update() {
        const addr1 = $("#inputAddress1").val();
        const addr2 = $("#inputAddress2").val();
        const fname = $("#inputFname").val();
        const lname = $("#inputLname").val();
        // check email if email already exist or not
        const dataString = `email=${email}`
        if (!fname) return alert("Your first name is empty");
        if (!lname) return alert("Your last name is empty");
        if (!addr1) return alert("Address 1 is empty")
        if (!addr2) return alert("Address 2 is empty")
        console.log($("#profile-form").serialize())
        $.ajax({
            method: "POST",
            url: "../updateprofile.php",
            data: $("#profile-form").serialize(),
            success: function(data) {
                data = JSON.parse(data)
                status = data.status
                if(status == 1)alert("Successfully updated profile..")
                else alert("Failed to update profile info..")
            }
        }) // END AJAX REQUEST

    }
</script>