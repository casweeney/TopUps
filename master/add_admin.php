<div class="row">
    <div class="col-md-3">
        
    </div>
    <div class="col-md-6">
        <div class="alert alert-dismissable alert-success" id="success" style="display: none;">
            <button data-dismiss="alert" class="close" type="button">&times;</button>
            Registration Successful...
            <br />
        </div>
        <div class="panel panel-primary" id="reg">
            <div class="panel-heading">
                <h4>Register new admin</h4>
                <span class="text-danger" id="msg" style="font-weight: bold; display: none;">Fill all fields</span>
            </div>
            <div class="panel-body">
                <form>
                    <input type="text" placeholder="Fullname" name="" id="fullname" class="form-control">
                    <br>
                    <input type="email" placeholder="Email" name="" id="email" class="form-control">
                    <br>
                    <input type="number" placeholder="Phone" name="" id="phone" class="form-control">
                    <br>
                    <input type="password" placeholder="Password" name="" id="pwd" class="form-control">
                    <br>
                    <input type="password" placeholder="Confirm password" name="" id="cpwd" class="form-control">
                    <br>
                    <button type="button" id="adminRegBtn" class="btn btn-primary">Register</button>
                    <img id="loading" src="../img/loading.gif" class="img-fluid" style="width: 10%; display: none;">
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#adminRegBtn").click(function(){
            var fullname = $("#fullname").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var password = $("#pwd").val();
            var cpassword = $("#cpwd").val();
            var dataString = 'fullname1='+fullname + '&email1='+email + '&phone1='+phone + '&password1='+password + '&cpassword1='+cpassword;
            if(fullname=="" || email==""||phone==""||password==""||cpassword==""){
                $("#msg").show("slideUp");
                $("#reg").effect("shake", "slow");
            }
            else if(!phone.match(/^[0-9]+$/)){
                $("#msg").html("Phone field should be only numbers").show("slideUp");
                $("#reg").effect("shake", "slow");
            }
            else if(phone.length < 11 || phone.length > 11){
                $("#msg").html("Type a complete or valid phone number").show("slideUp");
                $("#reg").effect("shake", "slow");    
            }
            else if(password !== cpassword){
                $("#msg").html("Passwords mismatch").show("slideUp");
                $("#reg").effect("shake", "slow");    
            } else{
                $("#msg").html("");
                $("#loading").show().delay("1000");
                $.ajax({
                    type: "POST",
                    url: "add_admin_processor.php",
                    data: dataString,
                    cache: false,
                    success: function(response){
                        if(response == "Signup successful"){
                            $("#loading").hide();
                            $("#msg").hide();
                            $("#success").show("slideUp");
                        } else{
                            $("#loading").hide();
                            $("#success").hide();
                            $("#msg").html(response).show("slideUp");
                            $("#reg").effect("shake", "slow");
                        }
                    }

                });
            }
        });
    });
</script>