<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Admin Panel</a>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul id="active" class="nav navbar-nav side-nav">
            <li class="selected"><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="index.php?funding_request"><i class="fa fa-money"></i> Funding Requests</a></li>
            <li><a href="index.php?data_topups"><i class="fa fa-arrow-down"></i> Data Topups</a></li>
            <li><a href="index.php?airtime_topups"><i class="fa fa-arrow-up"></i> Airtime Topups</a></li>
            <li><a href="index.php?networks_data"><i class="fa fa-arrow-up"></i> Networks & Data</a></li>
            <li><a href="index.php?add_admin"><i class="fa fa-arrow-right"></i> Add Admin</a></li>
            <li><a href="index.php?settings"><i class="fa fa-cog"></i> Settings</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown messages-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">2</span> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li class="dropdown-header">2 New Messages</li>
                    <li class="message-preview">
                        <a href="#">
                            <span class="avatar"><i class="fa fa-bell"></i></span>
                            <span class="message">Security alert</span>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li class="message-preview">
                        <a href="#">
                            <span class="avatar"><i class="fa fa-bell"></i></span>
                            <span class="message">Security alert</span>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="#">Go to Inbox <span class="badge">2</span></a></li>
                </ul>
            </li>
            <li class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Steve Miller<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="index.php?logout"><i class="fa fa-power-off"></i> Log Out</a></li>

                </ul>
            </li>
            <li class="divider-vertical"></li>
            <li>
                <form class="navbar-search">
                    <input type="text" placeholder="Search" class="form-control">
                </form>
            </li>
        </ul>
    </div>
</nav>