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
                            <h4 class="text-center text-info">Sign up</h4>
                            <span class="text-danger text-center" id="dist" style="display: none;"></span>
                            <b id="successful" class="text-center"></b>
                            <center><img id="loading" src="img/loading.gif" class="img-fluid" style="width: 10%; display: none;"></center>
                            <div class="card-body">
                                <!-- <form method="POST"> -->
                                  <div class="form-group">
                                    <input type="text" placeholder="Fullname" class="form-control" id="fname">
                                  </div>
                                  <div class="form-group">
                                    <input type="number" placeholder="Phone number" class="form-control" id="phone">
                                  </div>
                                  <div class="form-group">
                                    <input type="email" placeholder="Email address" class="form-control" id="email">
                                  </div>
                                  <div class="form-group">
                                    <input type="password" placeholder="Choose password" class="form-control" id="pwd">
                                  </div>
                                  <div class="form-group">
                                    <input type="password" placeholder="Confirm password" class="form-control" id="cpwd">
                                  </div>
                                  <center><button id="signUpBtn" class="btn btn-info" style="padding-right: 20%; padding-left: 20%; border-radius: 2px;">Sign up</button></center>
                                <!-- </form> -->
                                <br>
                                <center><a href="signin.php" class="btn btn-default text-info" style="padding-right: 20%; padding-left: 20%; border-radius: 2px;">Sign in</a></center>
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
<script>
  $(document).ready(function(){
    $("#signUpBtn").click(function(){
      var fullName = $("#fname").val();
      var phone = $("#phone").val();
      var email = $("#email").val();
      var password = $("#pwd").val();
      var cpassword = $("#cpwd").val();

      var dataString = 'fullName1='+ fullName + '&phone1=' + phone +'&email1=' + email + '&password1=' + password + '&cpassword1=' + cpassword;

      if(fullName=="" || phone=="" || email=="" || password=="" || cpassword==""){
        $("#dist").html("Please fill all field").show("slide").delay("1000");
        $("#signup_card").effect("shake", "slow");
      } 
      else if(!phone.match(/^[0-9]+$/)){
        $("#dist").html("Phone field should contain only numbers").show("slide").delay("1000");
        $("#signup_card").effect("shake", "slow");  
      }
      else if(phone.length < 11 || phone.length > 11){
        $("#dist").html("Type a complete or valid phone number").show("slide").delay("1000");
        $("#signup_card").effect("shake", "slow"); 
      }
      else if(!password.match(/^[0-9a-zA-Z]+$/)){
        $("#dist").html("Password field should contain only letters numbers").show("slide").delay("1000");
        $("#signup_card").effect("shake", "slow"); 
      }
      else if(password !== cpassword){
        $("#dist").html("Passwords mismatch").show("slide").delay("1000");
        $("#signup_card").effect("shake", "slow"); 
      } else{
        $("#dist").html("");
        $("#loading").show().delay("1000");
        $.ajax({
          type: "POST",
            url: "signup_processor.php",
            data: dataString,
            cache: false,
            success: function(result){
              console.log(result);
              $("#dist").html(result).show("slide").delay("1000");
              if(result == "<span class='text-success text-center'>Signup successful</span>"){
                $("#successful").html("Redirecting to Login...").css("color","#c60").delay("1000");
                if($("#successful").html() == "Redirecting to Login..."){
                    window.location.assign("signin.php");
                }
              }else{
                $("#loading").hide();
                $("#dist").html(result).show("slide").effect("shake","slow"); 
              }
            }
        });
      }
      return false;
    });
  });
</script>