            <div class="container">
                <h3 class="text-white text-center">Mobile Data Topup</h3>
                <div class="row text-center">
                    <div class="col-md-3">                        
                        
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form action="/action_page.php">
                                  <div class="form-group">
                                    <input type="number" placeholder="Phone number" class="form-control" id="phone">
                                  </div>
                                  <div class="form-group">
                                    <select name="net" id="choose" class="form-control">
                                        <option selected value="">Select Mobile Network</option>
                                        <?php
                                            $networks = Network::get_all_networks();
                                            foreach($networks as $network){
                                                $network_id = $network->id;
                                                $network_name = $network->network_name;
                                                echo "
                                                    <option value='{$network_id}'>{$network_name}</option>
                                                ";
                                            }
                                        ?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control" id="bundles">
                                        
                                    </select>
                                  </div>
                                  <center><button type="submit" class="btn btn-info" style="padding-right: 20%; padding-left: 20%; border-radius: 2px;">Send Data</button></center>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function(){
                    var hm;
                    $("#choose").change(function(){
                        var str = $("#choose").val();
                        $.post("bundles.php?net", {net:str}, function(response){
                            data = JSON.parse(response);
                            var disp = data.length-1;
                            for(i=0;i<=disp;i++){
                                hm += "<option>" + data[i].data_price + " - " + data[i].data_desc + "</option>";
                            }
                            $("#bundles").html(hm);
                            hm="";
                        });
                    });
                });
            </script>