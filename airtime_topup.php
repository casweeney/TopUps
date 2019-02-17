            <div class="container">
                <h3 class="text-white text-center">Airtime Recharge</h3>
                <div class="row text-center">
                    <div class="col-md-3">                        
                        
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <span id="message" style="display: none;" class="text-danger"></span>
                                <form>
                                  <div class="form-group">
                                    <input type="number" placeholder="Phone number" class="form-control" id="phone">
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control" id="network">
                                        <option selected value="">Select Mobile Network</option>
                                        <?php
                                            $networks = Network::get_all_networks();
                                            foreach($networks as $network){
                                                $network_id = $network->id;
                                                $network_name = $network->network_name;
                                                echo "
                                                    <option>{$network_name}</option>
                                                ";
                                            }
                                        ?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <input type="number" placeholder="Amount" class="form-control" id="amount">
                                  </div>
                                  <center><button type="button" class="btn btn-info" id="airtimeBtn" style="padding-right: 20%; padding-left: 20%; border-radius: 2px;">Recharge</button></center>
                                </form>
                                <br>    
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-3">
                        
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#airtimeBtn").click(function(){
                        var phoneNumber = $("#phone").val();
                        var network = $("#network").val();
                        var amount = $("#amount").val();
                        if(phoneNumber==""||phoneNumber.length<11||phoneNumber.length>11){
                            $("#message").html("Invalid phone number").show("slide");
                        }
                        else if(network==="Select Mobile Network"){
                            $("#message").html("Choose a network").show("slide");
                        }
                        else if(amount==""){
                            $("#message").html("Type airtime amount").show("slide");    
                        } else{
                            $("#message").hide();
                            $.ajax({
                                type: "POST",
                                url: "https://mobilenig.net/api/airtime.php/?username=Topupsng&password=View@131&network="+network+"&phoneNumber="+phoneNumber+"&amount="+amount,
                                cache: false,
                                success: function(response){
                                    alert(response);
                                }
                            });
                        }
                    });
                });
            </script>