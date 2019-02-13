<?php
require_once("app/session.php");
require_once("app/controller.php");
if(!$user_session->is_logged_in()){
    Method::redirect_to("signin.php");
}else{
    $user = User::find_by_id($user_session->user_id);
    $user_id = Database::escaped_string($user->id);
    $user_name = Database::escaped_string($user->fullname);
    $user_phone = Database::escaped_string($user->phone);
    $user_email = Database::escaped_string($user->email);
    $account_balance = Database::escaped_string($user->account_balance);
    ?>  

        <!--        
            AUTHOR : CASWEENEY C. OJUKWU
            POSITION: WEB MASTER | FRONT-END/BACK-END DEVELOPER
            
            DATE: 15TH MARCH, 2018.
            ALL RIGHTS RESERVED
            CREDITS TO:
                ...Twitter Bootstrap 4
                ...jQuery UI
                ...jQuery
                ...Font-Awesome
        -->
        <!DOCTYPE html>
        <html lang="en">
            <?php require_once "inc/head.php"; ?>
            <body>
                <!--Navigation-->
                <?php require_once "inc/admin_nav.php"; ?>
                <div id="banner">
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
                            elseif(isset($_GET['purchase_history'])){
                                require_once("purchase_history.php");
                            }
                            elseif(isset($_GET['wallet_history'])){
                                require_once("wallet_history.php");
                            }
                            elseif(isset($_GET['logout'])){
                                $user_session->logout();
                                Method::redirect_to("signin.php");
                            }else{
                                require_once("dashboard.php");
                            }
                        ?>
                    <br><br>
                </div>
                <script type="text/javascript" src="datatables/jquery.dataTables.js"></script>
                <script type="text/javascript" src="datatables/dataTables.bootstrap4.js"></script>
                <script>
                    $(document).ready( function () {
                        $('#myTable').DataTable();
                    } );
                </script>
            </body>
        </html>
        <!-- place below the html form -->
    <?php
    }
?>