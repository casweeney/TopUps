<?php
    require_once("app/session.php");
    require_once("app/functions.php");
?>
<!--Navigation-->
<nav class="navbar navbar-expand-md navbar-light bg-white sticky-top" style="padding-top: 0; padding-bottom: 0;">
    <div class="container">
        <a style="color: #121668;" class="navbar-brand" href="index.php"><img src="img/logo.png" width="70" /> <b>TopUps.ng</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto"><!--ml-auto pushes your nav items to the right at full width-->
                <li class="nav-item"><a class="nav-link" href="instant_topup.php">Instant Topup</a></li>
                <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Contact</a>
                </li>
                <?php
                    if($user_session->is_logged_in()){
                        ?>
                            <li class="nav-item"><a class="nav-link" href="./access_granted.php">Dashboard</a></li>
                            <li class="nav-item"><a style="color: #fff; font-weight: 100;" class="nav-link btn btn-danger" href="./access_granted.php?logout">Logout</a></li>
                        <?php
                    }else{
                        ?>
                            <li class="nav-item"><a class="nav-link" href="signin.php">Login</a></li>
                            <li class="nav-item"><a style="color: #fff; font-weight: 100;" class="nav-link btn btn-danger" href="signup.php">Register</a></li>
                        <?php
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>