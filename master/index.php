<?php
    require_once("../app/session.php");
    require_once("../app/controller.php");
    if(!$admin_session->is_logged_in()){
        Method::redirect_to("../auth");
        die("Unauthorized Brute force");
    }else{
        ?>
            <!DOCTYPE html>
            <html lang="en">
                <?php require_once "inc/head.php"; ?>
                <body>
                    <div id="wrapper">
                        <?php require_once "inc/nav.php"; ?>
                        <div id="page-wrapper">
                            <?php
                                if(isset($_GET['funding_request'])){
                                    require_once "funding_request.php";
                                }
                                elseif(isset($_GET['data_topups'])){
                                    require_once "data_topups.php";
                                }
                                elseif(isset($_GET['airtime_topups'])){
                                    require_once "airtime_topups.php";
                                }
                                elseif(isset($_GET['networks_data'])){
                                    require_once "networks_data.php";
                                }
                                elseif(isset($_GET['settings'])){
                                    require_once "settings.php";
                                }
                                elseif(isset($_GET['add_admin'])){
                                    require_once "add_admin.php";
                                }
                                elseif(isset($_GET['logout'])){
                                    $admin_session->logout();
                                    Method::redirect_to("../auth");
                                }
                                else{
                                    require_once "dashboard.php";
                                }
                            ?>
                        </div>
                    </div>

                    <script type="text/javascript">
                        jQuery(function ($) {
                            var performance = [12, 43, 34, 22, 12, 33, 4, 17, 22, 34, 54, 67],
                                visits = [123, 323, 443, 32],
                                traffic = [
                                {
                                    Source: "Direct", Amount: 323, Change: 53, Percent: 23, Target: 600
                                },
                                {
                                    Source: "Refer", Amount: 345, Change: 34, Percent: 45, Target: 567
                                },
                                {
                                    Source: "Social", Amount: 567, Change: 67, Percent: 23, Target: 456
                                },
                                {
                                    Source: "Search", Amount: 234, Change: 23, Percent: 56, Target: 890
                                },
                                {
                                    Source: "Internal", Amount: 111, Change: 78, Percent: 12, Target: 345
                                }];


                            $("#shieldui-chart1").shieldChart({
                                theme: "dark",

                                primaryHeader: {
                                    text: "Visitors"
                                },
                                exportOptions: {
                                    image: false,
                                    print: false
                                },
                                dataSeries: [{
                                    seriesType: "area",
                                    collectionAlias: "Q Data",
                                    data: performance
                                }]
                            });

                            $("#shieldui-chart2").shieldChart({
                                theme: "dark",
                                primaryHeader: {
                                    text: "Traffic Per week"
                                },
                                exportOptions: {
                                    image: false,
                                    print: false
                                },
                                dataSeries: [{
                                    seriesType: "pie",
                                    collectionAlias: "traffic",
                                    data: visits
                                }]
                            });

                            $("#shieldui-grid1").shieldGrid({
                                dataSource: {
                                    data: traffic
                                },
                                sorting: {
                                    multiple: true
                                },
                                rowHover: false,
                                paging: false,
                                columns: [
                                { field: "Source", width: "170px", title: "Source" },
                                { field: "Amount", title: "Amount" },                
                                { field: "Percent", title: "Percent", format: "{0} %" },
                                { field: "Target", title: "Target" },
                                ]
                            });            
                        });        
                    </script>
                </body>
            </html>
        <?php
    }
?>
            
