<!DOCTYPE html>
<html lang="en">
    <?php include_once("inc/head.php"); ?>
    <body>
        <?php include_once("inc/nav.php"); ?>
        <div id="banner">
            <br><br>
            <div class="container">
                <h3 class="text-white text-center">Instant Topup</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card" id="signup_card">
                            <br>
                            <h4 class="text-center text-info">Instant Airtime Recharge</h4>
                            <div class="card-body">
                                <form action="/action_page.php">
                                  <div class="form-group">
                                    <input type="number" placeholder="Phone number" class="form-control" id="phone">
                                  </div>
                                  <div class="form-group">
                                    <input type="email" placeholder="Email address" class="form-control" id="email">
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control">
                                        <option selected>Select Mobile Network</option>
                                        <option>MTN</option>
                                        <option>GLO</option>
                                        <option>Airtel</option>
                                        <option>9mobile</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <input type="number" placeholder="Phone number" class="form-control" id="phone">
                                  </div>
                                  <center><button type="submit" class="btn btn-info" style="padding-right: 20%; padding-left: 20%; border-radius: 2px;">Buy Airtime</button></center>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">                        
                        <div class="card" id="signup_card">
                            <br>
                            <h4 class="text-center text-info">Instant Data Topup</h4>
                            <div class="card-body">
                                <form action="/action_page.php">
                                  <div class="form-group">
                                    <input type="number" placeholder="Phone number" class="form-control" id="phone">
                                  </div>
                                  <div class="form-group">
                                    <input type="email" placeholder="Email address" class="form-control" id="email">
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control">
                                        <option selected>Select Mobile Network</option>
                                        <option>MTN</option>
                                        <option>GLO</option>
                                        <option>Airtel</option>
                                        <option>9mobile</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control">
                                        <option selected>Select Price</option>
                                        <option value='60000'>1 GB - #600</option>
                                        <option value='110000'>2 GB - #1100</option>
                                        <option value='160000'>3 GB - #1600</option>
                                        <option value='220000'>4 GB - #2200</option>
                                        <option value='280000'>5 GB - #2800</option>
                                    </select>
                                  </div>
                                  <center><button type="submit" class="btn btn-info" style="padding-right: 20%; padding-left: 20%; border-radius: 2px;">Buy Data</button></center>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
        </div>
        <?php include_once("inc/modal.php"); ?>
    </body>
</html>