<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2013, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */
?>
<!doctype html>
<html>
<head>
    <?php echo $this->html->charset();?>
    <title>Application &gt; Cookies</title>
    <?php echo $this->html->style(array('bootstrap', 'bootstrap-responsive','debug')); ?>
    <?php echo $this->scripts(); ?>
    <?php echo $this->html->link('Icon', null, array('type' => 'icon')); ?>
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }
    </style>

</head>
<body class="app">

<!-- twitter-->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="#">Event notifier</a>
            <div class="nav-collapse collapse">
                <p class="navbar-text pull-right">
                    <!--Logged in as <a href="#" class="navbar-link">Username</a-->
                </p>
                <ul class="nav">
                    <li class="active"><a href="/users">Home</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
<?php

$pages = array('users'=>'Users','posts'=>'Posts','servers' => 'Servers');?>
<div class="container-fluid">
    <div class="row-fluid">
        <!--div class="span3">
            <div class="well sidebar-nav">
                <!--ul class="nav nav-list">
                    <li class="nav-header">Menu</li>

                    <li class="nav-header">Account</li>
                    <li><a href="/logout">Logout</a></li>
                </ul>
            </div><!--/.well >
        </div><!--/span-->
        <div class="span9">
            <div class="hero-unit">
                <h1>Login</h1>
                <p></p>

            </div>
            <div class="row-fluid">
                <?php echo $this->content(); ?>
            </div><!--/row-->
        </div><!--/span-->
    </div><!--/row-->

    <hr>

    <footer>
        <p>&copy; Cookies 2013</p>
    </footer>

</div><!--/.fluid-container-->

</body>
</html>