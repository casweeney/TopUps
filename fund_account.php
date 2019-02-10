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
                                    <span id="info" class="text-danger" style="display: none;">Fill funding amount first</span>
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
                                <p class="text-info">
                                    Pay via cash deposit, internet banking, mobile banking transfer to any of the accounts below; <br><br>

                                    Account Name: Zizocon Technologies Ltd. <br>
                                    Account No: 2029998090<br>
                                    Bank: First Bank
                                </p>
                                <br>
                                <form action="/action_page.php">
                                  <div class="form-group">
                                    <input type="number" placeholder="Amount" class="form-control" id="amount">
                                  </div>
                                  <div class="form-group">
                                    <textarea class="form-control" placeholder="Please state sender account name and bank."></textarea>
                                  </div>
                                  <center><button type="submit" class="btn btn-info" style="padding-right: 20%; padding-left: 20%; border-radius: 2px;">Send Payment Notification</button></center>
                                </form>
                                <br>   
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <script>
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
                        var handler = PaystackPop.setup({
                          key: 'pk_test_fa07f1ea491bdde75b7871c0c734a54279fded82',
                          email: 'customer@email.com',
                          amount: funding_amount * 100,
                          //ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                          // metadata: {
                          //    custom_fields: [
                          //       {
                          //           display_name: "Mobile Number",
                          //           variable_name: "mobile_number",
                          //           value: "+2348012345678"
                          //       }
                          //    ]
                          // },
                          callback: function(response){
                              fundWallet();
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