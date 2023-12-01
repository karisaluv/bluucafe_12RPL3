<?php
//index diluar main, index dulu baru main

session_start();

if (isset($_GET['x']) && $_GET['x'] == 'home') {
    $page = "views/home.php";
    include "main.php";

} elseif (isset($_GET['x']) && $_GET['x'] == 'about') {
    $page = "views/about.php";
    include "main.php";


} elseif (isset($_GET['x']) && $_GET['x'] == 'menu') {
    if ($_SESSION['level_bluucafe'] == 1 || $_SESSION['level_bluucafe'] == 3) {
        $page = "views/menu.php";
        include "main.php";
    } else {
        $page = "views/home.php";
        include "main.php";
    }

} elseif (isset($_GET['x']) && $_GET['x'] == 'order') {
    if ($_SESSION['level_bluucafe'] == 1 || $_SESSION['level_bluucafe'] == 2 || $_SESSION['level_bluucafe'] == 3) {
        $page = "views/order.php";
        include "main.php";
    } else {
        $page = "views/home.php";
        include "main.php";
    }

} elseif (isset($_GET['x']) && $_GET['x'] == 'kitchen') {
    if ($_SESSION['level_bluucafe'] == 1 || $_SESSION['level_bluucafe'] == 4) {
        $page = "views/kitchen.php";
        include "main.php";
    } else {
        $page = "views/home.php";
        include "main.php";
    }

} elseif (isset($_GET['x']) && $_GET['x'] == 'user') {

    //kalo dia admin boleh akses user melalui url user, kalo tidak maka akan kembali ke home
    if ($_SESSION['level_bluucafe'] == 1) {
        $page = "views/user.php";
        include "main.php";
        //kalo dia bukan admin akan kembali ke home
    } else {
        $page = "views/home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'report') {

    //kalo dia admin boleh akses report melalui url report, kalo tidak maka akan kembali ke home
    if ($_SESSION['level_bluucafe'] == 1) {
        $page = "views/report.php";
        include "main.php";
        //kalo dia bukan admin akan kembali ke home
    } else {
        $page = "views/home.php";
        include "main.php";
    }

} elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
    include "login.php";

} elseif (isset($_GET['x']) && $_GET['x'] == 'logout') {
    include "routers/r_logout.php";

} elseif (isset($_GET['x']) && $_GET['x'] == 'orderitem') {
    if ($_SESSION['level_bluucafe'] == 1 || $_SESSION['level_bluucafe'] == 2 || $_SESSION['level_bluucafe'] == 3) {
        $page = "views/order_item.php";
        include "main.php";
    } else {
        $page = "views/home.php";
        include "main.php";
    }

} elseif (isset($_GET['x']) && $_GET['x'] == 'viewitem') {
    if ($_SESSION['level_bluucafe'] == 1) {
        $page = "views/view_item.php";
        include "main.php";
    } else {
        $page = "views/home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'sejarah') {
    $page = "views/sejarah.php";
    include "main.php";

    //selain kondisi di atas, diarahkan menuju HOME
} else {
    $page = "views/home.php";
    include "main.php";
}

?>