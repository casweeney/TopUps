<?php
    require_once("../app/session.php");
    require_once("../app/functions.php");
    if($admin_session->is_logged_in()){
        Method::redirect_to("../master");
    }
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Topups Admin Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
		<!-- Custom Theme files -->
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
		<link type='text/css' href="../css/jquery-ui.min.css" rel="stylesheet">
		<!--js-->
		<script src="js/jquery-2.1.1.min.js"></script> 
		<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
		<!--icons-css-->
		<link href="css/font-awesome.css" rel="stylesheet"> 
		<!--Google Fonts-->
		<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
		<!--static chart-->
	</head>
	<body>	
		<div class="login-page">
		    <div class="login-main">  	
		    	 <div class="login-head">
						<h1>Admin Login</h1>
					</div>
					<div class="login-block">
						<form>
							<input type="email" name="email" placeholder="Email" required="" id="email">
							<input type="password" name="password" class="lock" placeholder="Password" id="pwd">
							<button type="button" id="signInBtn" class="btn btn-lg btn-primary">Login</button>
							<img id="loading" src="../img/loading.gif" class="img-fluid" style="width: 10%; display: none;">
							<span id="display" class="text-danger"></span>
						</form>
						<h5><a href="../">Go Back to Home</a></h5>
					</div>
		      </div>
		</div>
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
		<script src="js/bootstrap.js"> </script>
		<!-- mother grid end here-->
	</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $("#signInBtn").click(function(){
            var email = $("#email").val();
            var password = $("#pwd").val();
            var dataString = 'email1='+email + '&password1=' + password;

            if(email == "" || password == ""){
                $("#display").html("All fields required").show("slideUp");
                $("#display").effect("shake", "slow");
            } else{
                $("#loading").show().delay("1000");
                $.ajax({
                    type: "POST",
                    url: "auth_processor.php",
                    data: dataString,
                    cache: false,
                    success: function(result){
                        if(result == "success"){
                            $("#display").html("");
                            window.location.assign("../master");
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

                      
						
