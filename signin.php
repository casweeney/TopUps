<?php
    require_once("app/session.php");
    require_once("app/functions.php");
    if($user_session->is_logged_in()){
        Method::redirect_to("access_granted.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <?php include_once("inc/head.php"); ?>
    <body>
        <?php include_once("inc/nav.php"); ?>
        <div id="banner">
            <br><br>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        
                    </div>
                    <div class="col-md-4">                        
                        <div class="card" id="signup_card">
                            <br>
                            <h4 class="text-center text-info">Sign in</h4>
                            <span id="display" class="text-danger text-center" style="display: none;"></span>
                            <img id="svg" src="img/email.svg">
                            <center><img id="loading" src="img/loading.gif" class="img-fluid" style="width: 10%; display: none;"></center>
                            <div class="card-body">
                                <!--<form action="" method="POST">-->
                                  <div class="form-group">
                                    <input type="number" placeholder="Phone number" class="form-control" id="phone">
                                  </div>
                                  <div class="form-group">
                                    <input type="password" placeholder="Password" class="form-control" id="pwd">
                                  </div>
                                  <center><button type="submit" name="signin_btn" id="signInBtn" class="btn btn-info" style="padding-right: 20%; padding-left: 20%; border-radius: 2px;">Sign in</button></center>
                                <!--</form>-->
                                <br>
                                <center><a href="signup.php" class="btn btn-default text-info" style="padding-right: 20%; padding-left: 20%; border-radius: 2px;">Sign up</a></center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
            <br><br>
        </div>
        <?php include_once("inc/modal.php"); ?>
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $("#signInBtn").click(function(){
            var phone = $("#phone").val();
            var password = $("#pwd").val();
            var dataString = 'phone1=' + phone + '&password1=' + password;

            if(phone == "" || password == ""){
                $("#display").html("All fields required").show("slide").delay("1000");
                $("#svg").effect("shake", "slow");
            } else{
                $("#svg").hide();
                $("#loading").show().delay("1000");
                $.ajax({
                    type: "POST",
                    url: "signin_processor.php",
                    data: dataString,
                    cache: false,
                    success: function(result){
                        if(result == "success"){
                            $("#display").html("");
                            window.location.assign("access_granted.php");
                        } else{
                            $("#loading").hide();
                            $("#loading").hide();
                            $("#display").html(result).css("color","#cc0000").show("slide").effect("shake","slow");
                        }
                    }
                });
            }

        });
    });
</script>