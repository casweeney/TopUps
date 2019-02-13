            <div class="container">
                <h3 class="text-white text-center">Airtime Recharge</h3>
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
                                    <select class="form-control">
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
                                    <input type="number" placeholder="Amount" class="form-control" id="amount">
                                  </div>
                                  <center><button type="submit" class="btn btn-info" style="padding-right: 20%; padding-left: 20%; border-radius: 2px;">Recharge</button></center>
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