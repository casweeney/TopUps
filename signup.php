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
                            <div class="card-body">
                                <form action="/action_page.php">
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
                                    <input type="password" placeholder="Confirm password" class="form-control" id="pwd">
                                  </div>
                                  <div class="form-group form-check">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox"> <span style="font-size: 12px;">By click this, I agree to the terms and conditions</span>
                                    </label>
                                  </div>
                                  <center><button type="submit" class="btn btn-info" style="padding-right: 20%; padding-left: 20%; border-radius: 2px;">Sign up</button></center>
                                </form>
                                <br>
                                <center><a href="signin.php" class="btn btn-default text-info" style="padding-right: 20%; padding-left: 20%; border-radius: 2px;">Sign in</a></center>
                            </div>
                            <div class="card-footer">
                                <p class="text-dark text-center" style="font-size: 12px;">or sign up with</p>
                                <center><button type="submit" class="btn btn-outline-secondary">Google</button>&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-outline-info">Facebook</button></center>
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