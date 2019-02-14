            <div class="container">
                <h3 class="text-white text-center">Fund Account</h3>
                <div class="row">
                    <div class="col-md-6">                        
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-center">Online Payment - Instant Funding</h4>
                                <br>
                                <form onsubmit="return false;" method="POST">
                                  <script src="https://js.paystack.co/v1/inline.js"></script>  
                                  <div class="form-group">
                                    <span id="direct" class="text-danger" style="display: none;">Enter amount to fund your account</span>
                                    <input type="number" onfocus="verify()" placeholder="Amount" class="form-control" id="amount">
                                    <span id="info" class="text-danger" style="display: none; font-weight: bold;">Fill funding amount first</span>
                                  </div>
                                  <center><button id="fundNow" type="button" onclick="check()" class="btn btn-info" style="padding-right: 20%; padding-left: 20%; border-radius: 2px;">Proceed</button></center>
                                </form>
                                <br>   
                            </div>                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-center">Bank Transfer - Cash Deposit</h4>
                                <b id="feedback"></b>
                                <p class="text-info">
                                    Pay via cash deposit, internet banking, mobile banking transfer to any of the accounts below; <br><br>

                                    Account Name: Zizocon Technologies Ltd. <br>
                                    Account No: 2029998090<br>
                                    Bank: First Bank
                                </p>
                                <br>
                                <b id="errorMsg" class="text-danger" style="display: none;">All fields required</b>
                                <form onsubmit="return false;" method="POST">
                                  <div class="form-group">
                                    <input type="number" placeholder="Amount" onfocus="sayit()" class="form-control" id="transferAmount">
                                    <span id="showit1" class="text-danger" style="display: none;">Tell us how much you transfered</span>
                                  </div>
                                  <div class="form-group">
                                    <textarea id="details" onfocus="tellit()" class="form-control" placeholder="Please state sender account name and bank."></textarea>
                                    <span id="showit2" class="text-danger" style="display: none;">Tell us who sent the money and bank used</span>
                                  </div>
                                  <center><button type="submit" onclick="send()" id="noticeBtn" class="btn btn-info" style="padding-right: 20%; padding-left: 20%; border-radius: 2px;">Send Payment Notification</button><img id="loading" src="img/loading.gif" class="img-fluid" style="width: 10%; margin-top: -2%; display: none;"></center>
                                </form>
                                <input id="email" name="" hidden value=<?php echo "{$user_email}"; ?>>
                                <br>   
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <script>
              
              function sayit(){
                $("#showit2").hide(); $("#showit1").show("slideUp");
              }
              function tellit(){
                $("#showit1").hide(); $("#showit2").show("slideUp");
              }
              function send(){
                var transferedAmount = $("#transferAmount").val();
                var transferedNote = $("#details").val();
                var dataString = 'transferedAmount1=' + transferedAmount + '&transferedNote1=' + transferedNote;
                if(transferedAmount=="" || transferedNote==""){
                    $("#showit1").hide(); $("#showit2").hide(); $("#errorMsg").show("slide");
                } else{
                    $("#showit1").hide(); $("#showit2").hide(); $("#loading").show();
                    $.ajax({
                        type: "POST",
                        url: "funding_transfer.php",
                        data: dataString,
                        cache: false,
                        success: function(response){
                            $("#loading").hide();
                            if(response == "Payment details has been sent, please wait for verification"){
                                alert(response);
                                window.location.assign("access_granted.php")
                            } else{
                                $("#feedback").html(response);
                            }
                        }
                    });
                }
              }

              function fundWallet(){
                var funding_amount = $("#amount").val();
                var dataString = 'funding_amount1=' + funding_amount;
                $.ajax({
                    type: "POST",
                    url: "fund_wallet.php",
                    data: dataString,
                    cache: false,
                    success: function(result){
                        alert(result);
                        window.location.assign("access_granted.php");
                    }
                });
              }
              function verify(){
                var funding_amount = $("#amount").val();
                var fundBtn = $("#fundNow");
                if(funding_amount==""){
                    $("#info").hide();
                    $("#direct").show("slideUp");
                }
              }  
              function check(){
                var funding_amount = $("#amount").val();
                if(funding_amount==""){
                    $("#direct").hide();
                    $("#info").show("slide");
                } else{
                    $("#info").hide();
                    function payWithPaystack(){
                        var userMail = $("#email").val();
                        var handler = PaystackPop.setup({
                          key: 'pk_test_27fee75a36f9504bfec3a7990169f4e4fd5f8fed',
                          email: userMail,
                          amount: funding_amount * 100,
                          ref: ''+Math.floor((Math.random() * 1000000000) + 1),
                          callback: function(response){
                            $.ajax({
                              url: 'verify.php?reference=' + response.reference,
                              method: 'post',
                              success: function (data) {
                                if(data == "Transaction was successful"){
                                  fundWallet();
                                }
                              }
                            });
                          },
                          onClose: function(){
                              //alert('window closed');
                          }
                        });
                        handler.openIframe();
                      }
                    payWithPaystack();
                }
              }
            </script>