<!DOCTYPE html>
<html lang="en">
    <?php include_once("inc/head.php"); ?>
    <body>
        <?php include_once("inc/nav.php"); ?>
        <div id="banner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="content">
                            <h1>Mobile Data and Airtime on the go</h1>
                            <p>
                                Enjoy instant airtime and data bundle top up on MTN. GLO, Airtel, 9mobile. You can top up your MTN with as low as N1 and N50 on Airtel, GLO, 9mobile. <br>
                                Cheap MTN SME Data with 60-90 days validity period. Fast & Automatic delivery! <br>
                                Airtime Virtual Top Up (VTU) API is available for developers with instant setup.
                            </p>
                            <br>
                            <a style="border-radius: 0;" class="btn btn-warning" href="signin.php">Instant Topup</a>
                            <a style="border-radius: 0;" class="btn btn-danger" href="signup.php">Register</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <br>
                        <center><img class="img-fluid" src="img/phone1.png"/></center>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Jumbotron-->
        <div class="container-fluid">
            <div class="row jumbotron">
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
                    <p class="lead">Instantly earn 200.00 NGN for every one of your friends who joins <b class="text-info">TopUps.ng</b> by sharing this link <i class="fa fa-arrow-circle-right"></i></p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                    <a href="signin.php"><button type="button" class="btn btn-outline-secondary btn-sm">Login to get referral link</button></a>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="container">
                <h2 class="text-center" style="color: #064361;">Mobile Networks Available</h2>
                <div class="row text-center">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="text-warning"><strong>MTN</strong></h1>
                                <p>
                                    <b>DATA PLAN</b>
                                </p>
                                <p>Discounted and affordable data bundles and airtime</p>
                                <a href="instant_topup.php" class="btn btn-warning">Purchase</a>
                            </div>
                        </div>    
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="text-success"><strong>GLO</strong></h1>
                                <p>
                                    <b>DATA PLAN</b>
                                </p>
                                <p>Discounted and affordable data bundles and airtime</p>
                                <a href="instant_topup.php" class="btn btn-success">Purchase</a>
                            </div>
                        </div>    
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="text-danger"><strong>Airtel</strong></h1>
                                <p>
                                    <b>DATA PLAN</b>
                                </p>
                                <p>Discounted and affordable data bundles and airtime</p>
                                <a href="instant_topup.php" class="btn btn-danger">Purchase</a>
                            </div>
                        </div>    
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="text-dark-green"><strong>9mobile</strong></h1>
                                <p>
                                    <b>DATA PLAN</b>
                                </p>
                                <p>Discounted and affordable data bundles and airtime</p>
                                <a href="instant_topup.php" class="btn btn-dark-green">Purchase</a>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
        <br>

        <!--Footer-->
        <footer>
            <div class="container-fluid padding">
                <p class="text-center"><strong><a href="https://TopUp.ng">TopUp.ng</a></strong> &copy; <?php $year = date('Y'); echo $year; ?> </p>
            </div>
        </footer>
        <?php include_once("inc/modal.php"); ?>
    </body>
</html>

