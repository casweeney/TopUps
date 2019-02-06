<!DOCTYPE html>
<html lang="en">
    <?php include_once("inc/head.php"); ?>
    <body>
        <!--Navigation-->
        <nav class="navbar navbar-expand-md navbar-light bg-white sticky-top" style="padding-top: 0; padding-bottom: 0;">
            <div class="container">
                <a style="color: #121668;" class="navbar-brand" href="index.php"><img src="img/logo.png" width="70" /> <b>TopUps.ng</b></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto"><!--ml-auto pushes your nav items to the right at full width-->
                        <li class="nav-item"><a class="nav-link" href="access_granted.php?dashboard">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="access_granted.php?fund_account">Fund Account</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Top up</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="nav-link" href="access_granted.php?airtime_topup">Airtime Topup</a>
                              <a class="nav-link" href="access_granted.php?data_topup">Data Topup</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="access_granted.php?referral">Referral</a></li>
                        <li class="nav-item"><a style="color: #fff; font-weight: 100;" class="nav-link btn btn-danger" href="access_granted.php?logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="banner" style="height: 100%;">
            <br><br>
                <?php
                    if(isset($_GET['fund_account'])){
                        require_once("fund_account.php");
                    }
                    elseif(isset($_GET['airtime_topup'])){
                        require_once("airtime_topup.php");
                    }
                    elseif(isset($_GET['data_topup'])){
                        require_once("data_topup.php");
                    }
                    elseif(isset($_GET['referral'])){
                        require_once("referral.php");
                    }
                    elseif(isset($_GET['logout'])){
                        header("Location: signin.php");
                    }else{
                        require_once("dashboard.php");
                    }
                ?>
            <br><br>
        </div>
    </body>
</html>