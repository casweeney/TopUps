<?php
    $sql = "SELECT id FROM users";
    $result = Database::query($sql);
    $num = $result->num_rows;

    $sql = "SELECT SUM(account_balance) AS total FROM users";
    $result = Database::query($sql);
    $row=$result->fetch_array();
    $total_users_balance = $row['total'];

    $request_status = "Not Verified";
    $sql = "SELECT request_status FROM funding_requests WHERE request_status = '{$request_status}'";
    $result = $database->query($sql);
    $funding_requests = $result->num_rows;


?>
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-primary-heading text-center">
                <h4>All Users</h4>
                <b><?php echo $num; ?></b>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-success">
            <div class="panel-primary-heading text-center">
                <h4>Total amount in users wallet</h4>
                <b><?php echo $total_users_balance; ?></b>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-danger">
            <div class="panel-primary-heading text-center">
                <h4>Funding requests</h4>
                <b><?php echo $funding_requests; ?></b>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Recent transactions </h3>
            </div>
            <div class="panel-body">
                
            </div>
        </div>
    </div>
</div>
