<?php include("db.php"); ?>

<?php

$url = $_SERVER['REQUEST_URI'];
$path = parse_url($url, PHP_URL_PATH);
$page = explode('/', $path);
$pageName = str_replace(".php", '', $page[2]);

?>
<html>

<head>
    <?php if ($pageName != "index") { ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php } ?>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div id="top"></div>

    <header id="header">
        <div class="wrapper">
            <div id="logo">
                <img src="img/na.png" width="100" height="100" alt="LOGO" />
            </div>
            <?php if ($pageName == "index") { ?>
                <div id="nav">
                    <ul>
                        <?php if (!isset($_SESSION['userId'])) { ?>
                            <li><a href="login.php"><i class="fa fa-login-signs" aria-hidden="true"></i>&nbsp;Login</a></li>
                        <?php } else { ?>
                            <li><a href="logout.php"><i class="fa fa-login-signs" aria-hidden="true"></i>&nbsp;Logout</a></li>
                            <li><a href="admin.php"><i class="fa fa-login-signs" aria-hidden="true"></i>&nbsp;Admin </a></li>
                        <?php
                        }

                        ?>
                        <li><a href="#about"><i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp; CANDY GARDEN</a></li>
                        <li><a href="#product"><i class="fa fa-volume-control-phone" aria-hidden="true"></i>&nbsp;Products</a></li>
                        <li><a href="#Reservation"><i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp;Reservation</a></li>
                        <li><a href="#map"><i class="fa fa-map-signs" aria-hidden="true"></i>&nbsp;Map</a></li>
                    </ul>
                    <a href="#" id="respmenu" class="button"><i class="fa fa-lg fa-navicon"></i></a>
                </div>

            <?php } else { ?>

                <div id="nav">
                    <ul>
                        <?php if (!isset($_SESSION['userId'])) { ?>
                            <li><a href="login.php"><i class="fa fa-login-signs" aria-hidden="true"></i>&nbsp;Login</a></li>
                        <?php } else { ?>
                            <li><a href="logout.php"><i class="fa fa-login-signs" aria-hidden="true"></i>&nbsp;Logout</a></li>
                        <?php
                        }

                        ?>
                        <li><a href="index.php#about"><i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp; CANDY GARDEN</a></li>
                        <li><a href="index.php#product"><i class="fa fa-volume-control-phone" aria-hidden="true"></i>&nbsp;Products</a></li>
                        <li><a href="index.php#Reservation"><i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp;Reservation</a></li>
                        <li><a href="index.php#map"><i class="fa fa-map-signs" aria-hidden="true"></i>&nbsp;Map</a></li>
                    </ul>
                    <a href="#" id="respmenu" class="button"><i class="fa fa-lg fa-navicon"></i></a>
                </div>

            <?php } ?>
        </div>
    </header>